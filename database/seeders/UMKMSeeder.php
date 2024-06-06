<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $umkms = [
            [
                'nama_umkm' => 'UMKM A',
                'alamat' => 'Jl. Contoh No. 1',
                'no_telepon' => '08123456789',
                'gambar' => 'gambar_a.jpg',
                'id_warga' => 3,
            ],
            [
                'nama_umkm' => 'UMKM B',
                'alamat' => 'Jl. Contoh No. 2',
                'no_telepon' => '08123456780',
                'gambar' => 'gambar_b.jpg',
                'id_warga' => 3,
            ],
            [
                'nama_umkm' => 'UMKM C',
                'alamat' => 'Jl. Contoh No. 3',
                'no_telepon' => '08123456781',
                'gambar' => 'gambar_c.jpg',
                'id_warga' => 3,
            ],
        ];

        foreach ($umkms as $umkm) {
            DB::table('umkm')->updateOrInsert(
                [
                    'nama_umkm' => $umkm['nama_umkm'],
                    'alamat' => $umkm['alamat'],
                    'no_telepon' => $umkm['no_telepon'],
                    'gambar' => $umkm['gambar'],
                    'id_warga' => $umkm['id_warga'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]
            );
        }
    }
}
