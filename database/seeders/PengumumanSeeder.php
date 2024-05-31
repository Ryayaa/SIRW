<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengumumanData = [];

        for ($i = 1; $i <= 15; $i++) {
            $pengumumanData[] = [
                'judul_pengumuman' => 'Pengumuman ' . $i,
                'deskripsi' => 'Deskripsi pengumuman ' . $i,
                'gambar' => 'gambar' . $i . '.jpg',
                'tanggal' => now()->addDays($i)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach ($pengumumanData as $pengumuman) {
            DB::table('pengumuman')->updateOrInsert(
                ['judul_pengumuman' => $pengumuman['judul_pengumuman']],
                [
                    'deskripsi' => $pengumuman['deskripsi'],
                    'gambar' => $pengumuman['gambar'],
                    'tanggal' => $pengumuman['tanggal'],
                    'id_rt' => 1,
                    'created_at' => $pengumuman['created_at'],
                    'updated_at' => $pengumuman['updated_at'],
                ]
            );
        }
    }
}
