<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\CaisseRetour;
use DB;
use Auth;
use PDF;
use App\Models\Bons;
use App\Models\Info;
use App\Models\Chauffeur;
use App\Models\BonCaisseRetour;
use App\Exports\CaisseRetourExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CumlCaisseRetour;
class CaisseRetourController extends Controller
{
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        $clients = Client::all();
        return view('Dashboard.CaisseRetour.index')->with('clients',$clients)->with('chauffeurs',$chauffeurs);
    }

    public function getCaisseRetour()
    {
        $IdCompagnieIsActive = DB::select("select id from compagnies where active ='active'");
        /* $CaisseRetour = DB::select("select ca.*,concat(c.nom,' ',c.prenom) as client,u.name from caisseretour ca,clients c,
        users u where ca.idclient = c.id and ca.iduser = u.id order by ca.id desc"); */

        $CaisseRetour = DB::select("select ca.*,concat(c.nom,' ',c.prenom) as client,u.name from caisseretour ca,clients c,
        users u where ca.idclient = c.id and ca.iduser = u.id and ca.compagnie = ? order by ca.id desc",[$IdCompagnieIsActive[0]->id]);

        return response()->json([
            'status'        => 200,
            'data'          => $CaisseRetour,
            'Role'          => Auth::user()->role_name,
        ]);
    }
    public function StoreCaisseRetour(Request $request)
    {
        try
        {



            $idCompagnieIsActive = DB::select('select id  from compagnies where active ="active"');
            $CaisseRetour = CaisseRetour::create([
                'nbbox'          => $request->nbbox,
                'chauffeur'      => $request->chauffeur,
                'matricule'      => $request->matricule,
                'idclient'       => $request->client,
                'iduser'         => Auth::user()->id,
                'cin'            => $request->cin,
                'compagnie'               => $idCompagnieIsActive[0]->id
            ]);
            if($CaisseRetour)
            {
                // 1- check client in table cumlVide
                $idCompagnieIsActive = DB::select("select id from compagnies where active = 'active' ");
                $CheckClientCumlRetour = DB::select('select count(*) as c from table_cumlcaisseretours where idclient = ? and compagnie = ?'
                ,[$request->client,$idCompagnieIsActive[0]->id]);

                if($CheckClientCumlRetour[0]->c == 0)
                {
                    $CumlCaisseVide = CumlCaisseRetour::create([
                        'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                        'cuml'              => $request->nbbox,
                        'idclient'          => $request->client,
                        'nombre'            => $request->nbbox,
                        'compagnie'         => $idCompagnieIsActive[0]->id,
                        'idcaissevide'      => $CaisseRetour->id,
                    ]);
                }
                else
                {
                    $getLastCuml = DB::select('select sum(nombre) as cuml from table_cumlcaisseretours where idclient= ?',[$request->client]);

                    $cumlFinale = $getLastCuml[0]->cuml + $request->nbbox;
                    $CumlCaisseRetour = CumlCaisseRetour::create([
                        'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                        'cuml'              => $cumlFinale,
                        'idclient'          => $request->client,
                        'nombre'            => $request->nbbox,
                        'compagnie'         => $idCompagnieIsActive[0]->id,
                        'idcaissevide'      => $CaisseRetour->id,
                    ]);
                }





                return response()->json([
                    'status'        => 200,
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDataById(Request $request)
    {
        $DataCaisseRetour = DB::select("select * from caisseretour where id =?",[$request->id]);
        return response()->json([
            'status'   => 200,
            'data'     => $DataCaisseRetour[0]
        ]);
    }

    public function EditCaisseRetour(Request $request)
    {

        try
        {
            $checkIsTheSameClient = DB::select('select idclient from table_cumlcaisseretours where idcaissevide = ?',[$request->id]);

            if(intval($checkIsTheSameClient[0]->idclient) == intval($request->client))
            {


                // get last row inserted
                $LastRow = DB::select("select * from table_cumlcaisseretours where idcaissevide < ? and idclient = ? order by id desc limit 1",
                                        [$request->id,$request->client]);

                $CalCulCuml = $LastRow[0]->cuml + $request->nbboxEdit;

                $UpdateTableCumlCaisseVide = DB::select('update table_cumlcaisseretours set nombre = ? , cuml = ? where idcaissevide = ?',
                                                        [$request->nbboxEdit,$CalCulCuml,$request->id]);
            }

              $CaisseRetour = CaisseRetour::where('id',$request->id)->update([
                    'nbbox'          => $request->nbboxEdit,
                    'chauffeur'      => $request->chauffeur,
                    'matricule'      => $request->matricule,
                    'idclient'       => $request->client,
                    'iduser'         => Auth::user()->id,
                    'cin'            => $request->cin
              ]);
              return response()->json([
                'status'   => 200,

            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function TrashCaisseRetour(Request $request)
    {
        $CaisseRetour = CaisseRetour::where('id',$request->id)->delete();
        DB::select("delete from table_cumlcaisseretours where idcaissevide = ?",[$request->id]);
        return response()->json([
            'status'   => 200,
        ]);
    }
    public function ExtractBonCaisseRetour($id)
    {
        $getMaxNumberBon = DB::select('SELECT LPAD(IFNULL(MAX(CAST(number AS UNSIGNED))+1, 1), 4, "0") AS number FROM boncaisseretour');
        $Bons = BonCaisseRetour::create([
            'number'   => $getMaxNumberBon[0]->number,
        ]);
        DB::select('update caisseretour set cloturer = 1 where id =?',[$id]);
        $infos          = DB::select("select * from infos");

        $InfoBon = DB::select('select nbbox,idclient from caisseretour where id = ?',[$id]);


        $Data = DB::select("select ms.cin,ms.chauffeur,ms.matricule,ms.nbbox,concat(c.nom,' ',c.prenom) as client , '' as siganture,

        (select cuml from table_cumlcaisseretours where idclient = ? and nombre = ?) as cumul,'' as etranger
        from clients c,caisseretour ms where c.id = ms.idclient and ms.id = ?",[$InfoBon[0]->idclient,$InfoBon[0]->nbbox,$id]);

        $pdf            = PDF::loadView('Dashboard.CaisseRetour.PrintPDF',compact('Data','getMaxNumberBon','infos'))
        ->setOptions(['defaultFnt' => 'san-serif'])->setPaper('a4');
        return $pdf->download('bon de retour caisses vides.pdf');
    }

    public function exportDataCaisseRetour($id)
    {
        $Data = DB::table('caisseretour')
        ->join('clients','clients.id','=','caisseretour.idclient')
        ->select('caisseretour.created_at',DB::raw('concat(clients.nom," ",clients.prenom) as clients'),'caisseretour.nbbox','caisseretour.chauffeur','caisseretour.matricule')
        ->where('clients.id','=',$id)
        ->get();
        return Excel::download(new CaisseRetourExport($Data), 'Fiche_Caisse_Retour.xlsx');
    }

}
