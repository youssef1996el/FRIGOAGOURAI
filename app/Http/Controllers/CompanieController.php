<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Compagine;
class CompanieController extends Controller
{
    public function index()
    {
        $Companie = Compagine::all();
        return view('Dashboard.Companie.index')->with('Companie', $Companie);
    }

    public function StoreCompagine(Request $request)
    {
        try
        {
            $CheckIsCompanieActive = DB::select('select count(*) as c from compagnies where active = "active"');
            if($CheckIsCompanieActive[0]->c !=0)
            {
                DB::select('update compagnies set active = "Deactivate" where active = "active" ');
            }
            $Compagine = Compagine::create([
                'name'       => $request->name,
                'active'     => $request->Situation,
            ]);
            return redirect()->back();
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function UpdateCompagine(Request $request)
    {
        try
        {

            $CheckIsCompanieActive = DB::select('select count(*) as c from compagnies where active = "active"');
            if($CheckIsCompanieActive[0]->c !=0)
            {
                DB::select('update compagnies set active = "Deactivate" where active = "active" ');
            }
            $Compagine = Compagine::where('id',$request->id)->update([
                'name'       => $request->name,
                'active'     => $request->Situation,
            ]);
            return redirect()->back();
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function DeleteCompagnies(Request $request)
    {
        try
        {

            $hasError = false;

            $CheckCompanieCaisseVide = DB::select('select count(*) as c from marchsorites where compagnie = ?',[$request->id]);
            if($CheckCompanieCaisseVide[0]->c != 0)
            {
                $hasError =true;
                return response()->json([
                    'status'      => 400,
                    'message'     => 'La compagnie a caisse vide'
                ]);
            }

            $CheckCompanieMarchandiseEntree = DB::select("select count(*) as c from marchentree where compagnie = ?",[$request->id]);

            if($CheckCompanieMarchandiseEntree[0]->c !=0)
            {
                $hasError = true;
                return response()->json([
                    'status'      => 400,
                    'message'     => 'La compagnie a marchandise entrée'
                ]);
            }

            $CheckCompanieMachandiseSortie = DB::select("select count(*) as c from marchandisesortie where compagnie = ?",[$request->id]);

            if($CheckCompanieMachandiseSortie[0]->c !=0)
            {
                $hasError = true;
                return response()->json([
                    'status'      => 400,
                    'message'     => 'La compagnie a marchandise sortie'
                ]);
            }

            $CheckCompanieCaisseRetour = DB::select("select count(*) as c from caisseretour where compagnie = ?",[$request->id]);
            if($CheckCompanieCaisseRetour[0]->c !=0)
            {
                $hasError = true;
                return response()->json([
                    'status'      => 400,
                    'message'     => 'La compagnie a retour de caisse'
                ]);
            }

            if(!$hasError)
            {

                Compagine::where('id', $request->id)->delete();
                return response()->json([
                    'status'      => 200,
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}
