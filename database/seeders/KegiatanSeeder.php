<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatan = [
            [
                'nama_kegiatan' => 'Kerja Bakti',
                'deskripsi' => 'Kegiatan gotong royong untuk membersihkan lingkungan.',
                'lokasi' => 'Lapangan RT 01',
                'tanggal' => '2024-06-01',
                'waktu' => '07:00:00',
                'id_rt' => 1,
                'gambar' => 'kegiatan/kerjabakti.jpg',
            ],
            [
                'nama_kegiatan' => 'Musyawarah',
                'deskripsi' => 'Pertemuan warga untuk membahas rencana kegiatan.',
                'lokasi' => 'Balai Warga RT 01',
                'tanggal' => '2024-06-05',
                'waktu' => '18:00:00',
                'id_rt' => 1,
                'gambar' => 'kegiatan/musyawarah.jpg',
            ],
            [
                'nama_kegiatan' => 'Pemilihan RW',
                'deskripsi' => 'Pemilihan Ketua RW yang baru.',
                'lokasi' => 'Balai Warga RW 01',
                'tanggal' => '2024-06-10',
                'waktu' => '09:00:00',
                'id_rt' => 1,
                'gambar' => 'kegiatan/th.jpg',
            ],
            [
                'nama_kegiatan' => 'Pernikahan',
                'deskripsi' => 'Pernikahan Warga.',
                'lokasi' => 'Balai Warga RT 02',
                'tanggal' => '2024-06-09',
                'waktu' => '09:00:00',
                'id_rt' => 1,
                'gambar' => 'kegiatan/nikah.jpg',
            ],
            [
                'nama_kegiatan' => 'Hut RI',
                'deskripsi' => 'Perayaan Hari Ulang Tahun Republik Indonesia.',
                'lokasi' => 'Lapangan Utama',
                'tanggal' => '2024-08-17',
                'waktu' => '08:00:00',
                'id_rt' => 1,
                'gambar' => 'kegiatan/hutri.jpg',
            ],
            [
                'nama_kegiatan' => 'Makan Bersama Bobon Santosa',
                'deskripsi' => 'Perayaan Makan Besar-Besaran Bersama Bobon Santoso.',
                'lokasi' => 'Lapangan Utama',
                'tanggal' => '2024-08-17',
                'waktu' => '08:00:00',
                'id_rt' => 1,
                'gambar' => 'kegiatan/madang.jpg',
            ],
        ];

        foreach ($kegiatan as $item) {
            DB::table('kegiatan_warga')->updateOrInsert(
                ['nama_kegiatan' => $item['nama_kegiatan']],
                $item
            );
        }

    }
}
