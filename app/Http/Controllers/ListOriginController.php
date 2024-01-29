<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListOrigin;
use Illuminate\Support\Facades\Validator;
class ListOriginController extends Controller
{
    public function index()
    {
        $ListOrigin = ListOrigin::all();
        return view('Dashboard.ListOrigin')->with('ListOrigin', $ListOrigin);
    }

    public function StoreOrigine(Request $request)
    {
        $rules = [
            'title' => ['required', 'string'],
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $ListOrigin = ListOrigin::create([
                'title'   => $request->title,
            ]);
            return redirect()->back()->with('success', 'ajouter avec succès');
        }
    }

    public function EditOrigine(Request $request)
    {
        $rules = [
            'title' => ['required', 'string'],
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {

            return response()->json([
                'status'   => 400,
                'text'     => 'Le champ titre est obligatoire',
            ]);
        }
        else
        {
            $ListOrigin = ListOrigin::where('id',$request->id)->update([
                'title'   => $request->title,
            ]);
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function TrashOrigine(Request $request)
    {
       /*  dd(123); */
        $trashOrigine = ListOrigin::where('id',$request->id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
