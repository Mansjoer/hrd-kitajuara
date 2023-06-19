<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmployeesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::orderBy('nik')->get();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Email',
            'No Handphone',
            'Alamat_KTP',
            'Alamat_Domisili',
            'Edukasi',
            'Kelamin',
            'Agama',
            'Tempat_Lahir',
            'Tanggal_Lahir',
            'Tanggal_Masuk',
            'Status',
            'Periode',
            'KTP',
            'NPWP',
            'Bank',
            'No_Rekening',
            'Cabang',
            'Departemen',
            'Jabatan',
        ];
    }

    public function map($employee): array
    {
        if ($employee->branch != null) {
            $branch = $employee->branch->name;
        } else {
            $branch = '-';
        }

        if ($employee->departement != null) {
            $departement = $employee->departement->name;
        } else {
            $departement = '-';
        }

        if ($employee->position != null) {
            $position =  $employee->position->name;
        } else {
            $position = '-';
        }
        return [
            $employee->nik,
            $employee->user->name,
            $employee->user->email,
            $employee->phone,
            $employee->address,
            $employee->address2,
            $employee->education,
            $employee->gender,
            $employee->religion,
            $employee->place_of_birth,
            $employee->date_of_birth,
            $employee->joined_at,
            $employee->status,
            $employee->period . ' Bulan',
            $employee->ktp,
            $employee->npwp,
            $employee->bank,
            $employee->bank_number,
            $branch,
            $departement,
            $position
        ];
    }
}
