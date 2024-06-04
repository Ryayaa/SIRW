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
            [
                'nomor_kk' => '12345',
                'alamat' => 'JL Kalpataru',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '23456',
                'alamat' => 'JL Kalpataru No. 2',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '34567',
                'alamat' => 'JL Kalpataru No. 3',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '45678',
                'alamat' => 'JL Kalpataru No. 4',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '56789',
                'alamat' => 'JL Kalpataru No. 5',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '67890',
                'alamat' => 'JL Kalpataru No. 6',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '78901',
                'alamat' => 'JL Kalpataru No. 7',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '89012',
                'alamat' => 'JL Kalpataru No. 8',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '90123',
                'alamat' => 'JL Kalpataru No. 9',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '01234',
                'alamat' => 'JL Kalpataru No. 10',
                'id_rt' => 1,
            ],
            [
                'nomor_kk' => '112233',
                'alamat' => 'JL Merdeka No. 1',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '223344',
                'alamat' => 'JL Merdeka No. 2',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '334455',
                'alamat' => 'JL Merdeka No. 3',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '445566',
                'alamat' => 'JL Merdeka No. 4',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '556677',
                'alamat' => 'JL Merdeka No. 5',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '667788',
                'alamat' => 'JL Merdeka No. 6',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '778899',
                'alamat' => 'JL Merdeka No. 7',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '889900',
                'alamat' => 'JL Merdeka No. 8',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '990011',
                'alamat' => 'JL Merdeka No. 9',
                'id_rt' => 2,
            ],
            [
                'nomor_kk' => '001122',
                'alamat' => 'JL Merdeka No. 10',
                'id_rt' => 2,
            ],
        ];

        foreach ($data as $item) {
            DB::table('keluarga')->updateOrInsert(
                ['nomor_kk' => $item['nomor_kk']], // Unique condition
                $item // Data to insert or update
            );
        }
    }

}
