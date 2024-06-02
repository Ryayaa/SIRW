<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria_bansos')->insert([
            ['id_bansos' => 1,'nama' => 'Penghasilan', 'bobot' => 15, 'jenis' => 'Cost'],
            ['id_bansos' => 1,'nama' => 'Luas rumah', 'bobot' => 10, 'jenis' => 'Cost'],
            ['id_bansos' => 1,'nama' => 'SKTM', 'bobot' => 25, 'jenis' => 'Benefit'],
            ['id_bansos' => 1,'nama' => 'Tagihan listrik', 'bobot' => 10, 'jenis' => 'Benefit'],
            ['id_bansos' => 1,'nama' => 'Tanggungan', 'bobot' => 10, 'jenis' => 'Benefit'],
            ['id_bansos' => 1,'nama' => 'Kondisi Rumah', 'bobot' => 15, 'jenis' => 'Cost'],
            ['id_bansos' => 1,'nama' => 'Kesehatan dan Gizi', 'bobot' => 15, 'jenis' => 'Cost'],
        ]);
    }
}
