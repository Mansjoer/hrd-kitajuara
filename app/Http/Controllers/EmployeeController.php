<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        if ($request->has('search')) {
            $data = $request->search;
            $employees = Employee::join('users', 'employees.user_id', '=', 'users.id')
                ->join('branches', 'employees.branch_id', '=', 'branches.id')
                ->join('departements', 'employees.division_id', '=', 'departements.id')
                ->join('positions', 'employees.position_id', '=', 'positions.id')
                ->where('users.nik', 'LIKE', "%" . $request->search . "%")
                ->orWhere('users.name', 'LIKE', "%" . $request->search . "%")
                ->orWhere('branches.name', 'LIKE', "%" . $request->search . "%")
                ->orWhere('positions.name', 'LIKE', "%" . $request->search . "%")
                ->orWhere('departements.name', 'LIKE', "%" . $request->search . "%")
                ->paginate(10);
        } else {
            $data = '';
            $employees = Employee::select('*')->paginate(10);
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

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
        $branches = Branch::all();
        $departements = Departement::all();
        $positions = Position::all();
        $roles = Role::all();
        return view('app.pages.employees.edit', compact('user', 'branches', 'departements', 'positions', 'roles'));
    }

    public function update(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            'isAdmin' => $request->isAdmin,
            'slug' => Str::slug($request->name, '-')
        ]);
        $user->employee->update([
            'nik' => $request->nik,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'place_of_birth' => $request->placeBirth,
            'date_of_birth' => $request->dateBirth,
            'address' => $request->address,
            'address2' => $request->address2,
            'ktp' => $request->ktp,
            'npwp' => $request->npwp,
            'bank' => $request->bank,
            'bank_number' => $request->bank_number,
            'branch_id' => $request->branch,
            'division_id' => $request->departement,
            'position_id' => $request->position,
            'joined_at' => $request->joined_at,
            'status' => $request->status,
            'period' => $request->period,
            'slug' => Str::slug($request->nik, '-')
        ]);
        return redirect()->route('app-employees-edit', Str::slug($request->name, '-'))->with('success', 'success');
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
