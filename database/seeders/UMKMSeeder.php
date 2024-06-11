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
            'id_warga' => 1,
            'status_pengajuan' => null,
        ]);

        UMKMModel::create([
            'nama_umkm' => 'UMKM 2',
            'alamat' => 'Alamat UMKM 2',
            'no_telepon' => '987654321',
            'id_warga' => 2,
            'status_pengajuan' => null,
        ]);
    }
}
