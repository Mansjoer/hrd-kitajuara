<?php

namespace App\Imports;

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
                'slug' => Str::slug($row['nama'], '-')
            ], [
                'nik' => $row['nik'],
                'name' => $row['nama'],
                'email' => $row['email'],
                'password' => bcrypt('123456'),
                'role_id' => 1,
                'isAdmin' => 0,
                'slug' => Str::slug($row['nama'], '-')
            ]);
            $user->save();

            $employee = Employee::updateOrCreate([
                'nik' => $row['nik'],
                'user_id' => $user->id,
                'slug' => Str::slug($row['nik'], '-')
            ], [
                'nik' => $row['nik'],
                'phone' => $row['no_handphone'],
                'address' => $row['alamat_ktp'],
                'address2' => $row['alamat_domisili'],
                'education' => $row['edukasi'],
                'gender' => $row['kelamin'],
                'religion' => $row['agama'],
                'place_of_birth' => $row['tempat_lahir'],
                'date_of_birth' => $row['tanggal_lahir'],
                'joined_at' => $row['tanggal_masuk'],
                'status' => $row['status'],
                'period' => intval(preg_replace('/[^0-9]+/', '', $row['periode']), 10),
                'ktp' => $row['ktp'],
                'npwp' => $row['npwp'],
                'bank' => $row['bank'],
                'bank_number' => $row['no_rekening'],
                'pin' => 1234,
                'user_id' => $user->id,
                'slug' => Str::slug($row['nik'], '-')
            ]);
            $employee->save();
        }

        return 'success';
    }
}
