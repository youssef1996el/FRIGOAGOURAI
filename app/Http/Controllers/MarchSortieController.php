<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Marchsortie;
use App\Models\Stock;
use Auth;
use DB;
use PDF;
use App\Models\Bons;
use App\Models\Chauffeur;
use App\Models\BonCaisseVide;
use App\Exports\CaisseVideExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CumlCaisseVide;

class MarchSortieController extends Controller
{
    public function index()
    {
       $clients = Client::orderBy('nom')->get();
        $Chauffeur = Chauffeur::all();
        return view('Dashboard.MarchSorite')->with('clients',$clients)->with('Chauffeur',$Chauffeur);
    }
    public function GetMarchSorite()
    {
        /* $MarchSorite = DB::table('marchsorites')
        ->join('users','users.id','=','marchsorites.user_id')
        ->join('clients','clients.id','=','marchsorites.client_id')
        ->select('marchsorites.cloturer','marchsorites.cin','marchsorites.matricule','marchsorites.chauffeur','marchsorites.reste','marchsorites.is_retour','marchsorites.id','marchsorites.nbbox',DB::raw('concat(clients.nom," ",clients.prenom) as client_name'),'users.name','marchsorites.created_at')
        ->orderBy('marchsorites.id','desc')
        ->get(); */
        $IdCompagnieIsActive = DB::select("select id from compagnies where active ='active'");
        $MarchSorite = DB::table('marchsorites')
        ->join('users','users.id','=','marchsorites.user_id')
        ->join('clients','clients.id','=','marchsorites.client_id')
        ->select('marchsorites.cloturer','marchsorites.cin','marchsorites.matricule','marchsorites.chauffeur','marchsorites.reste','marchsorites.is_retour','marchsorites.id','marchsorites.nbbox',DB::raw('concat(clients.nom," ",clients.prenom) as client_name'),'users.name','marchsorites.created_at')
        ->where('compagnie','=',$IdCompagnieIsActive[0]->id)
        ->orderBy('marchsorites.id','desc')
        ->get();

        $NBSortie = DB::select("select count(*) as bonRetour from marchsorites where is_retour = 0");
        $NBSortieIsRetour = DB::select("select count(*) as NBSortieIsRetour from marchsorites where is_retour = 1");
        $Role = Auth::user()->role_name;
        return response()->json([
            'status'   =>200,
            'data'      =>$MarchSorite,
            'NBSortie'  =>$NBSortie[0]->bonRetour,
            'NBSortieIsRetour' =>$NBSortieIsRetour[0]->NBSortieIsRetour,
            'Role'             =>$Role,
        ]);

    }
    public function StoreMarchandiseSortie(Request $request)
    {

        try
        {

            $idCompagnieIsActive = DB::select('select id  from compagnies where active ="active"');
            $MarchSortie =Marchsortie::create([
                'nbbox'                 =>$request->nbbox,
                'user_id'               =>Auth::user()->id,
                'is_retour'             =>0,
                'client_id'             =>$request->client,
                'reste'                 =>$request->nbbox,
                'matricule'             =>$request->matricule,
                'chauffeur'             =>$request->chauffeur,
                'cin'                   =>$request->cin,
                'compagnie'             =>$idCompagnieIsActive[0]->id
            ]);
            $checkBonCaisseVide = DB::select("select count(*) as c from boncaissevides where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
            if($checkBonCaisseVide[0]->c >0)
            {
               $getNomberBon = DB::select("select max(number)+1 as number from boncaissevides where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
               $DataBonCaisseVide =
               [
                   'number'        => $getNomberBon[0]->number,
                    'idcaissevide'  => $MarchSortie->id,
                    'idcompanie'    => $idCompagnieIsActive[0]->id,
               ];
               $BonCaisseVide = DB::table('boncaissevides')->insert($DataBonCaisseVide);

            }
            else
            {
                $DataBonCaisseVide =
                [
                    'number'        => 1,
                    'idcaissevide'  => $MarchSortie->id,
                    'idcompanie'    => $idCompagnieIsActive[0]->id,
                ];
                $BonCaisseVide = DB::table('boncaissevides')->insert($DataBonCaisseVide);
            }
            $nbBoxNoRetour = Db::select("select ifnull(sum(nbbox),0) as nbbox from marchsorites where is_retour = 0");

            $Stock = DB::select('select ifnull(Capacitstock,0) as Capacitstock ,ifnull(Quantitesortie,0) as Quantitesortie from stock');



            $QuantiteSortie = (int)$Stock[0]->Quantitesortie;
            $QuantityeSortieNew = (int)$nbBoxNoRetour[0]->nbbox;

            $QuantiteActuelle = (int)$Stock[0]->Capacitstock -$QuantityeSortieNew;

            $updateStock = DB::select("update stock set Quantitesortie = ? , Quantiteactuelle = ?",[$QuantityeSortieNew,$QuantiteActuelle]);




            if($MarchSortie)
            {
                // 1- check client in table cumlVide
                $idCompagnieIsActive = DB::select("select id from compagnies where active = 'active' ");
                $CheckClientCumlVide = DB::select('select count(*) as c from table_cumlcaissevides where idclient = ? and compagnie = ?'
                ,[$request->client,$idCompagnieIsActive[0]->id]);

                if($CheckClientCumlVide[0]->c == 0)
                {
                    $CumlCaisseVide = CumlCaisseVide::create([
                        'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                        'cuml'              => $request->nbbox,
                        'idclient'          => $request->client,
                        'nombre'            => $request->nbbox,
                        'compagnie'         => $idCompagnieIsActive[0]->id,
                        'idcaissevide'      => $MarchSortie->id,
                    ]);
                }
                else
                {
                    $getLastCuml = DB::select('select sum(nombre) as cuml from table_cumlcaissevides where idclient= ? and compagnie = ?',[$request->client,$idCompagnieIsActive[0]->id]);
                    $cumlFinale = $getLastCuml[0]->cuml + $request->nbbox;
                    $CumlCaisseVide = CumlCaisseVide::create([
                        'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                        'cuml'              => $cumlFinale,
                        'idclient'          => $request->client,
                        'nombre'            => $request->nbbox,
                        'compagnie'         => $idCompagnieIsActive[0]->id,
                        'idcaissevide'      => $MarchSortie->id,
                    ]);
                }
                return response()->json([
                    'status'     =>200
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getIdClient(Request $request)
    {
        $idClient = DB::select("select id from clients where concat(nom,' ',prenom) = ?",[$request->name]);
        $chauffeurAndMatricule = DB::select("select matricule,chauffeur from marchsorites m,clients c where m.client_id = c.id and concat(nom,' ',prenom) = ?",
        [$request->name]);

        return response()->json([
            'status'   =>200,
            'idclient' =>$idClient[0]->id,
            'matricule' =>$chauffeurAndMatricule[0]->matricule,
            'chauffeur' =>$chauffeurAndMatricule[0]->chauffeur,
        ]);
    }

    public function EditBonSortie(Request $request)
    {
        try
        {

            $checkIsTheSameClient = DB::select('select idclient from table_cumlcaissevides where idcaissevide = ?',[$request->id]);

            if(intval($checkIsTheSameClient[0]->idclient) == intval($request->Client))
            {

                // get last row inserted
                $LastRow = DB::select("select * from table_cumlcaissevides where idcaissevide < ? and idclient = ? order by id desc limit 1",
                                        [$request->id,$request->Client]);
                if(!empty($LastRow))
                {
                    $CalCulCuml = $LastRow[0]->cuml + $request->nbbox;

                    $UpdateTableCumlCaisseVide = DB::select('update table_cumlcaissevides set nombre = ? , cuml = ? where idcaissevide = ?',
                                                        [$request->nbbox,$CalCulCuml,$request->id]);
                }
                else
                {
                     $UpdateTableCumlCaisseVide = DB::select('update table_cumlcaissevides set nombre = ? , cuml = ? where idcaissevide = ?',
                        [$request->nbbox,$request->nbbox,$request->id]);
                }

            }


            $upDateBonSortie = Marchsortie::where('id','=',$request->id)->update([
                'nbbox'         =>$request->nbbox,
                'client_id'     =>$request->Client,
                'matricule'     =>$request->matricule,
                'chauffeur'     =>$request->chauffeur,
                'cin'           =>$request->cin,
            ]);

            $nbBoxNoRetour = Db::select("select ifnull(sum(nbbox),0) as nbbox from marchsorites where is_retour = 0");

           /*  $Stock = DB::select('select ifnull(Capacitstock,0) as Capacitstock ,ifnull(Quantitesortie,0) as Quantitesortie from stock');
            $QuantiteSortie = (int)$Stock[0]->Quantitesortie;
            $QuantityeSortieNew = (int)$nbBoxNoRetour[0]->nbbox;

            $QuantiteActuelle = (int)$Stock[0]->Capacitstock -$QuantityeSortieNew;

            $updateStock = DB::select("update stock set Quantitesortie = ? , Quantiteactuelle = ?",[$QuantityeSortieNew,$QuantiteActuelle]); */
            if($upDateBonSortie)
            {
                return response()->json([
                    'status'    =>200,
                ]);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function TrashBonSortie(Request $request)
    {
        try
        {
            $DeleteBonSortie = Marchsortie::where('id','=',$request->id)->delete();
            DB::select("delete from table_cumlcaissevides where idcaissevide = ?",[$request->id]);
            DB::select("delete from boncaissevides where idcaissevide = ?",[$request->id]);

            $nbBoxNoRetour = Db::select("select ifnull(sum(nbbox),0) as nbbox from marchsorites where is_retour = 0");

           /*  $Stock = DB::select('select ifnull(Capacitstock,0) as Capacitstock ,ifnull(Quantitesortie,0) as Quantitesortie from stock');
            $QuantiteSortie = (int)$Stock[0]->Quantitesortie;
            $QuantityeSortieNew = (int)$nbBoxNoRetour[0]->nbbox;

            $QuantiteActuelle = (int)$Stock[0]->Capacitstock -$QuantityeSortieNew;

            $updateStock = DB::select("update stock set Quantitesortie = ? , Quantiteactuelle = ?",[$QuantityeSortieNew,$QuantiteActuelle]); */
            if($DeleteBonSortie)
            {
                return response()->json([
                    'status'    =>200,
                ]);
            }
        }
         catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ExtractBonSortie($id)
    {

                $idCompagnieIsActive = DB::select('select id  from compagnies where active ="active"');
        $getMaxNumberBon = DB::select('select number from boncaissevides where idcaissevide = ?',[$id]);
        $infos          = DB::select("select * from infos");
        $InfoBon = DB::select('select nbbox,client_id from marchsorites where id = ?',[$id]);
        $Data = DB::select("select ms.cin,ms.chauffeur,ms.matricule,ms.nbbox,concat(c.nom,' ',c.prenom) as client , '' as siganture,
                            (select cuml from table_cumlcaissevides where idcaissevide = ?  limit 1) as cumul,
                            '' as etranger
                            from clients c,marchsorites ms where c.id = ms.client_id and ms.id = ?",

                            [$id,$id]);
        $count = count($Data);

        DB::select('update marchsorites set cloturer = 1 where id =?',[$id]);
       /*  return view('Dashboard.PrintBonSortie',compact('Data','getMaxNumberBon','infos')); */
        $pdf            = PDF::loadView('Dashboard.PrintBonSortie',compact('Data','getMaxNumberBon','infos','count'))
        ->setOptions(['defaultFnt' => 'san-serif'])->setPaper('a4');
        return $pdf->download('Bon De Caisse Sortie.pdf');
    }

    public function getChauffeurByClient(Request $request)
    {
        $chauffeurs = DB::select("select id,name from chauffeurs where idclient = ?",[$request->id]);
        return response()->json([
            'status'     => 200,
            'data'       => $chauffeurs,
        ]);
    }

    public function getAttrChauffeur(Request $request)
    {
        $DataChauffeur = DB::select("select * from chauffeurs where name = ?",[$request->name]);


        return response()->json([
            'status'     => 200,
            'data'       => $DataChauffeur[0],
        ]);
    }

    public function exportDataCaisseVide($id)
    {
        $Data = DB::table('marchsorites')
                    ->join('clients','clients.id','=','marchsorites.client_id')
                    ->select('marchsorites.created_at',DB::raw('concat(clients.nom," ",clients.prenom) as clients'),'marchsorites.nbbox','marchsorites.chauffeur','marchsorites.matricule')
                    ->where('clients.id','=',$id)
                    ->get();
        return Excel::download(new CaisseVideExport($Data), 'Fiche_Caisse_Vide.xlsx');
    }
}
