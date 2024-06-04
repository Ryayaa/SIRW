<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'no_rt' => 'RT-Test',
                'nama_lengkap' => 'Test-RT',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jalan Raya No. 123',
                'no_telepon' => '08123456789',
                'id_rw' => 1,
                'status' => 'Aktif',
                'mulai_jabatan' => '2020-01-01',
                'akhir_jabatan' => '2025-01-01',
            ],
            [
                'no_rt' => 'RT-2',
                'nama_lengkap' => 'Test-RT 2',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jalan Raya No. 124',
                'no_telepon' => '08123456789',
                'id_rw' => 1,
                'status' => 'Aktif',
                'mulai_jabatan' => '2020-01-01',
                'akhir_jabatan' => '2025-01-01',
            ]
        ];

        foreach ($data as $rt) {
            DB::table('rt')->updateOrInsert(
                ['no_rt' => $rt['no_rt']], // Kondisi pencocokan
                $rt // Data untuk di-update atau insert
            );
        }
    }
}
