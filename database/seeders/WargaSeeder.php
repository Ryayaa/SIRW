<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 3 data warga
        for ($i = 0; $i < 3; $i++) {
            DB::table('warga')->insert([
                'NKK' => '1234567890123456789',
                'NIK' => '123456789012345678',
                'nama_lengkap' => 'Nama Warga ' . ($i + 1),
                'jenis_kelamin' => $i % 2 == 0 ? 'L' : 'P',
                'alamat' => 'Alamat Warga ' . ($i + 1),
                'pekerjaan' => 'Pekerjaan Warga ' . ($i + 1),
                'status_perkawinan' => $i % 2 == 0 ? 'Kawin' : 'Belum Kawin',
                'password' => Hash::make('password'),
                'id_rt' => 1, // Ganti dengan ID RT yang sesuai
                'id_kategori_warga' => 1, // Ganti dengan ID kategori warga yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
