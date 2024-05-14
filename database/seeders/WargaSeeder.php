<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [[
            'nik' => '111111',
            'nama_lengkap' => 'Test-User 1',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat_domisili' => 'Jl. Raya No. 123',
            'roles' => 'rw',
            'pekerjaan' => 'Pegawai',
            'status_perkawinan' => 'Kawin',
            'password' => Hash::make('testuser1'), // Sesuaikan dengan metode hash yang digunakan di aplikasi Anda
            'id_keluarga' => 1,

        ], [
            'nik' => '222222',
            'nama_lengkap' => 'Test-User 2',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat_domisili' => 'Jl. Raya No. 123',
            'roles' => 'rt',
            'pekerjaan' => 'Pegawai',
            'status_perkawinan' => 'Kawin',
            'password' => Hash::make('testuser2'), // Sesuaikan dengan metode hash yang digunakan di aplikasi Anda
            'id_keluarga' => 1,

        ], [
            'nik' => '333333',
            'nama_lengkap' => 'Test User 3',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat_domisili' => 'Jl. Raya No. 123',
            'pekerjaan' => 'Pegawai',
            'roles' => 'warga',
            'status_perkawinan' => 'Kawin',
            'password' => Hash::make('testuser3'), // Sesuaikan dengan metode hash yang digunakan di aplikasi Anda
            'id_keluarga' => 1,

        ]];
        DB::table('warga')->updateOrInsert($data);
        }
}
