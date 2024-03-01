<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Auth;
use App\Models\TmpMarchandiseSortie;
use DB;
use App\Models\MarchandiseSortie;
use App\Models\LigneMarchandiseSortie;
use App\Models\ListOrigin;
use PDF;
use App\Models\Bons;
use App\Models\Info;
use App\Models\Chauffeur;
use App\Models\BonMarchandiseSortie;
use App\Exports\MarchandiseSortieExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Historique;
use App\Models\CumlMarchandiseSortie;
class MarchandiseSortieController extends Controller
{
    public function index()
    {

        $clients = Client::all();
        $ListOrigin = ListOrigin::all();
        $cheuffeurs = Chauffeur::all();
        return view('Dashboard.MarchandiseSortie.index')->with('clients',$clients)
        ->with('ListOrigin',$ListOrigin)
        ->with('cheuffeurs',$cheuffeurs);
    }

    public function GetTmpMarchandisSortie(Request $request)
    {
        $Tmp = DB::select('select t.cin,t.chauffeur,t.matricule,t.id,t.nbbox,t.produit,concat(c.nom," ",c.prenom) as client from tmpmarchandisesortie t,clients c where t.idclient = c.id and t.idclient = ? and t.iduser = ?',[$request->idclient,Auth::user()->id]);
        $TotalByClientAndUser = DB::select('select ifnull(sum(nbbox),0) as totalsortie from tmpmarchandisesortie where idclient = ? and iduser = ?',[$request->idclient,Auth::user()->id]);

        return response()->json([
            'status'      =>200,
            'data'        =>$Tmp,
            'totalSortie' =>$TotalByClientAndUser[0]->totalsortie,
        ]);
    }

    public function StoreTmpMarchandiseSortie(Request $request)
    {
        $checkProduitExiste = DB::select("select id,count(*) as c from tmpmarchandisesortie where produit = ?",[$request->produit]);
        if($checkProduitExiste[0]->c != 0)
        {
            $updateNbBox = DB::select("update tmpmarchandisesortie set nbbox = nbbox + ? where  id = ?",
            [$request->nbbox,$checkProduitExiste[0]->id]);

            return response()->json([
                'status' =>         300,
            ]);
        }
        else
        {
            $TmpMarchandiseSortie = TmpMarchandiseSortie::create([
                'nbbox'             => $request->nbbox,
                'produit'           => trim($request->produit),
                'idclient'          => $request->idclient,
                'iduser'            => Auth::user()->id,
                'matricule'         => $request->matricule,
                'chauffeur'         => $request->chauffeur,
                'cin'               => $request->cin,
            ]);
            if($TmpMarchandiseSortie)
            {
                return response()->json([
                    'status'           => 200,
                ]);
            }
        }

    }

    public function TrashTmpMarchandiseSortie(Request $request)
    {
        try
        {
            $deleteTmp = TmpMarchandiseSortie::where('id',$request->id)->delete();
            return response()->json([
                'status'       => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function CheckTmpIsNotNull(Request $request)
    {
        try
        {

            $checkIsClientInTableTmp = DB::select("select count(*) as c from tmpmarchandisesortie where idclient = ? and iduser = ?",[$request->idclient,Auth::user()->id]);

            if($checkIsClientInTableTmp[0]->c == 0)
            {
                return response()->json([
                    'status' => 404
                ]);
            }
            else
            {
                return response()->json([
                    'status'    =>200,
                ]);
            }
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function StoreMarchandiseSortie(Request $request)
    {
        $GetDaTaFromTmp = DB::select("select * from tmpmarchandisesortie where idclient = ? and iduser = ?",[$request->idclient,Auth::user()->id]);
        $totalSortie = DB::select("select sum(nbbox) as total from tmpmarchandisesortie where idclient = ? and iduser = ?",[$request->idclient,Auth::user()->id]);
        $idCompagnieIsActive = DB::select('select id  from compagnies where active ="active"');
        $StoreMarchandiseSortie = MarchandiseSortie::create([
            'totalsortie'           => (int)$totalSortie[0]->total,
            'idclient'              => $request->idclient,
            'iduser'                => Auth::user()->id,
            'matricule'             => $GetDaTaFromTmp[0]->matricule,
            'chauffeur'              => $GetDaTaFromTmp[0]->chauffeur,
            'cin'                    => $GetDaTaFromTmp[0]->cin,
            'compagnie'               => $idCompagnieIsActive[0]->id
        ]);

        $checkBonMarchSortie = DB::select("select count(*) as c from bonmarchandisesortie where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
        if($checkBonMarchSortie[0]->c >0)
        {
           $getNomberBon = DB::select("select max(number)+1 as number from bonmarchandisesortie where idcompanie = ?",[$idCompagnieIsActive[0]->id]);
           $DataBonMarchSortie =
           [
                'number'                => $getNomberBon[0]->number,
                'idmarchandisesortie'   => $StoreMarchandiseSortie->id,
                'idcompanie'            => $idCompagnieIsActive[0]->id,
           ];
           $BonMarchSortie = DB::table('bonmarchandisesortie')->insert($DataBonMarchSortie);
        }
        else
        {
            $DataBonMarchSortie =
            [
                'number'               => 1,
                'idmarchandisesortie'  => $StoreMarchandiseSortie->id,
                'idcompanie'           => $idCompagnieIsActive[0]->id,
            ];
            $BonMarchSortie = DB::table('bonmarchandisesortie')->insert($DataBonMarchSortie);
        }

        // 1- check client in table cumlVide
        $idCompagnieIsActive = DB::select("select id from compagnies where active = 'active' ");

        $CheckClientCumlMarchSortie = DB::select('select count(*) as c from table_cumlmarchandisesortie where idclient = ? and compagnie = ?'
                                         ,[$request->idclient, $idCompagnieIsActive[0]->id]);
        if($CheckClientCumlMarchSortie[0]->c == 0)
        {
            $CumlCaisseMarchSortie = CumlMarchandiseSortie::create([
                'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                'cuml'              => (int)$totalSortie[0]->total,
                'idclient'          => $request->idclient,
                'nombre'            => (int)$totalSortie[0]->total,
                'compagnie'         => $idCompagnieIsActive[0]->id,
                'idmarchasortie'    => $StoreMarchandiseSortie->id,
            ]);
        }
        else
        {
            $getLastCuml = DB::select('select sum(nombre) as cuml from table_cumlmarchandisesortie where idclient= ? and compagnie = ?',[$request->idclient,$idCompagnieIsActive[0]->id]);
            $cumlFinale = $getLastCuml[0]->cuml + (int)$totalSortie[0]->total;
            $CumlCaisseMarchSortie = CumlMarchandiseSortie::create([
                'dateoperation'     => \Carbon\Carbon::now()->format('Y-m-d'),
                'cuml'              => $cumlFinale,
                'idclient'          => $request->idclient,
                'nombre'            => (int)$totalSortie[0]->total,
                'compagnie'         => $idCompagnieIsActive[0]->id,
                'idmarchasortie'    => $StoreMarchandiseSortie->id,
            ]);
        }

        foreach($GetDaTaFromTmp as $item)
        {
            $LigneMarchandiseSortie = LigneMarchandiseSortie::create([
                'qte'                   => $item->nbbox,
                'produit'               => $item->produit,
                'idmarchandisesortie'   => $StoreMarchandiseSortie->id
            ]);
        }

        DB::select('delete from tmpmarchandisesortie where idclient = ? and iduser = ?',[$request->idclient,Auth::user()->id]);

        $dateToday =  Carbon::now()->addDay()->format('Y-m-d');

        $Historique = Historique::where('dateoperation',$dateToday)->count();
        $nameClient = DB::select('select concat(c.nom," ",c.prenom) as client  from clients c where c.id =?',[$request->idclient]);
        $CheckTableIsNull = Historique::count();
        if($CheckTableIsNull == 0)
        {
            $historique = Historique::create([
                'dateoperation'               => $dateToday,
                'client'                      => $nameClient[0]->client,
                'entree'                      => 0,
                'sortie'                      => (int)$totalSortie[0]->total,
                'status'                      => 'MS',
                'total'                       => (int)$totalSortie[0]->total * (-1),
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
                    'entree'                      =>0,
                    'sortie'                      => (int)$totalSortie[0]->total,
                    'status'                      =>'MS',
                    'total'                       => (int)$totalSortie[0]->total * (-1),
                ]);
            }
            else
            {
                $historique = Historique::create([
                    'dateoperation'               =>$dateToday,
                    'client'                      =>$nameClient[0]->client,
                    'entree'                      =>0,
                    'sortie'                      => (int)$totalSortie[0]->total,
                    'status'                      =>'MS',
                    'total'                       =>0,
                ]);
                DB::select('update historique set total = total - ? where dateoperation = ? and total > 0',[(int)$totalSortie[0]->total,$dateToday]);
            }
        }

        return response()->json([
            'status'    => 200,
        ]);
    }

    public function GetMarchandiseSortie()
    {

        $IdCompagnieIsActive = DB::select("select id from compagnies where active ='active'");
        /* $MarchandiseSortie = DB::select("select m.cloturer,m.cin,m.chauffeur,m.matricule,m.id,m.totalsortie,
        concat(c.nom,' ',c.prenom) as client,u.name,m.created_at from marchandisesortie m ,clients c,users u where m.idclient = c.id and
         m.iduser = u.id order by m.id desc"); */
         $MarchandiseSortie = DB::select("select m.cloturer,m.cin,m.chauffeur,m.matricule,m.id,m.totalsortie,
        concat(c.nom,' ',c.prenom) as client,u.name,m.created_at from marchandisesortie m ,clients c,users u where m.idclient = c.id and
         m.iduser = u.id and m.compagnie = ? order by m.id desc",[$IdCompagnieIsActive[0]->id]);

        return response()->json([
            'status'      =>200,
            'data'        =>$MarchandiseSortie,
            'Role'        => Auth::user()->role_name,
        ]);
    }

    public function ExtractBonMarchandiseSortie($id)
    {

       $getMaxNumberBon = DB::select('select number from bonmarchandisesortie where idmarchandisesortie = ?',[$id]);
        $infos = Info::all();
        DB::select('update marchandisesortie set cloturer = 1 where id =?',[$id]);
        $Clients = DB::select("select concat(c.nom,' ',c.prenom) as client from marchandisesortie me ,clients c
                            where me.idclient = c.id and me.id=  ?",[$id]);
        $ChauffeurAndMatricule = DB::select('select matricule,chauffeur,cin from marchandisesortie where id =?',[$id]);

        $InfoBon = DB::select('select totalsortie,idclient from marchandisesortie where id = ?',[$id]);

        $Data = DB::select("select qte,produit,
        (select cuml from table_cumlmarchandisesortie where idmarchasortie = ? limit 1) as cumul
        from lignemarchandisesortie where idmarchandisesortie = ?",[$id,$id]);

         $pdf            = PDF::loadView('Dashboard.MarchandiseSortie.PrintBonMarchandiseSortie',compact('Data','Clients','infos','ChauffeurAndMatricule','getMaxNumberBon'))
        ->setOptions(['defaultFnt' => 'san-serif'])->setPaper('a4');
        return $pdf->download('Bon de sortie Marchandise.pdf');

    }

    public function trashMarchandiseSortie(Request $request)
    {
        try
        {
            $DeteteLigneMarchandiseSortie = DB::select("delete from lignemarchandisesortie where idmarchandisesortie = ?",[$request->id]);
            $DeleteMarchandiseSortie =DB::select("delete from marchandisesortie where id =?",[$request->id]);
            DB::select('delete from table_cumlmarchandisesortie where idmarchasortie = ?',[$request->id]);
            DB::select('delete from bonmarchandisesortie where idmarchandisesortie = ?',[$request->id]);
            return response()->json([
                'status'       => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }
    public function exportDataMarchandiseSortie($id)
    {
        $Data = DB::table('marchandisesortie')
                    ->join('clients','clients.id','=','marchandisesortie.idclient')
                    ->select('marchandisesortie.created_at',DB::raw('concat(clients.nom," ",clients.prenom) as clients'),'marchandisesortie.totalsortie','marchandisesortie.chauffeur','marchandisesortie.matricule')
                    ->where('clients.id','=',$id)
                    ->get();
        $ligne = DB::table('marchandisesortie')
                    ->join('clients', 'clients.id', '=', 'marchandisesortie.idclient')
                    ->join('lignemarchandisesortie', 'lignemarchandisesortie.idmarchandisesortie', '=', 'marchandisesortie.id')
                    ->select(DB::raw('lignemarchandisesortie.created_at as dateLigne'), 'lignemarchandisesortie.produit', 'lignemarchandisesortie.qte')
                    ->where('clients.id','=',$id)
                    ->get();
                    return Excel::download(new MarchandiseSortieExport($Data, $ligne), 'Fiche_Marchandise_Sortie.xlsx');
    }
}
