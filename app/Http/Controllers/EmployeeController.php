<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data = $request->cari;
            $employees = Employee::join('users', 'employees.user_id', '=', 'users.id')
                ->join('branches', 'employees.branch_id', '=', 'branches.id')
                ->join('departements', 'employees.division_id', '=', 'departements.id')
                ->join('positions', 'employees.position_id', '=', 'positions.id')
                ->where('users.nik', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('users.name', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('branches.name', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('positions.name', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('departements.name', 'LIKE', "%" . $request->cari . "%")
                ->get();
        } else {
            $employees = Employee::join('users', 'employees.user_id', '=', 'users.id')
                ->join('branches', 'employees.branch_id', '=', 'branches.id')
                ->join('departements', 'employees.division_id', '=', 'departements.id')
                ->join('positions', 'employees.position_id', '=', 'positions.id')->paginate(10);
            // dd($employees);
            $data = '';
        }
        return view('app.pages.employees.index', compact('employees', 'data'));
    }

    public function create()
    {
        $branches = Branch::all();
        $departements = Departement::all();
        $positions = Position::all();
        $roles = Role::all();
        return view('app.pages.employees.create', compact('branches', 'departements', 'positions', 'roles'));
    }

    public function postcreate(Request $request)
    {
        $users = new User();
        $users->nik = 'DBH' . $request->nik;
        $users->name = $request->name;
        $users->email = $request->email . '@dbeautyhouse.co.id';
        $users->password = bcrypt(123456);
        $users->role_id = $request->role;
        $users->isAdmin = $request->isAdmin;
        $users->slug = Str::slug($request->name, '-');
        $users->save();

        $em = new Employee();
        $em->nik = 'DBH' . $request->nik;
        $em->phone = $request->phone;
        $em->address = $request->address;
        $em->address2 = $request->address2;
        $em->gender = $request->gender;
        $em->religion = $request->religion;
        $em->place_of_birth = $request->placeBirth;
        $em->date_of_birth = date('Y-m-d', strtotime($request->dateBirth));
        $em->ktp = $request->ktp;
        $em->npwp = $request->npwp;
        $em->bank = $request->bank;
        $em->bank_number = $request->bank_number;
        $em->branch_id = $request->branch;
        $em->division_id = $request->departement;
        $em->position_id = $request->position;
        $em->joined_at = date('Y-m-d', strtotime($request->joined_at));
        $em->status = $request->status;
        $em->period = $request->period;
        $em->user_id = $users->id;
        $em->slug = Str::slug($request->nik, '-');
        $em->save();

        return redirect()->route('app-employees');
    }

    public function delete(Request $request)
    {
        $users = User::where('nik', $request->nik)->first();
        $employees = Employee::where('nik', $request->nik)->first();
        $users->delete();
        $employees->delete();

        return response()->json();
    }
}
