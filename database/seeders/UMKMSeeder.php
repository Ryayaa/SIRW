<?php

use Illuminate\Database\Seeder;
use App\Models\UMKMModel;
use Illuminate\Support\Facades\DB;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UMKMModel::create([
            'nama_umkm' => 'UMKM 1',
            'alamat' => 'Alamat UMKM 1',
            'no_telepon' => '123456789',
            'id_warga' => 3,
            'status_pengajuan' => null,
        ]);

        UMKMModel::create([
            'nama_umkm' => 'UMKM 2',
            'alamat' => 'Alamat UMKM 2',
            'no_telepon' => '987654321',
            'id_warga' => 4,
            'status_pengajuan' => null,
        ]);
        UMKMModel::create([
            'nama_umkm' => 'UMKM 3',
            'alamat' => 'Alamat UMKM 3',
            'no_telepon' => '987654321',
            'id_warga' => 5,
            'status_pengajuan' => null,
        ]);
        UMKMModel::create([
            'nama_umkm' => 'UMKM 4',
            'alamat' => 'Alamat UMKM 4',
            'no_telepon' => '987654321',
            'id_warga' => 6,
            'status_pengajuan' => null,
        ]);
        UMKMModel::create([
            'nama_umkm' => 'UMKM 5',
            'alamat' => 'Alamat UMKM 5',
            'no_telepon' => '987654321',
            'id_warga' => 7,
            'status_pengajuan' => null,
        ]);
    }
}
