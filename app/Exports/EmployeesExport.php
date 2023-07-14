<?php

namespace App\Exports;

use Carbon\Carbon;
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
            'NAMA_KARYAWAN',
            'NAMA_PANGGILAN',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'JENIS_KELAMIN',
            'STATUS_PERNIKAHAN',
            'AGAMA',
            'TANGGAL_MASUK_KERJA',
            'STATUS_KERJA',
            'TANGGAL_KONTRAK_AWAL',
            'TANGGAL_KONTRAK_BERAKHIR',
            'NOMOR_HANDPHONE',
            'EMAIL',
            'ALAMAT_SESUAI_KTP',
            'ALAMAT_DOMISILI',
            'PENDIDIKAN_TERAKHIR',
            'NOMOR_KTP',
            'NOMOR_POKOK_WAJIB_PAJAK',
            'NOMOR_BPJS_KESEHATAN',
            'NOMOR_BPJAMSOSTEK',
            'NAMA_BANK',
            'NOMOR_REKENING_BANK',
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

        if ($employee->subDepartement != null) {
            $subDepartement = $employee->subDepartement->name;
        } else {
            $subDepartement = '-';
        }

        return [
            $employee->nik,
            $employee->name,
            $employee->username,
            $employee->place_of_birth,
            Carbon::parse($employee->date_of_birth,)->translatedFormat('d/m/Y'),
            $employee->gender,
            $employee->marital_status,
            $employee->religion,
            Carbon::parse($employee->joined_at,)->translatedFormat('d/m/Y'),
            $employee->status,
            Carbon::parse($employee->start_contract_at,)->translatedFormat('d/m/Y'),
            Carbon::parse($employee->end_contract_at,)->translatedFormat('d/m/Y'),
            $employee->phone,
            $employee->user->email,
            $employee->address,
            $employee->address2,
            $employee->education,
            $employee->ktp,
            $employee->npwp,
            $employee->bpjs,
            $employee->bpjamsostek,
            $employee->bank,
            $employee->bank_number,
        ];
    }
}
