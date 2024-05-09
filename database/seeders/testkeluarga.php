<?php

namespace Database\Seeders;

use App\Models\KeluargaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class testkeluarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KeluargaModel::updateOrCreate([
            'nomor_kk' => '1234567891012131',
            'alamat' => 'Jl. Test2',
            'id_rt' => '1',
        ]);
    }
}
