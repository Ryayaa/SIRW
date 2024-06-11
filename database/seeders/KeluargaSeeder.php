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
                'nomor_kk' => '357305050001001',
                'alamat' => 'Jl. Semanggi Barat No. 1',
                'id_rt' => 1,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050002002',
                'alamat' => 'Jl. Semanggi Barat No. 2',
                'id_rt' => 1,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050003003',
                'alamat' => 'Jl. Semanggi Barat No. 3',
                'id_rt' => 1,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050004004',
                'alamat' => 'Jl. Semanggi Barat No. 4',
                'id_rt' => 1,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '35730505000005',
                'alamat' => 'Jl remujung no. 1',
                'id_rt' => 2,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050006006',
                'alamat' => 'Jl remujung no. 2',
                'id_rt' => 2,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050007007',
                'alamat' => 'Jl remujung no. 3',
                'id_rt' => 2,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050008008',
                'alamat' => 'Jl remujung no. 4',
                'id_rt' => 2,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050009009',
                'alamat' => 'Jl kesumba no. 1',
                'id_rt' => 3,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050010010',
                'alamat' => 'Jl kesumba no. 2',
                'id_rt' => 3,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050011011',
                'alamat' => 'Jl kesumba no. 3',
                'id_rt' => 3,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050012012',
                'alamat' => 'Jl kesumba no. 4',
                'id_rt' => 3,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050013013',
                'alamat' => 'Jl senggani no. 1',
                'id_rt' => 4,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050014014',
                'alamat' => 'Jl senggani no. 2',
                'id_rt' => 4,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050015015',
                'alamat' => 'Jl senggani no. 3',
                'id_rt' => 4,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050016016',
                'alamat' => 'Jl senggani no. 4',
                'id_rt' => 4,
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050017017', 
                'alamat' => 'Jl simbar menjangan no. 1', 
                'id_rt' => 5, 
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050018018', 
                'alamat' => 'Jl simbar menjangan no. 2', 
                'id_rt' => 5, 
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050019019', 
                'alamat' => 'Jl simbar menjangan no. 3', 
                'id_rt' => 5, 
                'bukti_kk' => '1234567891012131.jpg',
            ],
            [
                'nomor_kk' => '357305050020020', 
                'alamat' => 'Jl simbar menjangan no. 4', 
                'id_rt' => 5, 
                'bukti_kk' => '1234567891012131.jpg',
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
