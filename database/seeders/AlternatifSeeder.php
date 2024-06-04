<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nilai_alternatif')->insert([
            ['id_penerima' => 1, 'id_kriteria' => 1, 'id_nilai' => 4],
            ['id_penerima' => 1, 'id_kriteria' => 2, 'id_nilai' => 8],
            ['id_penerima' => 1, 'id_kriteria' => 3, 'id_nilai' => 11],
            ['id_penerima' => 1, 'id_kriteria' => 4, 'id_nilai' => 17],
            ['id_penerima' => 1, 'id_kriteria' => 5, 'id_nilai' => 19],
            ['id_penerima' => 1, 'id_kriteria' => 6, 'id_nilai' => 24],
            ['id_penerima' => 1, 'id_kriteria' => 7, 'id_nilai' => 28],
            
            ['id_penerima' => 2, 'id_kriteria' => 1, 'id_nilai' => 5],
            ['id_penerima' => 2, 'id_kriteria' => 2, 'id_nilai' => 6],
            ['id_penerima' => 2, 'id_kriteria' => 3, 'id_nilai' => 11],
            ['id_penerima' => 2, 'id_kriteria' => 4, 'id_nilai' => 14],
            ['id_penerima' => 2, 'id_kriteria' => 5, 'id_nilai' => 20],
            ['id_penerima' => 2, 'id_kriteria' => 6, 'id_nilai' => 22],
            ['id_penerima' => 2, 'id_kriteria' => 7, 'id_nilai' => 28],
            
            ['id_penerima' => 3, 'id_kriteria' => 1, 'id_nilai' => 3],
            ['id_penerima' => 3, 'id_kriteria' => 2, 'id_nilai' => 8],
            ['id_penerima' => 3, 'id_kriteria' => 3, 'id_nilai' => 11],
            ['id_penerima' => 3, 'id_kriteria' => 4, 'id_nilai' => 15],
            ['id_penerima' => 3, 'id_kriteria' => 5, 'id_nilai' => 19],
            ['id_penerima' => 3, 'id_kriteria' => 6, 'id_nilai' => 25],
            ['id_penerima' => 3, 'id_kriteria' => 7, 'id_nilai' => 29],

            // Alternatif 4 (id_penerima 8)
            ['id_penerima' => 4, 'id_kriteria' => 1, 'id_nilai' => 1],
            ['id_penerima' => 4, 'id_kriteria' => 2, 'id_nilai' => 8],
            ['id_penerima' => 4, 'id_kriteria' => 3, 'id_nilai' => 11],
            ['id_penerima' => 4, 'id_kriteria' => 4, 'id_nilai' => 16],
            ['id_penerima' => 4, 'id_kriteria' => 5, 'id_nilai' => 21],
            ['id_penerima' => 4, 'id_kriteria' => 6, 'id_nilai' => 22],
            ['id_penerima' => 4, 'id_kriteria' => 7, 'id_nilai' => 28],

            // Alternatif 5 (id_penerima 9)
            ['id_penerima' => 5, 'id_kriteria' => 1, 'id_nilai' => 3],
            ['id_penerima' => 5, 'id_kriteria' => 2, 'id_nilai' => 10],
            ['id_penerima' => 5, 'id_kriteria' => 3, 'id_nilai' => 11],
            ['id_penerima' => 5, 'id_kriteria' => 4, 'id_nilai' => 16],
            ['id_penerima' => 5, 'id_kriteria' => 5, 'id_nilai' => 20],
            ['id_penerima' => 5, 'id_kriteria' => 6, 'id_nilai' => 22],
            ['id_penerima' => 5, 'id_kriteria' => 7, 'id_nilai' => 28],

            // Alternatif 6 (id_penerima 10)
            ['id_penerima' => 6, 'id_kriteria' => 1, 'id_nilai' => 1],
            ['id_penerima' => 6, 'id_kriteria' => 2, 'id_nilai' => 6],
            ['id_penerima' => 6, 'id_kriteria' => 3, 'id_nilai' => 12],
            ['id_penerima' => 6, 'id_kriteria' => 4, 'id_nilai' => 15],
            ['id_penerima' => 6, 'id_kriteria' => 5, 'id_nilai' => 20],
            ['id_penerima' => 6, 'id_kriteria' => 6, 'id_nilai' => 22],
            ['id_penerima' => 6, 'id_kriteria' => 7, 'id_nilai' => 27],

            // Alternatif 7 (id_penerima 11)
            ['id_penerima' => 7, 'id_kriteria' => 1, 'id_nilai' => 5],
            ['id_penerima' => 7, 'id_kriteria' => 2, 'id_nilai' => 6],
            ['id_penerima' => 7, 'id_kriteria' => 3, 'id_nilai' => 12],
            ['id_penerima' => 7, 'id_kriteria' => 4, 'id_nilai' => 14],
            ['id_penerima' => 7, 'id_kriteria' => 5, 'id_nilai' => 21],
            ['id_penerima' => 7, 'id_kriteria' => 6, 'id_nilai' => 22],
            ['id_penerima' => 7, 'id_kriteria' => 7, 'id_nilai' => 26],

            // Alternatif 8 (id_penerima 12)
            ['id_penerima' => 8, 'id_kriteria' => 1, 'id_nilai' => 3],
            ['id_penerima' => 8, 'id_kriteria' => 2, 'id_nilai' => 7],
            ['id_penerima' => 8, 'id_kriteria' => 3, 'id_nilai' => 11],
            ['id_penerima' => 8, 'id_kriteria' => 4, 'id_nilai' => 13],
            ['id_penerima' => 8, 'id_kriteria' => 5, 'id_nilai' => 21],
            ['id_penerima' => 8, 'id_kriteria' => 6, 'id_nilai' => 25],
            ['id_penerima' => 8, 'id_kriteria' => 7, 'id_nilai' => 27],

            // Alternatif 9 (id_penerima 13)
            ['id_penerima' => 9, 'id_kriteria' => 1, 'id_nilai' => 3],
            ['id_penerima' => 9, 'id_kriteria' => 2, 'id_nilai' => 8],
            ['id_penerima' => 9, 'id_kriteria' => 3, 'id_nilai' => 12],
            ['id_penerima' => 9, 'id_kriteria' => 4, 'id_nilai' => 13],
            ['id_penerima' => 9, 'id_kriteria' => 5, 'id_nilai' => 18],
            ['id_penerima' => 9, 'id_kriteria' => 6, 'id_nilai' => 23],
            ['id_penerima' => 9, 'id_kriteria' => 7, 'id_nilai' => 26],

            // Alternatif 10 (id_penerima 14)
            ['id_penerima' => 10, 'id_kriteria' => 1, 'id_nilai' => 4],
            ['id_penerima' => 10, 'id_kriteria' => 2, 'id_nilai' => 10],
            ['id_penerima' => 10, 'id_kriteria' => 3, 'id_nilai' => 12],
            ['id_penerima' => 10, 'id_kriteria' => 4, 'id_nilai' => 13],
            ['id_penerima' => 10, 'id_kriteria' => 5, 'id_nilai' => 19],
            ['id_penerima' => 10, 'id_kriteria' => 6, 'id_nilai' => 23],
            ['id_penerima' => 10, 'id_kriteria' => 7, 'id_nilai' => 27],
        ]);
    }
}
