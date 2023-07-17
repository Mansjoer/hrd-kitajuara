<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use Jenssegers\Date\Date;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubDepartement;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = $request->search;
            $employees = Employee::join('users', 'employees.user_id', '=', 'users.id')
                ->join('branches', 'employees.branch_id', '=', 'branches.id')
                ->join('departements', 'employees.departement_id', '=', 'departements.id')
                ->where('users.nik', 'LIKE', "%" . $request->search . "%")
                ->orWhere('users.name', 'LIKE', "%" . $request->search . "%")
                ->orWhere('branches.name', 'LIKE', "%" . $request->search . "%")
                ->orWhere('position', 'LIKE', "%" . $request->search . "%")
                ->orWhere('departements.name', 'LIKE', "%" . $request->search . "%")
                ->paginate(10);
        } else {
            $data = '';
            $employees = Employee::select('*')->paginate(10);
        }
        return view('app.pages.employees.index', compact('employees', 'data'));
    }

    public function downloadFormat()
    {
        $file = public_path('format\Format Karyawan Kita Juara.xlsx');

        return response()->download($file);
    }

    public function create()
    {
        $branches = Branch::all();
        $departements = Departement::all();
        $roles = Role::all();
        $subDepartements = SubDepartement::all();

        return view('app.pages.employees.create', compact('branches', 'departements', 'roles', 'subDepartements'));
    }

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
        $branches = Branch::all();
        $departements = Departement::all();
        $subDepartements = SubDepartement::all();
        $roles = Role::all();
        return view('app.pages.employees.edit', compact('user', 'branches', 'departements', 'roles', 'subDepartements'));
    }

    public function update(Request $request, $slug)
    {
        Date::setLocale('id');

        $user = User::where('slug', $slug)->first();

        $user->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email . '@dbeautyhouse.co.id',
            'isAdmin' => $request->isAdmin,
            'slug' => Str::slug($request->name, '-')
        ]);
        $user->employee->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'religion' => $request->religion,
            'gender' => $request->gender,
            'marital_status' => $request->maritalStatus,
            'place_of_birth' => $request->placeBirth,
            'date_of_birth' => Date::createFromFormat('d F Y', $request->dateBirth),
            'address' => $request->address,
            'address2' => $request->address2,
            'ktp' => $request->ktp,
            'npwp' => $request->npwp,
            'bpjs' => $request->bpjs,
            'bpjamsostek' => $request->bpjamsostek,
            'bank' => $request->bank,
            'bank_number' => $request->bank_number,
            'position' => $request->position,
            'departement_id' => $request->departement,
            'sub_departement_id' => $request->subDepartement,
            'company' => $request->company,
            'branch_id' => $request->branch,
            'joined_at' => Date::createFromFormat('d F Y', $request->joined_at),
            'status' => $request->status,
            'start_contract_at' => Date::createFromFormat('d F Y', $request->start_contract_at),
            'end_contract_at' => Date::createFromFormat('d F Y', $request->end_contract_at),
            'saldoCuti' => $request->saldoCuti,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('app-employees-edit', Str::slug($request->name, '-'))->with('success', 'success');
    }


    public function postcreate(Request $request)
    {
        $users = new User();
        $users->nik = $request->nik;
        $users->name = $request->name;
        $users->email = $request->email . '@dbeautyhouse.co.id';
        $users->password = bcrypt(123456);
        $users->role_id = 1;
        $users->isAdmin = 0;
        $users->slug = Str::slug($request->name, '-');
        $users->save();

        $em = new Employee();
        $em->nik = $request->nik;
        $em->name = $request->name;
        $em->username = $request->username;
        $em->phone = $request->phone;
        $em->religion = $request->religion;
        $em->gender = $request->gender;
        $em->marital_status = $request->maritalStatus;
        $em->place_of_birth = $request->placeBirth;
        $em->date_of_birth = Date::createFromFormat('d F Y', $request->dateBirth);
        $em->address = $request->address;
        $em->address2 = $request->address2;
        $em->ktp = $request->ktp;
        $em->npwp = $request->npwp;
        $em->bpjs = $request->bpjs;
        $em->bpjamsostek = $request->bpjamsostek;
        $em->bank = $request->bank;
        $em->bank_number = $request->bank_number;
        $em->position = $request->position;
        $em->departement_id = $request->departement;
        $em->sub_departement_id = $request->subDepartement;
        $em->company = $request->company;
        $em->branch_id = $request->branch;
        $em->joined_at = Date::createFromFormat('d F Y', $request->joined_at);
        $em->status = $request->status;
        $em->start_contract_at = Date::createFromFormat('d F Y', $request->start_contract_at);
        $em->end_contract_at = Date::createFromFormat('d F Y', $request->end_contract_at);
        $em->user_id = $users->id;
        $em->slug = Str::slug($request->name, '-');
        $em->save();
        // dd($em);


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
