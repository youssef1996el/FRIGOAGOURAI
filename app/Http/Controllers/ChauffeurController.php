<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use DB;
use Auth;
use App\Models\Chauffeur;
class ChauffeurController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('Dashboard.Chauffeur.index')->with('clients', $clients);
    }

    public function GetChauffeur()
    {
        $Chauffeur = DB::table('chauffeurs')

        ->join('users','users.id','=','chauffeurs.iduser')
        ->select('chauffeurs.*','users.name as nameuser')
        ->get();


        return response()->json([
            'status'   => 200,
            'data'     => $Chauffeur,
        ]);
    }

    public function storeChauffeur(Request $request)
    {

        try
        {
            $user = Chauffeur::create([
                'name'          => $request->nom,
                'cin'           => $request->cin,
                'matricule'     => $request->matricule,
                'idclient'      => $request->client,
                'iduser'        => Auth::user()->id,
                'phone'         => $request->phone,
            ]);
            return response()->json([
                'status'   => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function editChauffeur(Request $request)
    {
        $Chauffeur = DB::table('chauffeurs')
        ->join('clients', 'clients.id', '=', 'chauffeurs.idclient')
        ->join('users','users.id','=','chauffeurs.iduser')
        ->select('chauffeurs.*', 'clients.id as idclient','users.name as nameuser')
        ->where('chauffeurs.id','=',$request->id)
        ->get();
        return response()->json([
            'status'   => 200,
            'data'     => $Chauffeur[0],
        ]);
    }

    public function UpdateChauffeur(Request $request)
    {
        try
        {
            $user = Chauffeur::where('id',$request->id)->update([
                'name'              => $request->nom,
                'cin'               => $request->cin,
                'matricule'         => $request->matricule,
                'idclient'          => $request->client,
                'phone'             => $request->telephone,

            ]);
            return response()->json([
                'status'   => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function TrashChauffeur(REquest $request)
    {
        $user = Chauffeur::where('id',$request->id)->delete();
        return response()->json([
            'status'   => 200,
        ]);
    }
}
