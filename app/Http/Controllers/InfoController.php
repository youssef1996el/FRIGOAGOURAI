<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Auth;
class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();
        return view('Dashboard.indexInfo')->with('infos',$infos);
    }

    public function StoreInfo(Request $request)
    {
        try
        {
            $info = Info::create([
                'name'              =>$request->titre,
                'telephone'         =>$request->Telephone,
                'ice'               =>$request->ICE,
                'if'                =>$request->IF,
                'capital'           =>$request->CAPITAL,
                'title'             =>$request->titre,
                'cb'                =>$request->cb,
                'societe'           =>$request->societe,
                'user_id'           =>Auth::user()->id,
            ]);

            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }

    }



    public function UpdateInfo(Request $request)
    {
        try {
            $updateInfo = Info::where('id','=',$request->id)->update([
                'name'              =>$request->titre,
                'telephone'         =>$request->Telephone,
                'ice'               =>$request->ICE,
                'if'                =>$request->IF,
                'capital'           =>$request->CAPITAL,
                'title'             =>$request->titre,
                'cb'                =>$request->cb,
                'societe'           =>$request->societe,
                'user_id'           =>Auth::user()->id,
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
