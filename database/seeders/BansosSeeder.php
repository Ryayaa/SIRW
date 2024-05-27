<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bansos = [
            [
                'nama_bansos' => 'Program Keluarga Harapan',
                'deskripsi' => 'Program Keluarga Harapan merupakan program bansos untuk meningkatkan kesejahteraan rakyat dengan melibatkan partisipasi kelompok penerima manfaat dalam menjaga kesehatan dan menyekolahkan anak-anaknya.',
                'gambar' => 'bantuan-PKH.jpg',
            ],
            [
                'nama_bansos' => 'Program Indonesia Pintar',
                'deskripsi' => 'Program Indonesia Pintar merupakan program bantuan berupa uang dari pemerintah kepada peserta didik SD, SMP, SMA/SMK, dan sederajat baik formal maupun formal bagi keluarga miskin.',
                'gambar' => 'bantuan-PIP.jpg',
            ],
        ];

        foreach ($bansos as $item) {
            DB::table('bansos')->updateOrInsert(
                [
                    'nama_bansos' => $item['nama_bansos'],
                    'deskripsi' => $item['deskripsi'],
                    'gambar' => $item['gambar'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]
            );
        }
    }
}
