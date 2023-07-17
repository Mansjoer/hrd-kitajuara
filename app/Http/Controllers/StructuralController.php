<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\SubDepartement;
use Illuminate\Http\Request;

class StructuralController extends Controller
{
    public function index()
    {
        $departemens = Departement::select('name', 'slug')->withCount('employee')->get();
        $subDepartemens = SubDepartement::select('name', 'slug')->withCount('employee')->get();
        return view('app.structure', compact('departemens', 'subDepartemens'));
    }

    public function update()
    {
        $departemens = Departement::select('name', 'slug')->withCount('employee')->get();
        $subDepartemens = SubDepartement::select('name', 'slug')->withCount('employee')->get();
        return view('app.structure', compact('departemens', 'subDepartemens'));
    }

    public function updateDepartements()
    {
    }
}
