<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::updateOrCreate([
                'nik' => $row['nik'],
                'email' => $row['email'],
                'slug' => Str::slug($row['nama_karyawan'], '-')
            ], [
                'nik' => $row['nik'],
                'name' => strtolower($row['nama_karyawan']),
                'email' => $row['email'],
                'password' => bcrypt('123456'),
                'role_id' => 1,
                'isAdmin' => 1,
                'slug' => Str::slug($row['nama_karyawan'], '-')
            ]);
            $user->save();

            $employee = Employee::updateOrCreate([
                'nik' => $row['nik'],
                'user_id' => $user->id,
                'slug' => Str::slug($row['nama_karyawan'], '-')
            ], [
                'nik' => $row['nik'],
                'name' => strtolower($row['nama_karyawan']),
                'username' => strtolower($row['nama_panggilan']),
                'place_of_birth' => $row['tempat_lahir'],
                'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
                'gender' => $row['jenis_kelamin'],
                'marital_status' => $row['status_pernikahan'],
                'religion' => $row['agama'],
                'joined_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_masuk_kerja']),
                'status' => $row['status_kerja'],
                'start_contract_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_kontrak_awal']),
                'end_contract_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_kontrak_berakhir']),
                'phone' => $row['nomor_handphone'],
                'address' => $row['alamat_sesuai_ktp'],
                'address2' => $row['alamat_domisili'],
                'education' => $row['pendidikan_terakhir'],
                'ktp' => $row['nomor_ktp'],
                'npwp' => $row['nomor_pokok_wajib_pajak'],
                'bpjs' => $row['nomor_bpjs_kesehatan'],
                'bpjamsostek' => $row['nomor_bpjamsostek'],
                'bank' => $row['nama_bank'],
                'bank_number' => $row['nomor_rekening_bank'],
                'pin' => 1234,
                'user_id' => $user->id,
                'slug' => Str::slug($row['nama_karyawan'], '-')
            ]);
            $employee->save();

            // dd($employee);
        }

        return 'success';
    }
}
