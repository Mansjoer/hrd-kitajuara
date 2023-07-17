<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('app.dashboard');
    }
}
