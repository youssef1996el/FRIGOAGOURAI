<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Auth;
use DB;
class StockController extends Controller
{
    public function index()
    {


        $TotalCaisseSortie = DB::select("select ifnull(sum(nbbox),0) as caisseSortie from marchsorites");
        $TotalCaisseSortie = (int)$TotalCaisseSortie[0]->caisseSortie;

        $TotalCaisseMarchandiseSortie = DB::select("select ifnull(sum(totalsortie),0) as CaisseMarchandiseSortie from marchandisesortie");
        $TotalCaisseMarchandiseSortie = (int)$TotalCaisseMarchandiseSortie[0]->CaisseMarchandiseSortie;

        $TotalCaisseMArchandiseEntree = DB::select("select ifnull(sum(totalentree),0) as caisseMArchandiseEntree from marchentree");
        $TotalCaisseMArchandiseEntree = (int)$TotalCaisseMArchandiseEntree[0]->caisseMArchandiseEntree;

        $TotalCaisseRetour = DB::select("select ifnull(sum(nbbox),0) as CaisseRetour from caisseretour");
        $TotalCaisseRetour = (int)$TotalCaisseRetour[0]->CaisseRetour;

        /************************  */
        $TotalCaisseSortieFinal = $TotalCaisseSortie + $TotalCaisseMarchandiseSortie;

        $TotalCaisseEntreeFinale = $TotalCaisseMArchandiseEntree + $TotalCaisseRetour;


        $updateStock = DB::select('update stock set Quantitesortie = ? ,QuantitieEntree = ?',[$TotalCaisseSortieFinal,$TotalCaisseEntreeFinale]);
        $getStock    = DB::select("select ifnull(Capacitstock,0) as Capacitstock, ifnull(Quantitesortie,0) as Quantitesortie from stock");
        if(count($getStock) !=0)
        {
            $TotalQuantitieActuclle = (int)$getStock[0]->Capacitstock - ($TotalCaisseSortieFinal - $TotalCaisseEntreeFinale);
        }


        if(count($getStock) !=0)
        {
            $updateQuantiteactuelle = DB::select("update stock set Quantiteactuelle = ?",[   $TotalQuantitieActuclle]);
        }
        return view('Dashboard.Stock');
    }
    public function GetStock()
    {
        $Stock = DB::table('stock')
        ->join('users','users.id','=','stock.user_id')
        ->select('stock.Capacitstock', 'stock.Quantitesortie', 'stock.Quantiteactuelle', 'name', 'stock.created_at','stock.id','stock.QuantitieEntree')->get();
        return response()->json([
            'status'   =>200,
            'Stock'    =>$Stock
        ]);
    }
    public function StoreStock(Request $request)
    {
        try
        {
            $Stock = Stock::create([
                'Capacitstock'   =>$request->Capacitstock,
                'user_id'        =>Auth::user()->id,
            ]);
            if($Stock)
            {
                return response()->json([
                    'status'        =>200,
                ]);
            }
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

    public function EditStock(Request $request)
    {
        try
        {
            $UpdateStock = Stock::where('id','=',$request->id)->update([
                'Capacitstock'  =>$request->Capacitstock,
            ]);
            if($UpdateStock)
            {
                return response()->json([
                    'status'     =>200,
                ]);
            }
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

    public function TrashStock(Request $request)
    {
        try
        {
            $DeleteStock = Stock::where('id','=',$request->id)->delete();
            if($DeleteStock)
            {
                return response()->json([
                    'status' => 200,
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function SortieCaisseVide(Request $request)
    {

        $Compagnie = DB::select('select * from compagnies order by active asc');

        $perPage = 10;
        if(count($request->all()) == 0)
        {
            $CompagnieIsActive = DB::select('select id from compagnies where active = "active" ');

            /*$queryCaisseVide = DB::table('table_cumlcaissevides')
            ->join('clients', 'table_cumlcaissevides.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(table_cumlcaissevides.dateoperation, "%d-%m-%Y") as dateoperation'),
                 DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'), 'table_cumlcaissevides.cuml', 'table_cumlcaissevides.nombre')
            ->where('table_cumlcaissevides.compagnie','=',$CompagnieIsActive[0]->id)
            ->orderBy('table_cumlcaissevides.dateoperation', 'asc')
            ->get();*/

             $queryCaisseVide = DB::table('table_cumlcaissevides as tcs')
            ->join('clients', 'tcs.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tcs.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tcs.cuml) as cuml'),
                DB::raw('SUM(tcs.nombre) as nombre')
            )
            ->where('tcs.compagnie', '=', $CompagnieIsActive[0]->id)
            ->groupBy('clients.id', DB::raw('DATE(tcs.dateoperation)'))
            ->orderBy(DB::raw('DATE(tcs.dateoperation)'))
            ->get();
        }
        else
        {

            /*$queryCaisseVide = DB::table('table_cumlcaissevides')
                ->join('clients', 'table_cumlcaissevides.idclient', '=', 'clients.id')
                ->select(
                    DB::raw('DATE_FORMAT(table_cumlcaissevides.dateoperation, "%d-%m-%Y") as dateoperation'),
                    DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'),
                     'table_cumlcaissevides.cuml', 'table_cumlcaissevides.nombre')
                ->where('table_cumlcaissevides.compagnie','=',$request->compagnie)
                ->orderBy('table_cumlcaissevides.dateoperation', 'asc')
                ->get();*/


                 $queryCaisseVide = DB::table('table_cumlcaissevides as tcs')
                    ->join('clients', 'tcs.idclient', '=', 'clients.id')
                    ->select(
                        DB::raw('DATE_FORMAT(tcs.dateoperation, "%d-%m-%Y") AS dateoperation'),
                        DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                        DB::raw('SUM(tcs.cuml) as cuml'),
                        DB::raw('SUM(tcs.nombre) as nombre')
                    )
                    ->where('tcs.compagnie', '=', $request->compagnie)
                    ->groupBy('clients.id', DB::raw('DATE(tcs.dateoperation)'))
                    ->orderBy(DB::raw('DATE(tcs.dateoperation)'))
                    ->get();
        }



        $clientsCaisseVide = $queryCaisseVide->pluck('client')->unique()->toArray();
        $dataCaisseVide = [];
        $totalsCaisseVide = [];

        foreach ($queryCaisseVide as $item) {
            if (!isset($dataCaisseVide[$item->dateoperation][$item->client])) {
                foreach ($clientsCaisseVide as $client) {
                    $dataCaisseVide[$item->dateoperation][$client] = [
                        'nombre' => 0,
                        'Cuml' => 0,
                    ];
                }
            }

            $dataCaisseVide[$item->dateoperation][$item->client]['nombre'] = $item->nombre;
            $dataCaisseVide[$item->dateoperation][$item->client]['Cuml'] = $item->cuml;

            $totalsCaisseVide[$item->dateoperation]['totalNombre'] = isset($totalsCaisseVide[$item->dateoperation]['totalNombre'])
                ? $totalsCaisseVide[$item->dateoperation]['totalNombre'] + $item->nombre
                : $item->nombre;

            $totalsCaisseVide[$item->dateoperation]['totalCuml'] = isset($totalsCaisseVide[$item->dateoperation]['totalCuml'])
                ? $totalsCaisseVide[$item->dateoperation]['totalCuml'] + $item->cuml
                : $item->cuml;
        }

        $totalsCaisseVide['grandTotalNombre'] = array_sum(array_column($totalsCaisseVide, 'totalNombre'));
        $totalsCaisseVide['grandTotalCuml'] = array_sum(array_column($totalsCaisseVide, 'totalCuml'));


        return  view('Dashboard.StiuationStock.SortieCaisseVide')
        ->with('dataCaisseVide',$dataCaisseVide)
        ->with('clientsCaisseVide',$clientsCaisseVide)
        ->with('totalsCaisseVide',$totalsCaisseVide)
        ->with('Compagnie',$Compagnie)
        ->with('queryCaisseVide',$queryCaisseVide);
    }

    public function Entremarchandises(Request $request)
    {
        // ُentre macharchnadise
        $Compagnie = DB::select('select * from compagnies order by active asc ');
        $perPage = 10;

        if(count($request->all()) == 0)
        {
            $CompagnieIsActive = DB::select('select id from compagnies where active = "active" ');
            /*$query = DB::table('table_cumlmarchandiseentree')
            ->join('clients', 'table_cumlmarchandiseentree.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(table_cumlmarchandiseentree.dateoperation, "%d-%m-%Y") as dateoperation'),
                 DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'), 'table_cumlmarchandiseentree.cuml', 'table_cumlmarchandiseentree.nombre')
            ->where('table_cumlmarchandiseentree.compagnie','=',$CompagnieIsActive[0]->id)
            ->orderBy('table_cumlmarchandiseentree.dateoperation', 'asc')
            ->get();*/

            $query = DB::table('table_cumlmarchandiseentree as tce')
            ->join('clients', 'tce.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tce.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tce.cuml) as cuml'),
                DB::raw('SUM(tce.nombre) as nombre')
            )
            ->where('tce.compagnie', '=', $CompagnieIsActive[0]->id)
            ->groupBy('clients.id', DB::raw('DATE(tce.dateoperation)'))
            ->orderBy(DB::raw('DATE(tce.dateoperation)'))
            ->get();
        }
        else
        {
            /*$query = DB::table('table_cumlmarchandiseentree')
            ->join('clients', 'table_cumlmarchandiseentree.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(table_cumlmarchandiseentree.dateoperation, "%d-%m-%Y") as dateoperation'),
                 DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'), 'table_cumlmarchandiseentree.cuml', 'table_cumlmarchandiseentree.nombre')
            ->where('table_cumlmarchandiseentree.compagnie','=',$request->compagnie)
            ->orderBy('table_cumlmarchandiseentree.dateoperation', 'asc')
            ->get();
            */

            $query = DB::table('table_cumlmarchandiseentree as tce')
            ->join('clients', 'tce.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tce.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tce.cuml) as cuml'),
                DB::raw('SUM(tce.nombre) as nombre')
            )
            ->where('tce.compagnie', '=', $request->compagnie)
            ->groupBy('clients.id', DB::raw('DATE(tce.dateoperation)'))
            ->orderBy(DB::raw('DATE(tce.dateoperation)'))
            ->get();
        }

        $clientsMarchEntree = $query->pluck('client')->unique()->toArray();
        $dataMarchEntree = [];
        $totalsMarchEntree = [];
        foreach ($query as $item)
        {
            if (!isset($dataMarchEntree[$item->dateoperation][$item->client])) {
                foreach ($clientsMarchEntree as $client) {
                    $dataMarchEntree[$item->dateoperation][$client] = [
                        'nombre' => 0,
                        'Cuml' => 0,
                    ];
                }
            }

            $dataMarchEntree[$item->dateoperation][$item->client]['nombre'] = $item->nombre;
            $dataMarchEntree[$item->dateoperation][$item->client]['Cuml'] = $item->cuml;

            $totalsMarchEntree[$item->dateoperation]['totalNombre'] = isset($totalsMarchEntree[$item->dateoperation]['totalNombre'])
                ? $totalsMarchEntree[$item->dateoperation]['totalNombre'] + $item->nombre
                : $item->nombre;

            $totalsMarchEntree[$item->dateoperation]['totalCuml'] = isset($totalsMarchEntree[$item->dateoperation]['totalCuml'])
                ? $totalsMarchEntree[$item->dateoperation]['totalCuml'] + $item->cuml
                : $item->cuml;
        }
        $totalsMarchEntree['grandTotalNombre'] = array_sum(array_column($totalsMarchEntree, 'totalNombre'));
        $totalsMarchEntree['grandTotalCuml'] = array_sum(array_column($totalsMarchEntree, 'totalCuml'));


        return view('Dashboard.StiuationStock.MarchandiseEntre')


        ->with('dataMarchEntree',$dataMarchEntree)
        ->with('clientsMarchEntree',$clientsMarchEntree)
        ->with('totalsMarchEntree',$totalsMarchEntree)
        ->with('Compagnie',$Compagnie)
        ->with('query',$query);

        ;
    }

    public function SortieMarchandise(Request $request)
    {
        // marchandise Sortie
        $Compagnie = DB::select('select * from compagnies order by active asc ');
        $perPage = 10;
        if(count($request->all()) == 0)
        {
            $CompagnieIsActive = DB::select('select id from compagnies where active = "active" ');





            $query = DB::table('table_cumlmarchandisesortie as tcs')
            ->join('clients', 'tcs.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tcs.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tcs.cuml) as cuml'),
                DB::raw('SUM(tcs.nombre) as nombre')
            )
            ->where('tcs.compagnie', '=', $CompagnieIsActive[0]->id)
            ->groupBy('clients.id', DB::raw('DATE(tcs.dateoperation)'))
            ->orderBy(DB::raw('DATE(tcs.dateoperation)'))
            ->get();
        }
        else
        {
           /* $query = DB::table('table_cumlmarchandisesortie')
            ->join('clients', 'table_cumlmarchandisesortie.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(table_cumlmarchandisesortie.dateoperation, "%d-%m-%Y") as dateoperation'),
                 DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'), 'table_cumlmarchandisesortie.cuml', 'table_cumlmarchandisesortie.nombre')
            ->where('table_cumlmarchandisesortie.compagnie','=',$request->compagnie)
            ->orderBy('table_cumlmarchandisesortie.dateoperation', 'asc')
            ->get();*/





             $query = DB::table('table_cumlmarchandisesortie as tcs')
            ->join('clients', 'tcs.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tcs.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tcs.cuml) as cuml'),
                DB::raw('SUM(tcs.nombre) as nombre')
            )
            ->where('tcs.compagnie', '=', $request->compagnie)
            ->groupBy('clients.id', DB::raw('DATE(tcs.dateoperation)'))
            ->orderBy(DB::raw('DATE(tcs.dateoperation)'))
            ->get();


        }



        $clientsMarchSortie = $query->pluck('client')->unique()->toArray();
        $dataMarchSortie = [];
        $totalsMarchSortie = [];
        foreach ($query as $item)
        {
            if (!isset($dataMarchSortie[$item->dateoperation][$item->client])) {
                foreach ($clientsMarchSortie as $client) {
                    $dataMarchSortie[$item->dateoperation][$client] = [
                        'nombre' => 0,
                        'Cuml' => 0,
                    ];
                }
            }

            $dataMarchSortie[$item->dateoperation][$item->client]['nombre'] = $item->nombre;
            $dataMarchSortie[$item->dateoperation][$item->client]['Cuml'] = $item->cuml;

            $totalsMarchSortie[$item->dateoperation]['totalNombre'] = isset($totalsMarchSortie[$item->dateoperation]['totalNombre'])
                ? $totalsMarchSortie[$item->dateoperation]['totalNombre'] + $item->nombre
                : $item->nombre;

            $totalsMarchSortie[$item->dateoperation]['totalCuml'] = isset($totalsMarchSortie[$item->dateoperation]['totalCuml'])
                ? $totalsMarchSortie[$item->dateoperation]['totalCuml'] + $item->cuml
                : $item->cuml;
        }
        $totalsMarchSortie['grandTotalNombre'] = array_sum(array_column($totalsMarchSortie, 'totalNombre'));
        $totalsMarchSortie['grandTotalCuml'] = array_sum(array_column($totalsMarchSortie, 'totalCuml'));
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /* $querySortie = DB::select('select * from historique where status = "MS" order by dateoperation asc');
        $clientsSortie = array_unique(array_column($querySortie, 'client'));

        $dataSortie = [];
        $totalsSortie = [];
        foreach ($querySortie as $item)
        {

            if (!isset($dataSortie[$item->dateoperation][$item->client]))
            {
                foreach ($clientsSortie as $client)
                {
                    $dataSortie[$item->dateoperation][$client] = [
                        'nombre' => 0,
                        'Cuml' => 0,
                    ];
                }
            }

            $dataSortie[$item->dateoperation][$item->client]['nombre'] = $item->sortie;
            $dataSortie[$item->dateoperation][$item->client]['Cuml'] += $item->sortie;


            foreach ($clientsSortie as $client)
            {
                $dataSortie[$item->dateoperation][$client]['Cuml'] += $dataSortie[$item->dateoperation][$client]['nombre'];
            }

            $totalsSortie[$item->client] = isset($totalsSortie[$item->client]) ? $totalsSortie[$item->client] + $item->sortie : $item->sortie;
        } */
        return view('Dashboard.StiuationStock.MarchandiseSortie')
        /* ->with('dataSortie',$dataSortie)
        ->with('clientsSortie',$clientsSortie)
        ->with('totalsSortie',$totalsSortie) */


        ->with('dataMarchSortie',$dataMarchSortie)
        ->with('clientsMarchSortie',$clientsMarchSortie)
        ->with('totalsMarchSortie',$totalsMarchSortie)
        ->with('Compagnie',$Compagnie)
        ->with('query',$query);;
    }

    public function RetourdeMarchandise(Request $request)
    {
        $Compagnie = DB::select('select * from compagnies order by active asc');
        $perPage = 10;
        if(count($request->all()) == 0)
        {

            $CompagnieIsActive = DB::select('select id from compagnies where active = "active" ');

           /* $queryCaisseRetour = DB::table('table_cumlcaisseretours')
            ->join('clients', 'table_cumlcaisseretours.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(table_cumlcaisseretours.dateoperation, "%d-%m-%Y") as dateoperation'),
                 DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'), 'table_cumlcaisseretours.cuml', 'table_cumlcaisseretours.nombre')
            ->where('table_cumlcaisseretours.compagnie','=',$CompagnieIsActive[0]->id)
            ->orderBy('dateoperation', 'asc')
            ->get();*/

              $queryCaisseRetour= DB::table('table_cumlcaisseretours as tcs')
            ->join('clients', 'tcs.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tcs.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tcs.cuml) as cuml'),
                DB::raw('SUM(tcs.nombre) as nombre')
            )
            ->where('tcs.compagnie', '=', $CompagnieIsActive[0]->id)
            ->groupBy('clients.id', DB::raw('DATE(tcs.dateoperation)'))
            ->orderBy(DB::raw('DATE(tcs.dateoperation)'))
            ->get();
        }
        else
        {
           /* $queryCaisseRetour = DB::table('table_cumlcaisseretours')
            ->join('clients', 'table_cumlcaisseretours.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(table_cumlcaisseretours.dateoperation, "%d-%m-%Y") as dateoperation'),
                 DB::raw('CONCAT(clients.nom, " ", clients.prenom) as client'), 'table_cumlcaisseretours.cuml', 'table_cumlcaisseretours.nombre')
            ->where('table_cumlcaisseretours.compagnie','=',$request->compagnie)
            ->orderBy('dateoperation', 'asc')
            ->get();*/



            $queryCaisseRetour= DB::table('table_cumlcaisseretours as tcs')
            ->join('clients', 'tcs.idclient', '=', 'clients.id')
            ->select(
                DB::raw('DATE_FORMAT(tcs.dateoperation, "%d-%m-%Y") AS dateoperation'),
                DB::raw('CONCAT(clients.nom, " ", clients.prenom) AS client'),
                DB::raw('SUM(tcs.cuml) as cuml'),
                DB::raw('SUM(tcs.nombre) as nombre')
            )
            ->where('tcs.compagnie', '=', $request->compagnie)
            ->groupBy('clients.id', DB::raw('DATE(tcs.dateoperation)'))
            ->orderBy(DB::raw('DATE(tcs.dateoperation)'))
            ->get();
        }

        $clientsCaisseRetour = $queryCaisseRetour->pluck('client')->unique()->toArray();
        $dataCaisseRetour = [];
        $totalsCaisseRetour = [];
        foreach ($queryCaisseRetour as $item) {
            if (!isset($dataCaisseRetour[$item->dateoperation][$item->client])) {
                foreach ($clientsCaisseRetour as $client) {
                    $dataCaisseRetour[$item->dateoperation][$client] = [
                        'nombre' => 0,
                        'Cuml' => 0,
                    ];
                }
            }

            $dataCaisseRetour[$item->dateoperation][$item->client]['nombre'] = $item->nombre;
            $dataCaisseRetour[$item->dateoperation][$item->client]['Cuml'] = $item->cuml;

            $totalsCaisseRetour[$item->dateoperation]['totalNombre'] = isset($totalsCaisseVide[$item->dateoperation]['totalNombre'])
                ? $totalsCaisseRetour[$item->dateoperation]['totalNombre'] + $item->nombre
                : $item->nombre;

            $totalsCaisseRetour[$item->dateoperation]['totalCuml'] = isset($totalsCaisseRetour[$item->dateoperation]['totalCuml'])
                ? $totalsCaisseRetour[$item->dateoperation]['totalCuml'] + $item->cuml
                : $item->cuml;
        }
        $totalsCaisseRetour['grandTotalNombre'] = array_sum(array_column($totalsCaisseRetour, 'totalNombre'));
        $totalsCaisseRetour['grandTotalCuml'] = array_sum(array_column($totalsCaisseRetour, 'totalCuml'));
        //////////////////////////////////////
        $sumByDate = [];

        foreach ($dataCaisseRetour as $date => $values) {
            $sum = 0;
            foreach ($values as $item) {
                $sum += (float) $item['nombre']; // Convert to float for numerical addition
            }
            $sumByDate[$date] = $sum;
        }

        return view('Dashboard.StiuationStock.RetourCaisse')

        ->with('Compagnie',$Compagnie)
        ->with('dataCaisseRetour',$dataCaisseRetour)
        ->with('clientsCaisseRetour',$clientsCaisseRetour)
        ->with('totalsCaisseRetour',$totalsCaisseRetour)
        ->with('queryCaisseRetour',$queryCaisseRetour)
        ->with('totalSum',array_sum($sumByDate))
        ->with('sumByDate',$sumByDate);
    }

    public function bilangenrale(Request $request)
    {
        $Compagnie = DB::select('select * from compagnies order by active asc');
        if(count($request->all()) == 0)
        {
            $CompagnieIsActive = DB::select('select id from compagnies where active = "active" ');

            $CaisseVide = DB::select('select DATE_FORMAT(date(created_at), "%d-%m-%Y") as dateCaisseVide,sum(nbbox) as caisseVide from marchsorites where compagnie = ?
                                    group by date(created_at)',[$CompagnieIsActive[0]->id]);

            $caisseRetour = DB::select('select DATE_FORMAT(date(created_at), "%d-%m-%Y" ) as dateCaisseRetour,sum(nbbox) as caisseRetour from caisseretour where compagnie = ?
                                    group by date(created_at) asc',[$CompagnieIsActive[0]->id]);

            $MarchandiseEntree = DB::select('select DATE_FORMAT( date(created_at) ,"%d-%m-%Y") as dateMarchadiseEntree, sum(totalentree) as totalEntree
                                    from marchentree where compagnie = ? group by date(created_at) asc',[$CompagnieIsActive[0]->id]);

            $MarchandiseSortie = DB::select('select DATE_FORMAT( date(created_at) ,"%d-%m-%Y") as dateMarchadiseSortie, sum(totalsortie) as totalEntree
                                            from marchandisesortie where compagnie = ? group by date(created_at) asc',[$CompagnieIsActive[0]->id]);
        }
        else
        {
            $CaisseVide = DB::select('select DATE_FORMAT(date(created_at), "%d-%m-%Y") as dateCaisseVide,sum(nbbox) as caisseVide from marchsorites where compagnie = ?
                                    group by date(created_at) asc',[$request->compagnie]);

            $caisseRetour = DB::select('select DATE_FORMAT(date(created_at), "%d-%m-%Y" ) as dateCaisseRetour,sum(nbbox) as caisseRetour from caisseretour where compagnie = ?
                                    group by date(created_at) asc',[$request->compagnie]);

            $MarchandiseEntree = DB::select('select DATE_FORMAT( date(created_at) ,"%d-%m-%Y") as dateMarchadiseEntree, sum(totalentree) as totalEntree
                                    from marchentree where compagnie = ? group by date(created_at) asc',[$request->compagnie]);


            $MarchandiseSortie = DB::select('select DATE_FORMAT( date(created_at) ,"%d-%m-%Y") as dateMarchadiseSortie, sum(totalsortie) as totalEntree
                                            from marchandisesortie where compagnie = ? group by date(created_at) asc',[$request->compagnie]);
        }




        $mergedData = [];

        // Combine all unique dates from all datasets
        $allDates = array_unique(array_merge(
            array_column($CaisseVide, 'dateCaisseVide'),
            array_column($MarchandiseEntree, 'dateMarchadiseEntree'),
            array_column($MarchandiseSortie, 'dateMarchadiseSortie'),
            array_column($caisseRetour, 'dateCaisseRetour')
        ));

        // Create a base entry for each date
        foreach ($allDates as $date) {
            $mergedData[$date] = [
                'date' => $date,
                'caisseVide' => 0,
                'totalEntree' => 0,
                'totalSortie' => 0,
                'caisseRetour' => 0,
            ];
        }

        // Update entries with data from each dataset
        foreach ($CaisseVide as $caisseVideItem) {
            $date = $caisseVideItem->dateCaisseVide;
            $mergedData[$date]['caisseVide'] = $caisseVideItem->caisseVide;
        }

        foreach ($MarchandiseEntree as $entreeItem) {
            $date = $entreeItem->dateMarchadiseEntree;
            $mergedData[$date]['totalEntree'] = $entreeItem->totalEntree;
        }

        foreach ($MarchandiseSortie as $sortieItem) {
            $date = $sortieItem->dateMarchadiseSortie;
            $mergedData[$date]['totalSortie'] += $sortieItem->totalEntree;
        }

        foreach ($caisseRetour as $retourItem) {
            $date = $retourItem->dateCaisseRetour;
            $mergedData[$date]['caisseRetour'] += $retourItem->caisseRetour;
        }

        // Sort the merged data by date
        ksort($mergedData);

        $timestamps = array_map('strtotime', array_keys($mergedData));
        asort($timestamps);

        $sortedData = [];
        foreach ($timestamps as $timestamp) {
            $date = date('d-m-Y', $timestamp);
            $sortedData[$date] = $mergedData[$date];
        }



        $mergedData = $sortedData;

        // Calculate the totals
        $totals = [
            'caisseVide' => array_sum(array_column($mergedData, 'caisseVide')),
            'totalEntree' => array_sum(array_column($mergedData, 'totalEntree')),
            'totalSortie' => array_sum(array_column($mergedData, 'totalSortie')),
            'caisseRetour' => array_sum(array_column($mergedData, 'caisseRetour')),
        ];

        return view('Dashboard.StiuationStock.BilanGenerale')
        ->with('mergedData',$mergedData)
        ->with('totals',$totals)
        ->with('Compagnie',$Compagnie);
    }
}
