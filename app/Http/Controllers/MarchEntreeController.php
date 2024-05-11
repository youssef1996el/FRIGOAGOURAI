<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Client;
use App\Models\TmpMarchEntree;
use App\Models\MarchEntree;
use App\Models\LigneMarchEntree;
use PDF;
use App\Models\Info;
use App\Models\ListOrigin;
use App\Models\BonMarchandiseEntree;
use App\Models\Chauffeur;
use App\Models\Bons;
use Carbon\Carbon;
use App\Models\Historique;
use App\Exports\MarchandiseEntreeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CumlMarchandiseEntree;
class MarchEntreeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $Origine = ListOrigin::all();
        $chauffeurs = Chauffeur::all();
        return view('Dashboard.MarchEntree')->with('clients',$clients)->with('Origine',$Origine)->with('chauffeurs',$chauffeurs);
    }

    public function GetTmpMachaEntree(Request $request)
    {
        $TmpMarchEntree = DB::select('select t.*,concat(c.nom," ",c.prenom) as name_client from tmpmarchentree t,clients c where t.idclient = c.id and t.idclient = ? order by t.id desc',[$request->idclient]);
        $totalCaisseEntree = DB::select("select ifnull(sum(nbbox),0) as total from tmpmarchentree where idclient  = ?",[$request->idclient]);
        return response()->json([
            'status'        =>200,
            'data'          =>$TmpMarchEntree,
            'total'         =>$totalCaisseEntree[0]->total,
        ]);
    }
    public function StoreTmpMacheEntree(Request $request)
    {
        $checkProduitIsExist = DB::select('select id,count(*) as c from tmpmarchentree where produit = ? and idclient = ?',[$request->produit,$request->client]);
        if($checkProduitIsExist[0]->c !=0)
        {
            $updateQteProduit = DB::select('update  tmpmarchentree set nbbox = nbbox + ? where id =?',[$request->nbBox,$checkProduitIsExist[0]->id]);

            return response()->json([
                'status'        =>300,
            ]);
        }
        else
        {
            $TmpMarchEntree = TmpMarchEntree::create([
                'nbbox'              => $request->nbBox,
                'produit'            => $request->produit,
                'idclient'           => $request->client,
                'user_id'            => Auth::user()->id,
                'matricule'            => $request->matricule,
                'chauffeur'            => $request->chauffeur,
                'cin'                => $request->cin,
            ]);
            if($TmpMarchEntree)
            {
                return response()->json([
                    'status'        =>200,
                ]);
            }
        }


    }

    public function TrashTmpMarchEntree(Request $request)
    {
        try
        {
            $TmpMarchEntree = TmpMarchEntree::where('id','=',$request->id)->delete();
            return response()->json([
                'status'        =>200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }


    public function StoreMarchEntreeAndLigne(Request $request)
    {

        try
        {
            $idCompagnieIsActive = DB::select('select id  from compagnies where active ="active"');
            $idClient = DB::select("select id from clients where concat(nom,' ',prenom) = ?",[$request->nameClient]);
            $MarchEntree = MarchEntree::create([
                'totalentree'             => $request->totalentree,
                'user_id'                 => Auth::user()->id,
                'client_id'               => $idClient[0]->id,
                'matricule'               => $request->ligne[0][1],
                'chauffeur'               => $request->ligne[0][2],
                'cin'                     => $request->ligne[0][0],
                'compagnie'               => $idCompagnieIsActive[0]->id
            ]);
            $checkBonMarchEntre = DB::select("select count(*) as c from bonmarchandiseentree where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
            if($checkBonMarchEntre[0]->c >0)
            {
               $getNomberBon = DB::select("select max(number)+1 as number from bonmarchandiseentree where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
               $DataBonMarchEntree =
               [
                    'number'        => $getNomberBon[0]->number,
                    'idmarchandisentre'  => $MarchEntree->id,
                    'idcompanie'    => $idCompagnieIsActive[0]->id,
               ];
               $BonMarchEntree = DB::table('bonmarchandiseentree')->insert($DataBonMarchEntree);
            }
             else
            {
                $DataBonMarchEntree =
                [
                    'number'             => 1,
                    'idmarchandisentre'  => $MarchEntree->id,
                    'idcompanie'         => $idCompagnieIsActive[0]->id,
                ];
                $BonMarchEntree = DB::table('bonmarchandiseentree')->insert($DataBonMarchEntree);
            }
            foreach ($request->ligne as $key => $value)
            {

                $LigneMarchEntree = LigneMarchEntree::create([
                    'produit'                   => $value[3],
                    'qteentree'                 => $value[5],
                    'marchentree_id'               => $MarchEntree->id
                ]);
            }
            $BonSoriteByClient = DB::select('select * from marchsorites where client_id = ?',[$idClient[0]->id]);

            $numberBoxEntreForClient = (int)$request->totalentree;

            $calculRestDynamic = 0;
            $calculRestDynamic = $numberBoxEntreForClient;

            foreach ($BonSoriteByClient as $Bon) {
                $boxSortieForClient = (int)$Bon->reste;

                if ($calculRestDynamic != 0) {
                    if ($calculRestDynamic > $boxSortieForClient)
                    {

                        $resteId = DB::select('select reste from marchsorites where id = ?',[$Bon->id]);
                        $calculRestDynamic = $calculRestDynamic - (int)$resteId[0]->reste;
                        $UpdateReste = DB::select('update marchsorites set reste = 0 where id =?', [ $Bon->id]);
                    }
                    else if ($calculRestDynamic == $boxSortieForClient)
                    {
                        $UpdateReste = DB::select('update marchsorites set reste = 0 where  id = ?', [ $Bon->id]);
                        $calculRestDynamic = $calculRestDynamic - $boxSortieForClient;
                    }
                    else
                    {

                        if ($calculRestDynamic != 0)
                        {
                            $resteId = DB::select('select reste from marchsorites where id = ?',[$Bon->id]);
                            $calculRestDynamic =(int)$resteId[0]->reste -  $calculRestDynamic;

                            $UpdateReste = DB::select('update marchsorites set reste = ? where id = ?', [$calculRestDynamic, $Bon->id]);
                            $calculRestDynamic = 0;

                        }

                    }
                }
            }

            // check reste client = 0 or > 0
            $countNbSorite = DB::select("select count(*) as nbsorite from marchsorites where client_id = ? and is_retour = 0",[$idClient[0]->id]);
            $numberBoxSortieForClient = (int)$countNbSorite[0]->nbsorite;
            // check nombre box entre for client
            $countNbEntree = DB::select('select count(*) as nbentree from marchentree  where client_id = ?',[$idClient[0]->id]);
            $numberBoxEntreeForClient = (int)$countNbEntree;
            if($numberBoxEntreeForClient != $numberBoxSortieForClient)
            {
                $calculRest = $numberBoxSortieForClient - $numberBoxEntreeForClient;
                $updateReste = DB::select("update clients set reste = ? where id = ?",[$calculRest,$idClient[0]->id]);
                $updateIs_Retour = DB::select("update marchsorites set is_retour = 2 where client_id = ?",[$idClient[0]->id]);
            }
            else
            {
                if($numberBoxEntreeForClient == $numberBoxSortieForClient)
                {
                    $updateReste = DB::select("update clients set reste = 0 where id = ?",[$idClient[0]->id]);
                    $updateIs_Retour = DB::select("update marchsorites set is_retour = 1 where client_id = ?",[$idClient[0]->id]);
                }

            }
            $Stock = DB::select('select ifnull(Capacitstock,0) as Capacitstock ,ifnull(Quantitesortie,0) as Quantitesortie from stock');
            $QuantiteEntreeNew = (int)$request->totalentree;
            $CalculQuantiteSortieStock = (int)$Stock[0]->Quantitesortie - $QuantiteEntreeNew;
            $CalculQuantiteActuelle = (int)$Stock[0]->Capacitstock - $CalculQuantiteSortieStock;
            $updateStock = DB::select('update stock set Quantitesortie=? , Quantiteactuelle = ?',[$CalculQuantiteSortieStock,$CalculQuantiteActuelle]);
            $DeleteTmpMarchEntree = DB::select("delete from tmpmarchentree where user_id = ?",[Auth::user()->id]);


            ////
            $dateToday =  Carbon::now()->format('Y-m-d');


            $CheckTableIsNull = Historique::count();
            $nameClient = DB::select('select concat(c.nom," ",c.prenom) as client  from clients c where c.id =?',[$idClient[0]->id]);
            if($CheckTableIsNull == 0)
            {
                $historique = Historique::create([
                    'dateoperation'               =>$dateToday,
                    'client'                      =>$nameClient[0]->client,
                    'entree'                      =>$request->totalentree,
                    'sortie'                      => 0,
                    'status'                      =>'ME',
                    'total'                       =>$request->totalentree,
                ]);
            }
            else
            {
                $checkTotalInThisDate = DB::select("select count(*) as c from historique where dateoperation = ?",[$dateToday]);
                if($checkTotalInThisDate[0]->c == 0)
                {
                    $historique = Historique::create([
                        'dateoperation'               =>$dateToday,
                        'client'                      =>$nameClient[0]->client,
                        'entree'                      =>$request->totalentree,
                        'sortie'                      => 0,
                        'status'                      =>'ME',
                        'total'                       =>$request->totalentree,
                    ]);
                }
                else
                {
                    $checkLastRowStatusMS = DB::select('select id,total,status from historique order by id desc limit 1');

                        $historique = Historique::create([
                            'dateoperation'               =>$dateToday,
                            'client'                      =>$nameClient[0]->client,
                            'entree'                      =>$request->totalentree,
                            'sortie'                      => 0,
                            'status'                      =>'ME',
                            'total'                       =>0,
                        ]);
                        DB::select('update historique set total = total + ? where dateoperation = ? and total > 0',[$request->totalentree,$dateToday]);

                }


            }

            // 1- check client in table cumlVide
            $idCompagnieIsActive = DB::select("select id from compagnies where active = 'active' ");
            $CheckClientCumlMarchEntree = DB::select('select count(*) as c from table_cumlmarchandiseentree where idclient = ? and compagnie = ?'
            ,[$idClient[0]->id,$idCompagnieIsActive[0]->id]);
            if($CheckClientCumlMarchEntree[0]->c == 0)
            {
                $CumlCaisseMarchEntree = CumlMarchandiseEntree::create([
                    'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                    'cuml'              => $request->totalentree,
                    'idclient'          => $idClient[0]->id,
                    'nombre'            => $request->totalentree,
                    'compagnie'         => $idCompagnieIsActive[0]->id,
                    'idmarchaentre'     => $MarchEntree->id,
                ]);
            }
            else
            {
                $getLastCuml = DB::select('select sum(nombre) as cuml from table_cumlmarchandiseentree where idclient= ? and compagnie = ?',[$idClient[0]->id,
                $idCompagnieIsActive[0]->id]);
                $cumlFinale = $getLastCuml[0]->cuml + $request->totalentree;
                $CumlCaisseMarchEntree = CumlMarchandiseEntree::create([
                    'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                    'cuml'              => $cumlFinale,
                    'idclient'          => $idClient[0]->id,
                    'nombre'            => $request->totalentree,
                    'compagnie'         => $idCompagnieIsActive[0]->id,
                    'idmarchaentre'     => $MarchEntree->id,
                ]);
            }
            return response()->json([
                'status'    =>200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function GetMarchEntreeDashboard()
    {
        $IdCompagnieIsActive = DB::select("select id from compagnies where active ='active'");
       /*  $MarchEntree = DB::select("select me.cloturer,me.cin,me.id,totalentree,concat(c.nom,' ',c.prenom) as name,me.chauffeur,me.matricule,u.name as user,me.created_at
        from marchentree me,clients c,users u where me.client_id = c.id and me.user_id = u.id order by me.id desc"); */

        $MarchEntree = DB::select("select me.cloturer,me.cin,me.id,totalentree,concat(c.nom,' ',c.prenom) as name,me.chauffeur,me.matricule,u.name as user,me.created_at
        from marchentree me,clients c,users u where me.client_id = c.id and me.user_id = u.id and me.compagnie = ? order by me.id desc"
        ,[$IdCompagnieIsActive[0]->id]);

            return response()->json([
                'status'        =>200,
                'data'       => $MarchEntree,
                'Role'       => Auth::user()->role_name,
            ]);
    }

    public function ExtractBonMarchEntree($id)
    {

        $getMaxNumberBon = DB::select('select IFNULL(number, 1) AS number from bonmarchandiseentree where idmarchandisentre = ?',[$id]);
        $infos = Info::all();
        DB::select('update marchentree set cloturer = 1 where id =?',[$id]);
        $Clients = DB::select("select concat(c.nom,' ',c.prenom) as client from marchentree me ,clients c
                            where me.client_id = c.id and me.id=  ?",[$id]);
        $ChauffeurAndMatricule = DB::select('select matricule,chauffeur,cin from marchentree');

        $InfoBon = DB::select('select totalentree,client_id from marchentree where id = ?',[$id]);

        $Data = DB::select("select qteentree,produit,
        (select cuml from table_cumlmarchandiseentree where idmarchaentre = ? limit 1) as cumul
        from lignemarchentree where marchentree_id = ?",
        [$id,$id]);

        $pdf            = PDF::loadView('Dashboard.PrintBonMachandisEntre',compact('Data','Clients','infos','ChauffeurAndMatricule','getMaxNumberBon'))
        ->setOptions(['defaultFnt' => 'san-serif'])->setPaper('a4');
        return $pdf->download('Bon d\'entrée Marchandise.pdf');

    }

    public function trashMarchandiseEntree(Request $request)
    {
        try
        {
            $DeteteLigneMarchandiseEntree = DB::select("delete from lignemarchentree where marchentree_id = ?",[$request->id]);
            $DeleteMarchandiseEntree =DB::select("delete from marchentree where id =?",[$request->id]);
            DB::select("delete from table_cumlmarchandiseentree where idmarchaentre = ?",[$request->id]);
            DB::select('delete from bonmarchandiseentree where idmarchandisentre = ?',[$request->id]);
            return response()->json([
                'status'       => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function exportDataMarchandiseEntree($id)
    {
        $Data = DB::table('marchentree')
                    ->join('clients','clients.id','=','marchentree.client_id')
                    ->select('marchentree.created_at',DB::raw('concat(clients.nom," ",clients.prenom) as clients'),'marchentree.totalentree','marchentree.chauffeur','marchentree.matricule')
                    ->where('clients.id','=',$id)
                    ->get();
        $ligne = DB::table('marchentree')
                    ->join('clients', 'clients.id', '=', 'marchentree.client_id')
                    ->join('lignemarchentree', 'lignemarchentree.marchentree_id', '=', 'marchentree.id')
                    ->select(DB::raw('lignemarchentree.created_at as dateLigne'), 'lignemarchentree.produit', 'lignemarchentree.qteentree')
                    ->where('clients.id','=',$id)
                    ->get();





                    return Excel::download(new MarchandiseEntreeExport($Data, $ligne), 'Fiche_Marchandise_Entree.xlsx');
    }



}
