<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->today = date_format(date_create(Carbon::today()), "m F Y");
    }

    /* Start of Employees */
    public function exportEmployeesExcel()
    {
        return Excel::download(new EmployeesExport, 'Data karyawan kitajuara - ' . $this->today . '.xlsx');
    }

    public function exportEmployeesCsv()
    {
        return Excel::download(new EmployeesExport, 'Data karyawan kitajuara - ' . $this->today . '.csv');
    }

    public function importEmployees(Request $request)
    {
        // dd($this->today);
        $file = $request->file('file');
        if ($file) {
            Excel::import(new EmployeesImport, $file);
        }

        return redirect()->back();
    }
    /* End of Employees */
}
