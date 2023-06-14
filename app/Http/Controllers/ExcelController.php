<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /* Start of Employees */
    public function exportEmployeesExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function exportEmployeesCsv()
    {
        return Excel::download(new EmployeesExport, 'employees.csv');
    }

    public function exportEmployeesPdf()
    {
        return Excel::download(new EmployeesExport, 'employees.pdf');
    }

    public function importEmployeesExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.pdf');
    }
    /* End of Employees */
}
