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
                'deskripsi' => 'Jalan di RT 03 rusak parah dan sulit dilalui kendaraan. Kondisi jalan yang rusak menyebabkan tidak hanya ketidaknyamanan bagi pengguna jalan, tetapi juga meningkatkan risiko kecelakaan lalu lintas. Perbaikan segera diperlukan untuk memastikan keselamatan dan kenyamanan bagi semua pengguna jalan di wilayah tersebut.',
                'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
                'gambar' => 'laporan_masalah/jalan_rusak.jpg',
                'status_hide' => 'y',
                'id_warga' => '11',
                'status_pengajuan' => 'wait',

            ],
            [
                'judul_laporan' => 'Sampah Menumpuk',
                'deskripsi' => 'Sampah menumpuk di daerah pasar sejak 3 hari yang lalu. Akumulasi sampah yang tidak tertangani dengan baik dapat menjadi sumber penyakit, pencemaran lingkungan, dan mengganggu keindahan serta kenyamanan lingkungan sekitar. Diperlukan tindakan cepat untuk membersihkan sampah dan mencegah dampak negatif yang lebih lanjut.',
                'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
                'gambar' => 'laporan_masalah/sampah_menumpuk.jpg',
                'status_hide' => 't',
                'id_warga' => '6',
                'status_pengajuan' => 'approved',

            ],
            [
                'judul_laporan' => 'Lampu Jalan Mati',
                'deskripsi' => 'Lampu jalan di jalan utama padam sejak seminggu yang lalu. Kondisi lampu jalan yang mati meningkatkan risiko kejahatan, kecelakaan lalu lintas, dan merugikan kenyamanan pengguna jalan pada malam hari. Perbaikan atau penggantian lampu jalan yang tidak berfungsi harus dilakukan segera untuk memastikan keamanan dan kenyamanan warga yang melintasi daerah tersebut pada malam hari.',
                'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
                'gambar' => 'laporan_masalah/lampu_mati.jpg',
                'status_hide' => 't',
                'id_warga' => '14',
                'status_pengajuan' => 'pending',
                
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
                    'status_pengajuan' => $laporan['status_pengajuan'],
                    'id_warga' =>$laporan['id_warga'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]
            );
        }
    }
}
