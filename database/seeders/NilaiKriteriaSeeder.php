<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Penghasilan
            ['id_kriteria' => 1, 'subkriteria' => 'Kurang dari 500.000', 'nilai' => 1],
            ['id_kriteria' => 1, 'subkriteria' => '500.000 - 1.500.000', 'nilai' => 2],
            ['id_kriteria' => 1, 'subkriteria' => '1.500.000 - 2.500.000', 'nilai' => 3],
            ['id_kriteria' => 1, 'subkriteria' => '2.500.000 - 3.500.000', 'nilai' => 4],
            ['id_kriteria' => 1, 'subkriteria' => 'Lebih dari 3.500.000', 'nilai' => 5],
            
            // Luas Rumah
            ['id_kriteria' => 2, 'subkriteria' => 'Kurang dari 50m²', 'nilai' => 1],
            ['id_kriteria' => 2, 'subkriteria' => '50m² - 100m²', 'nilai' => 2],
            ['id_kriteria' => 2, 'subkriteria' => '100m² - 150m²', 'nilai' => 3],
            ['id_kriteria' => 2, 'subkriteria' => '150m² - 200m²', 'nilai' => 4],
            ['id_kriteria' => 2, 'subkriteria' => 'Lebih dari 200m²', 'nilai' => 5],
            
            // SKTM
            ['id_kriteria' => 3, 'subkriteria' => 'Tidak ada', 'nilai' => 1],
            ['id_kriteria' => 3, 'subkriteria' => 'Ada', 'nilai' => 4],
            
            // Tagihan Listrik
            ['id_kriteria' => 4, 'subkriteria' => 'Kurang dari 100.000', 'nilai' => 1],
            ['id_kriteria' => 4, 'subkriteria' => '100.000 - 150.000', 'nilai' => 2],
            ['id_kriteria' => 4, 'subkriteria' => '150.000 - 200.000', 'nilai' => 3],
            ['id_kriteria' => 4, 'subkriteria' => '200.000 - 250.000', 'nilai' => 4],
            ['id_kriteria' => 4, 'subkriteria' => 'Lebih dari 250.000', 'nilai' => 5],
            
            // Tanggungan
            ['id_kriteria' => 5, 'subkriteria' => 'Kurang dari 3 orang', 'nilai' => 1],
            ['id_kriteria' => 5, 'subkriteria' => '3 - 5 orang', 'nilai' => 2],
            ['id_kriteria' => 5, 'subkriteria' => '5 - 7 orang', 'nilai' => 3],
            ['id_kriteria' => 5, 'subkriteria' => 'Lebih dari 7 orang', 'nilai' => 4],
            
            // Kondisi Rumah
            ['id_kriteria' => 6, 'subkriteria' => 'Sangat Buruk', 'nilai' => 1],
            ['id_kriteria' => 6, 'subkriteria' => 'Buruk', 'nilai' => 2],
            ['id_kriteria' => 6, 'subkriteria' => 'Baik', 'nilai' => 3],
            ['id_kriteria' => 6, 'subkriteria' => 'Sangat Baik', 'nilai' => 4],
            
            // Kesehatan dan Gizi
            ['id_kriteria' => 7, 'subkriteria' => 'Sangat Buruk', 'nilai' => 1],
            ['id_kriteria' => 7, 'subkriteria' => 'Buruk', 'nilai' => 2],
            ['id_kriteria' => 7, 'subkriteria' => 'Baik', 'nilai' => 3],
            ['id_kriteria' => 7, 'subkriteria' => 'Sangat Baik', 'nilai' => 4],
        ];

        DB::table('nilai_kriteria')->insert($data);
    }
}
