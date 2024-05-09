<?php

namespace Database\Seeders;

use App\Models\WargaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class testwarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WargaModel::updateOrCreate([
            'nik' => 'testNik',
            'nama_lengkap' => 'WargaTest',
            'tanggal_lahir' => '2000-02-09',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat_domisili' => 'Jl. Test3',
            'password' => Hash::make('12345'),
            'status_perkawinan' => 'Kawin',
            'pekerjaan' => 'karyawan',
            'id_keluarga' => 1
        ]);
    }
}
