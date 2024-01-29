<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Client;
use App\Models\Marchsortie;
use App\Models\MarchEntree;
use App\Models\MarchandiseSortie;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function DashBoard()
    {
        $clients = Client::count();

        $CaisseVide =Marchsortie::count();
        $MarchandiseEntre = MarchEntree::count();
        $MarchandiseSortie =MarchandiseSortie::count();
        return view('Dashboard.Dashboard')
        ->with('clients',$clients)
        ->with('CaisseVide',$CaisseVide)
        ->with('MarchandiseEntre',$MarchandiseEntre)
        ->with('MarchandiseSortie',$MarchandiseSortie);
    }

    public function GetDataReste()
    {
        $Data = DB::select("select sum(caisseSortie) - sum(caisseRetour) as rest , client from(
            select sum(nbbox) as caisseSortie,0 as caisseRetour,concat(c.nom,' ',c.prenom) as client  from marchsorites cv,clients c where cv.client_id = c.id  group by cv.client_id
                union all
            select 0 as caisseSortie, sum(nbbox) as caisseRetour,concat(c.nom,' ',c.prenom) as client from caisseretour cr,clients c where cr.idclient = c.id  group by cr.idclient

            ) as t group by client");

        return response()->json([
            'status'    => 200,
            'data'      => $Data,
        ]);
    }


    public function Userss()
    {
        $users = User::all();
        $roles = DB::select('select * from roles');
        return view('Dashboard.Users.index')->with('users',$users)->with('roles',$roles);
    }

    public function StoreUsers(Request $request)
    {
        try
        {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'role_name'=> $request->Role
            ]);

            $user->assignRole($request->input('Role'));
            return response()->json([
                'status'   => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function UpdateUsers(Request $request)
    {
        try {
            $user = User::where('id',$request->id)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'role_name'=> $request->Role
            ]);
            return response()->json([
                'status'   => 200,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function TrashUser(REquest $request)
    {
        try {
                $user = User::where('id', $request->id)->delete();
                return response()->json([
                    'status'   => 200,
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
