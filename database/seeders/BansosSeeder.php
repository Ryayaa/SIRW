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
            'nama_bansos' => 'Bantuan Warga Kurang Mampu',
            'deskripsi' => 'Bantuan sosial bagi warga kurang mampu',
            'gambar' => 'Ini Gambar bansos',
        ];

        // Tambahkan data lainnya sesuai kebutuhan
        DB::table('bansos')->updateOrInsert($data);
    }
}
