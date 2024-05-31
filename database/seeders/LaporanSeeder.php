<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laporanMasalahs = [
            [
                'judul_laporan' => 'Masalah Jalan Rusak',
                'deskripsi' => 'Jalan di RT 03 rusak parah dan sulit dilalui kendaraan.',
                'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
                'gambar' => 'jalan_rusak.jpg',
                'status_hide' => 'y',

            ],
            [
                'judul_laporan' => 'Sampah Menumpuk',
                'deskripsi' => 'Sampah menumpuk di daerah pasar sejak 3 hari yang lalu.',
                'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
                'gambar' => 'sampah_menumpuk.jpg',
                'status_hide' => 't',

            ],
            [
                'judul_laporan' => 'Lampu Jalan Mati',
                'deskripsi' => 'Lampu jalan di jalan utama padam sejak seminggu yang lalu.',
                'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
                'gambar' => 'lampu_jalan_mati.jpg',
                'status_hide' => 't',
                
            ],
        ];

        foreach ($laporanMasalahs as $laporan) {
            DB::table('laporan_masalah')->updateOrInsert(
                [
                    'judul_laporan' => $laporan['judul_laporan'],
                    'deskripsi' => $laporan['deskripsi'],
                    'tanggal_laporan' => $laporan['tanggal_laporan'],
                    'gambar' => $laporan['gambar'],
                    'status_hide' => $laporan['status_hide'],
                    'id_warga' =>3,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]
            );
        }
    }
}
