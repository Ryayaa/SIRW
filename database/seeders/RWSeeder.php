<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RWModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nama_lengkap' => 'Test-RW',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jalan Raya No. 123',
            'no_telepon' => '08123456789',
            'status' => 'Aktif',
            'mulai_jabatan' => '2020-01-01',
            'akhir_jabatan' => '2025-01-01',
            'username' => 'rwtiga',
            'password' => Hash::make('rwtiga'),
        ];

        // Tambahkan data lainnya sesuai kebutuhan
    DB::table('rw')->updateOrInsert($data);

    }
}
