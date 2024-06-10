<?php



namespace App\Http\Controllers;



use App\Models\Client;

use Illuminate\Http\Request;
use DB;


class ClientController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    /* function __construct()

    {

         $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index','show']]);

         $this->middleware('permission:client-create', ['only' => ['create','store']]);

         $this->middleware('permission:client-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:client-delete', ['only' => ['destroy']]);

    } */

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $clients = Client::latest()->paginate(5);

        return view('clients.index',compact('clients'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('Client.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);



        Client::create($request->all());



        return redirect()->route('Client.index')

                        ->with('success','Client created successfully.');

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Client  $client

     * @return \Illuminate\Http\Response

     */

    public function show(Client $client)

    {

        return view('Client.show',compact('client'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Client  $client

     * @return \Illuminate\Http\Response

     */

    public function edit(Client $client)

    {

        return view('Client.edit',compact('client'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Client  $client

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Client $client)

    {

         request()->validate([

            'nom' => 'required',

            'prenom' => 'required',

            'address' => 'required',

            'phone' => 'required',

        ]);



        $client->update($request->all());



        return redirect()->route('Client.index')

                        ->with('success','Client updated successfully');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Client  $client

     * @return \Illuminate\Http\Response

     */

    public function destroy(Client $client)

    {

        $client->delete();



        return redirect()->route('Client.index')

                        ->with('success','Client deleted successfully');

    }




    ///////////////////////////////////////////////////////////////////// Dashboard Admin ////////////////////////////////

    public function indexDashboard()
    {
        /* $DataFinal = DB::select('select dateoperation, client, sum(entree) as entree, sum(sortie) as sortie, sum(total) as total from historique  group by client, dateoperation;');

        $groupData = [];
        foreach ($DataFinal as $entry) {
            $date = $entry->dateoperation;
            $client = strtolower($entry->client);
            $entree = is_numeric($entry->entree) ? number_format($entry->entree, 2) : '0.00';
            $sortie = is_numeric($entry->sortie) ? number_format($entry->sortie, 2) : '0.00';
            $total = is_numeric($entry->total) ? number_format($entry->total, 2) : '0.00';

            if (!isset($groupData[$client])) {
                $groupData[$client] = [
                    'client' => $client,
                    'dates' => [],
                    'entree' => [],
                    'sortie' => [],
                    'total' => [],
                ];
            }

            $groupData[$client]['dates'][] = $date;
            $groupData[$client]['entree'][] = $entree;
            $groupData[$client]['sortie'][] = $sortie;
            $groupData[$client]['total'][] = $total;
        }

        // Extract unique dates
        $datesX = array_unique(array_merge(...array_column($groupData, 'dates')));
        $clientNamesX = array_keys($groupData); */










       return view('Dashboard.Client'/* , compact('groupData', 'datesX', 'clientNamesX'

        ) */);


}



    public function GetClientDashboard()
    {
        $clients = DB::select('
                            SELECT
                        id,
                        client,
                        SUM(caisseSortie) AS caisseSortie,
                        SUM(marchandiseSortie) AS marchandiseSortie,
                        SUM(marchandiseEntree) AS marchandiseEntree,
                        SUM(caisseEntree) AS caisseEntree,
                        (SUM(caisseSortie) + SUM(marchandiseSortie)) - (SUM(marchandiseEntree) + SUM(caisseEntree)) AS reste,
                        nom,
                        prenom,
                        phone,
                        address,
                        cin,
                        SUM(caisseSortie) + SUM(marchandiseSortie) AS totalSortie,
                        SUM(marchandiseEntree) + SUM(caisseEntree) AS totalEntree
                    FROM (
                        SELECT
                            c.id,
                            CONCAT(c.nom, " ", c.prenom) AS client,
                            nbbox AS caisseSortie,
                            0 AS marchandiseSortie,
                            0 AS marchandiseEntree,
                            0 AS caisseEntree,
                            c.nom,
                            c.prenom,
                            c.phone,
                            c.address,
                            c.cin
                        FROM
                        clients c
                        LEFT JOIN marchsorites m ON m.client_id = c.id

                        UNION ALL

                        SELECT
                            c.id,
                            CONCAT(c.nom, " ", c.prenom) AS client,
                            0 AS caisseSortie,
                            totalsortie AS marchandiseSortie,
                            0 AS marchandiseEntree,
                            0 AS caisseEntree,
                            c.nom,
                            c.prenom,
                            c.phone,
                            c.address,
                            c.cin
                        FROM
                            clients c
                        LEFT JOIN marchandisesortie m ON m.idclient = c.id

                        UNION ALL

                        SELECT
                            c.id,
                            CONCAT(c.nom, " ", c.prenom) AS client,
                            0 AS caisseSortie,
                            0 AS marchandiseSortie,
                            totalentree AS marchandiseEntree,
                            0 AS caisseEntree,
                            c.nom,
                            c.prenom,
                            c.phone,
                            c.address,
                            c.cin
                        FROM
                            clients c
                        LEFT JOIN marchentree m ON m.client_id = c.id

                        UNION ALL

                        SELECT
                            c.id,
                            CONCAT(c.nom, " ", c.prenom) AS client,
                            0 AS caisseSortie,
                            0 AS marchandiseSortie,
                            0 AS marchandiseEntree,
                            nbbox AS caisseEntree,
                            c.nom,
                            c.prenom,
                            c.phone,
                            c.address,
                            c.cin
                        FROM
                            clients c
                        LEFT JOIN caisseretour ca   ON ca.idclient = c.id
                    ) AS t
                    GROUP BY id;
                    ');

        $Sorite = DB::select("select sum(nbbox) as sorite from marchsorites;");
        $Entree = DB::select("select sum(totalentree) as entree from marchentree");
        $NumberClient = Client::count();
        return response()->json([
            'status'            =>200,
            'clients'           =>$clients,
            'NumberClient'      =>$NumberClient,
            'Sorite' => $Sorite[0]->sorite,
            'Entree' =>$Entree[0]->entree,
        ]);
    }

    public function StoreClientDashboard(Request $request)
    {
        try
        {
            $client = Client::create([
                'nom'               =>$request->nom,
                'prenom'            =>$request->prenom,
                'address'           =>$request->address,
                'phone'             =>$request->phone,
                'cin'               => $request->cin,
            ]);
            if($client)
            {
                return response()->json([
                    'status'        =>200,

                ]);
            }
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function EditClientDashboard(Request $request)
    {
        try
        {
            $client = Client::where('id',$request->id)->update([
                'nom'               =>$request->nom,
                'prenom'            =>$request->prenom,
                'address'           =>$request->address,
                'phone'             =>$request->phone,
                'cin'               =>$request->cin,
            ]);

            if($client)
            {
                return response()->json([
                    'status'        =>200,
                ]);
            }
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function TrashClientDashboard(Request $request)
    {
        try
        {
            $client = Client::where('id',$request->id)->delete();

            if($client)
            {
                return response()->json([
                    'status'        =>200,
                ]);
            }
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function FicheClient($id)
    {

        $Comapnie = DB::select("select id from compagnies where active = 'active'");
        if(count($Comapnie) == 0)
        {
            return redirect()->back();
        }
        $CaisseVide = DB::select('select date(created_at) as dateCaisseVide,sum(nbbox) as caisseVide from marchsorites where client_id = ? and compagnie = ?
        group by date(created_at)',[$id,$Comapnie[0]->id]);


        $caisseRetour = DB::select('select date(created_at) as dateCaisseRetour,sum(nbbox) as caisseRetour from caisseretour  where idclient = ? and compagnie = ?
        group by date(created_at)',[$id,$Comapnie[0]->id]);

        $MarchandiseEntree = DB::select('select date(created_at) as dateMarchadiseEntree, sum(totalentree) as totalEntree
         from marchentree where client_id = ? and compagnie = ? group by date(created_at)',[$id,$Comapnie[0]->id]);

        $MarchandiseSortie = DB::select('select date(created_at) as dateMarchadiseSortie, sum(totalsortie) as totalEntree
        from marchandisesortie where idclient = ? and compagnie =? group by date(created_at)',[$id,$Comapnie[0]->id]);


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

        // Calculate the totals
        $totals = [
            'caisseVide' => array_sum(array_column($mergedData, 'caisseVide')),
            'totalEntree' => array_sum(array_column($mergedData, 'totalEntree')),
            'totalSortie' => array_sum(array_column($mergedData, 'totalSortie')),
            'caisseRetour' => array_sum(array_column($mergedData, 'caisseRetour')),
        ];
        $clients = DB::select('select concat(c.nom," ",c.prenom) as client from clients c where id = ?',[$id]);

        $CaisseVide = DB::select('select sum(nbbox) as caisseSortie from marchsorites where client_id=?',[$id]);
        $CaisseRetour = DB::select('select  sum(nbbox) as caisseRetour from caisseretour where idclient = ?',[$id]);
        $reste = (int)($CaisseVide[0]->caisseSortie) - (int)($CaisseRetour[0]->caisseRetour);

        $CaisseEntreMarchandise = DB::select('select sum(totalentree) as totalEntree from marchentree where client_id = ?',[$id]);
        $CaisseSortieMarchandise = DB::select('select sum(totalsortie) as totalsortie from marchandisesortie where idclient = ?',[$id]);
        $resteMarchandise = (int)($CaisseEntreMarchandise[0]->totalEntree) - (int)($CaisseSortieMarchandise[0]->totalsortie);




        /////////////////
        $CaisseVidee = DB::select('select date(created_at) as dateCaisseVide,sum(nbbox) as caisseVide from marchsorites where client_id = ? and compagnie =?
        group by date(created_at)  order by date(created_at)',[$id,$Comapnie[0]->id]);

        $MarchandiseEntree = DB::select('select l.produit,sum(l.qteentree) as qteentree,date(l.created_at) as date
        from marchentree m ,lignemarchentree l
        where m.id = l.marchentree_id and m.client_id = ? and m.compagnie =? group by produit,date(l.created_at)  order by date(l.created_at)',[$id,$Comapnie[0]->id]);

        $MarchandiseSortiee = DB::select('select sum(l.qte) as qte,l.produit,date(l.created_at) as date
        from marchandisesortie m ,lignemarchandisesortie l
        where m.id = l.idmarchandisesortie and m.idclient = ? and m.compagnie = ? group by produit,date(l.created_at)  order by date(l.created_at)',[$id,$Comapnie[0]->id]);

        $caisseRetourr = DB::select('select date(created_at) as dateCaisseRetour,sum(nbbox) as caisseRetour from caisseretour  where idclient = ? and compagnie  =?
        group by date(created_at) order by date(created_at)',[$id,$Comapnie[0]->id]);

        $uniqueProductsEntree = array_unique(array_column($MarchandiseEntree, 'produit'));
        $uniqueProductsSortie = array_unique(array_column($MarchandiseSortiee, 'produit'));

        $ColSpanEntree = DB::select('select l.produit,l.qteentree,date(l.created_at) as date
        from marchentree m ,lignemarchentree l
        where m.id = l.marchentree_id and m.client_id=? and m.compagnie = ? group by produit',[$id,$Comapnie[0]->id]);

        $NumberColSpanEntre = count($ColSpanEntree);

        $ColSpanSortiee = DB::select('select l.qte,l.produit,date(l.created_at) as date
        from marchandisesortie m ,lignemarchandisesortie l
        where m.id = l.idmarchandisesortie and m.idclient = ? and m.compagnie = ? group by produit' ,[$id,$Comapnie[0]->id]);

        $NumberColSpanSortie = count($ColSpanSortiee);

       /*  usort($uniqueProductsSortie, function ($a, $b) {
            return strcmp($a[0], $b[0]);
        });

        // Output the sorted array



        usort($uniqueProductsEntree, function ($a, $b) {
            return strcmp($a[0], $b[0]);
        }); */


        // Group data by date for easy iteration in the Blade file

        $groupedData = [];

        foreach ($CaisseVidee as $caisse) {
            $date = $caisse->dateCaisseVide;
            $groupedData[$date] = [
                'caisseVide' => $caisse->caisseVide,
                'marchandiseEntree' => [],
                'marchandiseSortie' => [],
                'caisseRetour' => 0,
            ];
        }

        foreach ($MarchandiseEntree as $entree) {
            $date = $entree->date;
            $groupedData[$date]['marchandiseEntree'][$entree->produit] = $entree->qteentree;
        }

        foreach ($MarchandiseSortiee as $sortie) {
            $date = $sortie->date;
            $groupedData[$date]['marchandiseSortie'][$sortie->produit] = $sortie->qte;
        }

        foreach ($caisseRetourr as $retour) {
            $date = $retour->dateCaisseRetour;
            $groupedData[$date]['caisseRetour'] = $retour->caisseRetour;
        }


        ksort($groupedData);
        // Calculate totals for the footer
        $totalss = [
            'caisseVide' => 0,
            'entree' => [],
            'sortie' => [],
            'caisseRetour' => 0,
        ];

        foreach ($groupedData as $dateData) {
            $totalss['caisseVide'] += $dateData['caisseVide'] ?? 0;

            foreach ($uniqueProductsEntree as $product) {
                $totalss['entree'][$product] = ($totalss['entree'][$product] ?? 0) + ($dateData['marchandiseEntree'][$product] ?? 0);
            }

            foreach ($uniqueProductsSortie as $product) {
                $totalss['sortie'][$product] = ($totalss['sortie'][$product] ?? 0) + ($dateData['marchandiseSortie'][$product] ?? 0);
            }

            $totalss['caisseRetour'] += $dateData['caisseRetour'] ?? 0;

        }



        $AllCompangie = DB::select('select  *from compagnies');


        return view('Dashboard.StiuationStock.FicheClient')
        ->with('mergedData',$mergedData)
        ->with('totals',$totals)
        ->with('clients',$clients[0])
        ->with('reste' ,$reste)
        ->with('resteMarchandise' ,$resteMarchandise)
        ->with('AllCompangie',$AllCompangie)


        ///////////////
        ->with('CaisseVidee',$CaisseVidee)
        ->with('MarchandiseEntree',$MarchandiseEntree)
        ->with('MarchandiseSortiee',$MarchandiseSortiee)
        ->with('caisseRetourr',$caisseRetourr)
        ->with('uniqueProductsEntree',$uniqueProductsEntree)
        ->with('uniqueProductsSortie',$uniqueProductsSortie)
        ->with('NumberColSpanEntre',$NumberColSpanEntre)
        ->with('NumberColSpanSortie',$NumberColSpanSortie)
        ->with('groupedData',$groupedData)
        ->with('totalss',$totalss)
        ->with('idclient',$id)

        ;
    }

    public function getByCompanie(Request $request)
    {
        $Comapnie = DB::select("select id from compagnies where id = ?",[$request->idCompa]);

        $CaisseVide = DB::select('select sum(nbbox) as caisseSortie from marchsorites where client_id=? and compagnie =?',[$request->id,$request->idCompa]);
        $CaisseRetour = DB::select('select  sum(nbbox) as caisseRetour from caisseretour where idclient = ? and compagnie = ?',[$request->id,$request->idCompa]);
        $reste = (int)($CaisseVide[0]->caisseSortie) - (int)($CaisseRetour[0]->caisseRetour);

        $CaisseEntreMarchandise = DB::select('select sum(totalentree) as totalEntree from marchentree where client_id = ? and compagnie = ?',[$request->id,$Comapnie[0]->id]);
        $CaisseSortieMarchandise = DB::select('select sum(totalsortie) as totalsortie from marchandisesortie where idclient = ? and compagnie = ?',[$request->id,$Comapnie[0]->id]);
        $resteMarchandise = (int)($CaisseEntreMarchandise[0]->totalEntree) - (int)($CaisseSortieMarchandise[0]->totalsortie);

        $clients = DB::select('select concat(c.nom," ",c.prenom) as client from clients c where id = ?',[$request->id]);
        $CaisseVidee = DB::select('select date(created_at) as dateCaisseVide,sum(nbbox) as caisseVide from marchsorites where client_id = ? and compagnie =?
        group by date(created_at)  order by date(created_at)',[$request->id,$request->idCompa]);

        $MarchandiseEntree = DB::select('select l.produit,sum(l.qteentree) as qteentree,date(l.created_at) as date
        from marchentree m ,lignemarchentree l
        where m.id = l.marchentree_id and m.client_id = ? and m.compagnie =? group by produit,date(l.created_at)  order by date(l.created_at)',[$request->id,$request->idCompa]);

        $MarchandiseSortiee = DB::select('select sum(l.qte) as qte,l.produit,date(l.created_at) as date
        from marchandisesortie m ,lignemarchandisesortie l
        where m.id = l.idmarchandisesortie and m.idclient = ? and m.compagnie = ? group by produit,date(l.created_at)  order by date(l.created_at)',[$request->id,$request->idCompa]);

        $caisseRetourr = DB::select('select date(created_at) as dateCaisseRetour,sum(nbbox) as caisseRetour from caisseretour  where idclient = ? and compagnie  =?
        group by date(created_at) order by date(created_at)',[$request->id,$request->idCompa]);

        $uniqueProductsEntree = array_unique(array_column($MarchandiseEntree, 'produit'));
        $uniqueProductsSortie = array_unique(array_column($MarchandiseSortiee, 'produit'));

        $ColSpanEntree = DB::select('select l.produit,l.qteentree,date(l.created_at) as date
        from marchentree m ,lignemarchentree l
        where m.id = l.marchentree_id and m.client_id=? and m.compagnie = ? group by produit',[$request->id,$request->idCompa]);

        $NumberColSpanEntre = count($ColSpanEntree);

        $ColSpanSortiee = DB::select('select l.qte,l.produit,date(l.created_at) as date
        from marchandisesortie m ,lignemarchandisesortie l
        where m.id = l.idmarchandisesortie and m.idclient = ? and m.compagnie = ? group by produit' ,[$request->id,$request->idCompa]);

        $NumberColSpanSortie = count($ColSpanSortiee);

        usort($uniqueProductsSortie, function ($a, $b) {
            return strcmp($a[0], $b[0]);
        });

        // Output the sorted array



        usort($uniqueProductsEntree, function ($a, $b) {
            return strcmp($a[0], $b[0]);
        });


        // Group data by date for easy iteration in the Blade file
        $groupedData = [];

        foreach ($CaisseVidee as $caisse) {
            $date = $caisse->dateCaisseVide;
            $groupedData[$date] = [
                'caisseVide' => $caisse->caisseVide,
                'marchandiseEntree' => [],
                'marchandiseSortie' => [],
                'caisseRetour' => 0,
            ];
        }

        foreach ($MarchandiseEntree as $entree) {
            $date = $entree->date;
            $groupedData[$date]['marchandiseEntree'][$entree->produit] = $entree->qteentree;
        }

        foreach ($MarchandiseSortiee as $sortie) {
            $date = $sortie->date;
            $groupedData[$date]['marchandiseSortie'][$sortie->produit] = $sortie->qte;
        }

        foreach ($caisseRetourr as $retour) {
            $date = $retour->dateCaisseRetour;
            $groupedData[$date]['caisseRetour'] = $retour->caisseRetour;
        }

        ksort($groupedData);
        // Calculate totals for the footer
        $totalss = [
            'caisseVide' => 0,
            'entree' => [],
            'sortie' => [],
            'caisseRetour' => 0,
        ];

        foreach ($groupedData as $dateData) {
            $totalss['caisseVide'] += $dateData['caisseVide'] ?? 0;

            foreach ($uniqueProductsEntree as $product) {
                $totalss['entree'][$product] = ($totalss['entree'][$product] ?? 0) + ($dateData['marchandiseEntree'][$product] ?? 0);
            }

            foreach ($uniqueProductsSortie as $product) {
                $totalss['sortie'][$product] = ($totalss['sortie'][$product] ?? 0) + ($dateData['marchandiseSortie'][$product] ?? 0);
            }

            $totalss['caisseRetour'] += $dateData['caisseRetour'] ?? 0;

        }
        $AllCompangie = DB::select('select  *from compagnies');


        return view('Dashboard.StiuationStock.FicheClient')
        ->with('AllCompangie',$AllCompangie)


        ///////////////
        ->with('CaisseVidee',$CaisseVidee)
        ->with('MarchandiseEntree',$MarchandiseEntree)
        ->with('MarchandiseSortiee',$MarchandiseSortiee)
        ->with('caisseRetourr',$caisseRetourr)
        ->with('uniqueProductsEntree',$uniqueProductsEntree)
        ->with('uniqueProductsSortie',$uniqueProductsSortie)
        ->with('NumberColSpanEntre',$NumberColSpanEntre)
        ->with('NumberColSpanSortie',$NumberColSpanSortie)
        ->with('groupedData',$groupedData)
        ->with('totalss',$totalss)
        ->with('clients',$clients[0])
        ->with('reste' ,$reste)
        ->with('resteMarchandise' ,$resteMarchandise)
        ->with('idclient',$request->id);
    }

}
