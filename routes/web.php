<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MarchSortieController;
use App\Http\Controllers\MarchEntreeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MarchandiseSortieController;
use App\Http\Controllers\ListOriginController;
use App\Http\Controllers\CaisseRetourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\CompanieController;

Route::get('/', function () {
    return view('auth.login');
    /*  return view('Expiring'); */
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function()
{

    Route::resource('roles',RoleController::class);

    Route::resource('users',UserController::class);

    Route::resource('clients',ClientController::class);

    Route::get('ClientSidebar'          ,[ClientController::class,'indexDashboard'      ]);
    Route::get('GetClientDashboard'     ,[ClientController::class,'GetClientDashboard'  ]);
    Route::post('StoreClientDashboard'  ,[ClientController::class,'StoreClientDashboard']);
    Route::post('EditClientDashboard'   ,[ClientController::class,'EditClientDashboard' ]);
    Route::post('TrashClientDashboard'  ,[ClientController::class,'TrashClientDashboard']);
    Route::get('FicheClient/{id}'            ,[ClientController::class,'FicheClient']);

    Route::get('Stock'                  ,[StockController::class,'index'                ]);
    Route::post('StoreStock'            ,[StockController::class,'StoreStock'           ]);
    Route::get('GetStock'               ,[StockController::class,'GetStock'             ]);
    Route::post('EditStock'             ,[StockController::class,'EditStock'            ]);
    Route::post('TrashStock'            ,[StockController::class,'TrashStock'           ]);
    Route::get('SortieCaisseVide'       ,[StockController::class,'SortieCaisseVide']);
    Route::get('Entremarchandises'      ,[StockController::class,'Entremarchandises']);
    Route::get('SortieMarchandise'      ,[StockController::class,'SortieMarchandise']);
    Route::get('RetourdeMarchandise'    ,[StockController::class,'RetourdeMarchandise']);
    Route::get('bilanGeneral'           ,[StockController::class,'bilangenrale']);

    Route::get('SortieCaisseByCompagnie',[StockController::class,'SortieCaisseVide']);
    Route::get('EntreeMarchandiseByCompagnie',[StockController::class,'Entremarchandises']);
    Route::get('SortieMarchByCompagnie'  ,[StockController::class,'SortieMarchandise']);
    Route::get('RetourByCompagnie'  ,[StockController::class,'RetourdeMarchandise']);
    Route::get('BilanByCompagnie'       ,[StockController::class,'bilangenrale']);
    Route::get('MarchSortie'            ,[MarchSortieController::class,'index'          ]);
    Route::get('GetMarchSorite'         ,[MarchSortieController::class,'GetMarchSorite' ]);
    Route::post('StoreMarchandiseSortieCaisse',[MarchSortieController::class,'StoreMarchandiseSortie']);
    Route::get('getIdClient'            ,[MarchSortieController::class,'getIdClient' ]);
    Route::post('EditBonSortie'         ,[MarchSortieController::class,'EditBonSortie'  ]);
    Route::post('TrashBonSortie'        ,[MarchSortieController::class,'TrashBonSortie'  ]);
    Route::get('ExtractBonSortie/{id}'  ,[MarchSortieController::class,'ExtractBonSortie' ]);
    Route::get('getChauffeurByClient'   ,[MarchSortieController::class,'getChauffeurByClient']);
    Route::get('getAttrChauffeur'   ,[MarchSortieController::class,'getAttrChauffeur']);
    Route::get('exportDataCaisseVide/{id}'  ,[MarchSortieController::class,'exportDataCaisseVide']);


    Route::get('MarchEntree'                ,[MarchEntreeController::class,'index'           ]);
    Route::get('GetTmpMachaEntree'          ,[MarchEntreeController::class,'GetTmpMachaEntree']);
    Route::post('StoreTmpMacheEntree'       ,[MarchEntreeController::class,'storeTmpMacheEntree']);
    Route::get('TrashTmpMarchEntree'        ,[MarchEntreeController::class,'TrashTmpMarchEntree']);
    Route::get('GetMarchEntreeDashboard'    ,[MarchEntreeController::class,'GetMarchEntreeDashboard']);
    Route::post('EditMarchandiseEntree'     ,[MarchEntreeController::class,'EditMarchandiseEntree']);
    Route::post('StoreMarchEntreeAndLigne'   ,[MarchEntreeController::class,'StoreMarchEntreeAndLigne']);
    Route::get('ExtractBonMarchEntree/{id}'  ,[MarchEntreeController::class,'ExtractBonMarchEntree']);
    Route::post('trashMarchandiseEntree'     ,[MarchEntreeController::class,'trashMarchandiseEntree']);
    Route::get('exportDataMarchandiseEntree/{id}' ,[MarchEntreeController::class,'exportDataMarchandiseEntree']);

    Route::get('MarchandiseSortie'           ,[MarchandiseSortieController::class,'index']);
    Route::get('GetTmpMarchandisSortie'      ,[MarchandiseSortieController::class,'GetTmpMarchandisSortie']);
    Route::post('StoreTmpMarchandiseSortie'  ,[MarchandiseSortieController::class,'StoreTmpMarchandiseSortie']);
    Route::post('TrashTmpMarchandiseSortie'  ,[MarchandiseSortieController::class,'TrashTmpMarchandiseSortie']);
    Route::get('checkTmpIsNotNull'           ,[MarchandiseSortieController::class,'CheckTmpIsNotNull']);
    Route::post('StoreMarchandiseSortie'     ,[MarchandiseSortieController::class,'StoreMarchandiseSortie']);
    Route::get('GetMarchandiseSortie'        ,[MarchandiseSortieController::class,'GetMarchandiseSortie']);
    Route::get('ExtractBonMarchandiseSortie/{id}',[MarchandiseSortieController::class,'ExtractBonMarchandiseSortie']);
    Route::post('trashMarchandiseSortie'    ,[MarchandiseSortieController::class,'trashMarchandiseSortie']);
    Route::get('exportDataMarchandiseSortie/{id}',[MarchandiseSortieController::class,'exportDataMarchandiseSortie']);

    Route::get('info'                        ,[InfoController::class,'index']);
    Route::post('StoreInfo'                  ,[InfoController::class,'StoreInfo']);
    Route::post('UpdateInfo'                 ,[InfoController::class,'UpdateInfo']);

    Route::get('ListOrigin'                  ,[ListOriginController::class,'index']);
    Route::post('StoreOrigine'               ,[ListOriginController::class,'StoreOrigine']);
    Route::post('EditOrigine'               ,[ListOriginController::class,'EditOrigine']);
    Route::post('TrashOrigine'               ,[ListOriginController::class,'TrashOrigine']);


    Route::get('CaisseRetour'               ,[CaisseRetourController::class,'index']);
    Route::get('getCaisseRetour'             ,[CaisseRetourController::class,'getCaisseRetour']);
    Route::post('StoreCaisseRetour'             ,[CaisseRetourController::class,'StoreCaisseRetour']);
    Route::get('getDataById'             ,[CaisseRetourController::class,'getDataById']);
    Route::post('EditCaisseRetour'             ,[CaisseRetourController::class,'EditCaisseRetour']);
    Route::post('TrashCaisseRetour'             ,[CaisseRetourController::class,'TrashCaisseRetour']);
    Route::get('ExtractBonCaisseRetour/{id}',[CaisseRetourController::class,'ExtractBonCaisseRetour']);
    Route::get('exportDataCaisseRetour/{id}',[CaisseRetourController::class,'exportDataCaisseRetour']);

    Route::get('Dashboard'                 ,[HomeController::class,'DashBoard'])->name('Dashboard');

    Route::get('NotAdmin',function()
    {
        return view('Dashboard.MarchSorite');
    })->name('NotAdmin');

    Route::get('GetDataReste'              ,[HomeController::class,'GetDataReste']);

    Route::get('Userss'                    ,[HomeController::class,'Userss']);
    Route::post('StoreUsers'               ,[HomeController::class,'StoreUsers']);
    Route::post('UpdateUsers'              ,[HomeController::class,'UpdateUsers']);
    Route::post('TrashUser'                ,[HomeController::class,'TrashUser']);

    Route::get('Chauffeur'                 ,[ChauffeurController::class,'index']);
    Route::get('GetChauffeur'                 ,[ChauffeurController::class,'GetChauffeur']);
    Route::post('StoreChauffeur'          ,[ChauffeurController::class,'storeChauffeur']);
    Route::get('EditChauffeur'            ,[ChauffeurController::class,'editChauffeur']);
    Route::post('UpdateChauffeur'         ,[ChauffeurController::class,'updateChauffeur']);
    Route::post('TrashChauffeur'         ,[ChauffeurController::class,'TrashChauffeur']);

    Route::get('Companie'               ,[CompanieController::class,'index']);
    Route::post('StoreCompagine'        ,[CompanieController::class,'StoreCompagine']);
    Route::post('UpdateCompagine'        ,[CompanieController::class,'UpdateCompagine']);
    Route::post('DeleteCompagnies'        ,[CompanieController::class,'DeleteCompagnies']);


    Route::get('getByCompanie'         ,[ClientController::class,'getByCompanie']);

});
/* Route::get('Dashboard',function()
{
    return view('Dashboard.Dashboard');
})->name('Dashboard'); */


