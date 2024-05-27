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


        $clients = Client::orderBy('nom')->get();
        $chauffeurs = Chauffeur::orderBy('name')->get();

      /*   $chauffeurs = Chauffeur::all();
        $clients = Client::all(); */
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
            $checkBonCaisseRetour = DB::select("select count(*) as c from boncaisseretour where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
            if($checkBonCaisseRetour[0]->c >0)
            {
               $getNomberBon = DB::select("select max(number)+1 as number from boncaisseretour where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
               $DataBonCaisseRetour =
               [
                    'number'          => $getNomberBon[0]->number,
                    'idcaisseretour'  => $CaisseRetour->id,
                    'idcompanie'      => $idCompagnieIsActive[0]->id,
               ];
               $BonCaisseRetour = DB::table('boncaisseretour')->insert($DataBonCaisseRetour);
            }
            else
            {
                $DataBonCaisseRetour =
                [
                    'number'           => 1,
                    'idcaisseretour'   => $CaisseRetour->id,
                    'idcompanie'       => $idCompagnieIsActive[0]->id,
                ];
                $BonCaisseRetour = DB::table('boncaisseretour')->insert($DataBonCaisseRetour);
            }
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
                    $getLastCuml = DB::select('select sum(nombre) as cuml from table_cumlcaisseretours where idclient= ? and compagnie = ?',[$request->client,$idCompagnieIsActive[0]->id]);

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
                if(!empty($LastRow))
                {
                    $CalCulCuml = $LastRow[0]->cuml + $request->nbbox;
                    $UpdateTableCumlCaisseRetour = DB::select('update table_cumlcaisseretours set nombre = ? , cuml = ? where idcaissevide = ?',
                                                        [$request->nbbox,$CalCulCuml,$request->id]);
                }
                else
                {
                     $UpdateTableCumlCaisseRetour = DB::select('update table_cumlcaisseretours set nombre = ? , cuml = ? where idcaissevide = ?',
                        [$request->nbbox,$request->nbbox,$request->id]);
                }

                /*$CalCulCuml = $LastRow[0]->cuml + $request->nbboxEdit;

                $UpdateTableCumlCaisseVide = DB::select('update table_cumlcaisseretours set nombre = ? , cuml = ? where idcaissevide = ?',
                                                        [$request->nbboxEdit,$CalCulCuml,$request->id]);*/
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
         DB::select("delete from boncaisseretour where idcaisseretour = ?",[$request->id]);
        return response()->json([
            'status'   => 200,
        ]);
    }
    public function ExtractBonCaisseRetour($id)
    {

        $getMaxNumberBon = DB::select('select number from boncaisseretour where idcaisseretour = ?',[$id]);
        DB::select('update caisseretour set cloturer = 1 where id =?',[$id]);
        $infos          = DB::select("select * from infos");

        $InfoBon = DB::select('select nbbox,idclient from caisseretour where id = ?',[$id]);


        $Data = DB::select("select ms.cin,ms.chauffeur,ms.matricule,ms.nbbox,concat(c.nom,' ',c.prenom) as client , '' as siganture,

        (select cuml from table_cumlcaisseretours where idcaissevide = ? limit 1) as cumul,'' as etranger
        from clients c,caisseretour ms where c.id = ms.idclient and ms.id = ?",[$id,$id]);
        $dateBon   = DB::select('select date(created_at) as date from caisseretour where id = ?',[$id]);

        $pdf            = PDF::loadView('Dashboard.CaisseRetour.PrintPDF',compact('Data','getMaxNumberBon','infos','dateBon'))
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
