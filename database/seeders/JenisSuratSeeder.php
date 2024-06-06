<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSuratPengantars = [
            ['nama_jenis' => 'Surat KTP'],
            ['nama_jenis' => 'Surat Kartu Keluarga'],
            ['nama_jenis' => 'Surat Pindah Tempat'],
            ['nama_jenis' => 'Surat Berkelakuan Baik'],
            ['nama_jenis' => 'Surat Pindah Tempat'],
            ['nama_jenis' => 'Surat Perlengkapan Nikah'],
            ['nama_jenis' => 'Lain - Lain'],
            // Tambahkan yang lainjika perlu
        ];

        foreach ($jenisSuratPengantars as $jenisSurat) {
            DB::table('jenis_surat_pengantar')->updateOrInsert(
                ['nama_jenis' => $jenisSurat['nama_jenis']],
            );
        }
    }
}
