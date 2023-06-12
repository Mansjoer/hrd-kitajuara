<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $query = Branch::geofence(-6.612107076575754, 106.7846570484128, 0, 0.300);
        // $dd = $query->first();
        // if ($dd != null) {
        //     return response()->json($dd);
        // } else {
        //     return response()->json('Gaada');
        // }
        return view('app.dashboard');
    }
}
