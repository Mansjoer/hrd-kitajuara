<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            'nik' => $row['NIK'],
            'name' => $row['Nama'],
            'email' => $row['Email'],
            'slug' => Str::slug($row['Nama'], '-')
        ]);
    }
}
