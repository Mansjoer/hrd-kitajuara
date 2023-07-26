<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();
        $countActiveUser = User::where('status', 1)->get();
        $countUnactiveUser = User::where('status', 0)->get();
        return view('app.dashboard', compact('users', 'employees', 'countActiveUser', 'countUnactiveUser'));
    }
}
