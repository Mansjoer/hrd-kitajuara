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
            'Alamat KTP',
            'Alamat Domisili',
            'Edukasi',
            'Kelamin',
            'Agama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Tanggal Masuk',
            'Status',
            'Periode',
            'KTP',
            'NPWP',
            'Bank',
            'No Rekening',
            'Cabang',
            'Departemen',
            'Jabatan',
        ];
    }

    public function map($employee): array
    {
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
            $employee->branch->name,
            $employee->departement->name,
            $employee->position->name,
        ];
    }
}
