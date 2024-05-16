<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RTModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'no_rt' => 'RT-Test',
            'nama_lengkap' => 'Test-RT',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jalan Raya No. 123',
            'no_telepon' => '08123456789',
            'id_rw' => 1,
            'status' => 'Aktif',
            'mulai_jabatan' => '2020-01-01',
            'akhir_jabatan' => '2025-01-01',
        ];

        // Tambahkan data lainnya sesuai kebutuhan
    DB::table('rt')->updateOrInsert($data);

    }
}