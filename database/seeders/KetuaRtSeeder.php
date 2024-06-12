<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KetuaRtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ketua_rt')->insert([
            ['id_warga' => 1, 'id_rt' => 1, 'status' => 'aktif', 'mulai_jabatan' => '2020-01-01'],
            ['id_warga' => 2, 'id_rt' => 2, 'status' => 'aktif', 'mulai_jabatan' => '2020-01-01'],
            ['id_warga' => 3, 'id_rt' => 3, 'status' => 'aktif', 'mulai_jabatan' => '2020-01-01'],
            ['id_warga' => 4, 'id_rt' => 4, 'status' => 'aktif', 'mulai_jabatan' => '2020-01-01'],
            ['id_warga' => 5, 'id_rt' => 5, 'status' => 'aktif', 'mulai_jabatan' => '2020-01-01'],
        ]);    
    }
}
