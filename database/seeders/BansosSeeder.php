<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_bansos' => 'Bantuan Warga Kurang Mampu',
                'deskripsi' => 'Bantuan Warga Kurang Mampu adalah program bantuan sosial yang ditujukan bagi warga yang berada dalam kondisi ekonomi yang kurang mampu atau rentan secara sosial. Program ini bertujuan untuk membantu memenuhi kebutuhan dasar warga yang kesulitan secara finansial.',
                'gambar' => 'Ini Gambar bansos',
            ],
            [
                'nama_bansos' => 'Program Keluarga Harapan',
                'deskripsi' => 'Program Keluarga Harapan, merupakan program bansos untuk meningkatkan kesejahteraan rakyat dengan melibatkan partisipasi kelompok penerima manfaat dalam menjaga kesehatan dan menyekolahkan anak-anaknya',
                'gambar' => 'Ini Gambar bansos',
            ],
            [
                'nama_bansos' => 'Program Indonesia Pintar',
                'deskripsi' => 'Program Indonesia Pintar merupakan program bantuan berupa uang dari pemerintah kepada peserta didik SD, SMP, SMA/SMK, dan sederajat baik formal maupun formal bagi keluarga miskin',
                'gambar' => 'Ini Gambar bansos',
            ],
            [
                'nama_bansos' => 'Bansos Rastra/ Bantuan Pangan Non Tunai',
                'deskripsi' => 'BPNT diharapkan dapat mengurangi beban pengeluaran KPM melalui pemenuhan sebagian kebutuhan pangan, memberikan bahan pangan dengan nutrisi yang lebih seimbang kepada KPM',
                'gambar' => 'Ini Gambar bansos',
            ],
        ];

        // Tambahkan data lainnya sesuai kebutuhan
        foreach ($data as $bansos) {
            DB::table('bansos')->updateOrInsert(['nama_bansos' => $bansos['nama_bansos']], $bansos);
        }

    }
}
