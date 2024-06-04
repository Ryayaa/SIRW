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
            ],
            [
                'nama_kegiatan' => 'Musyawarah',
                'deskripsi' => 'Pertemuan warga untuk membahas rencana kegiatan.',
                'lokasi' => 'Balai Warga RT 01',
                'tanggal' => '2024-06-05',
                'waktu' => '18:00:00',
                
            ],
            [
                'nama_kegiatan' => 'Pemilihan RW',
                'deskripsi' => 'Pemilihan Ketua RW yang baru.',
                'lokasi' => 'Balai Warga RW 01',
                'tanggal' => '2024-06-10',
                'waktu' => '09:00:00',
                
            ],
            [
                'nama_kegiatan' => 'Hut RI',
                'deskripsi' => 'Perayaan Hari Ulang Tahun Republik Indonesia.',
                'lokasi' => 'Lapangan Utama',
                'tanggal' => '2024-08-17',
                'waktu' => '08:00:00',
                
            ],
        ];

        foreach ($kegiatan as $item) {
            DB::table('kegiatan_warga')->updateOrInsert(
                [
                    'nama_kegiatan' => $item['nama_kegiatan'],
                    'tanggal' => $item['tanggal'],
                    'deskripsi' => $item['deskripsi'],
                    'lokasi' => $item['lokasi'],
                    'waktu' => $item['waktu'],
                    'id_rt' => 1,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]
            );
        }

    }
}
