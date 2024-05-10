<?php

namespace Database\Seeders;

use App\Models\Keluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'nomor_kk' => '12345',
            'alamat' => 'JL Kalpataru',
            'id_rt' => 1,

        ];
        DB::table('keluarga')->updateOrInsert($data);
    }

}
