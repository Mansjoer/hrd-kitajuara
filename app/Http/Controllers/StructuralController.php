<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\SubDepartement;

class StructuralController extends Controller
{
    public function index()
    {
        $departemens = Departement::select('name', 'slug')->withCount('employee')->get();
        $subDepartemens = SubDepartement::select('name', 'slug')->withCount('employee')->get();
        return view('app.structure', compact('departemens', 'subDepartemens'));
    }

    public function addDepartement(Request $request)
    {
        $response = Departement::create([
            'name' => ucwords($request->name),
            'slug' => Str::slug($request->name, '-'),
        ]);
        return response()->json($response);
    }

    public function addSubDepartement(Request $request)
    {
        $response = SubDepartement::create([
            'name' => ucwords($request->name),
            'slug' => Str::slug($request->name, '-'),
        ]);
        return response()->json($response);
    }

    public function deleteDepartement(Request $request)
    {
        $data = Departement::where('slug', $request->slug)->first();
        $data->delete();
        return response()->json($data);
    }

    public function deleteSubDepartement(Request $request)
    {
        $data = SubDepartement::where('slug', $request->slug)->first();
        $data->delete();
        return response()->json($data);
    }
}
