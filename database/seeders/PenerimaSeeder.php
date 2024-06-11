<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penerima_bansos')->insert([
            ['id_warga' => 3, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 4, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 5, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 6, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 7, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 8, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 9, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 10, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 11, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 12, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 13, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 14, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 15, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 16, 'id_bansos' => 1, 'status' => 'pending'],
            ['id_warga' => 17, 'id_bansos' => 1, 'status' => 'pending'],
            
        ]);
    }

}
