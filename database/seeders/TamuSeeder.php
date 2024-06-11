<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_lengkap' => 'Rakha Surya',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1985-05-15',
                'jenis_kelamin' => 'L',
                'alamat_ktp' => 'Jl. Pahlawan No. 10',
                'alamat_menetap' => 'Jl. Semanggi Barat No. 1 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567890',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-02',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Ayunda Risu',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1992-03-22',
                'jenis_kelamin' => 'P',
                'alamat_ktp' => 'Jl. Merdeka No. 5',
                'alamat_menetap' => 'Jl. Semanggi Barat No. 2 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567891',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-03',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Pramudya Putra',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1980-07-10',
                'jenis_kelamin' => 'L',
                'alamat_ktp' => 'Jl. Malioboro No. 8',
                'alamat_menetap' => 'Jl. Semanggi Barat No. 4 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567892',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-06',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Sri Rejeki',
                'tempat_lahir' => 'Bali',
                'tanggal_lahir' => '1988-11-20',
                'jenis_kelamin' => 'P',
                'alamat_ktp' => 'Jl. Kuta No. 15',
                'alamat_menetap' => 'Jl. Remujung No. 1 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567893',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-08',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Bagas Kurniawan',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1995-02-14',
                'jenis_kelamin' => 'L',
                'alamat_ktp' => 'Jl. Medan No. 23',
                'alamat_menetap' => 'Jl. Remujung No. 3 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567894',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-12',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Antok Subroto',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1991-09-12',
                'jenis_kelamin' => 'L',
                'alamat_ktp' => 'Jl. Diponegoro No. 30',
                'alamat_menetap' => 'Jl. Senggani No. 2 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567896',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-22',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Ririn Setiawati',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1986-04-25',
                'jenis_kelamin' => 'P',
                'alamat_ktp' => 'Jl. Asia Afrika No. 40',
                'alamat_menetap' => 'Jl. Senggani No. 3 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567897',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-14',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Susanti',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1993-07-18',
                'jenis_kelamin' => 'P',
                'alamat_ktp' => 'Jl. Diponegoro No. 40',
                'alamat_menetap' => 'Jl. Senggani No. 4 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567899',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-02',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Ismail Bin Mail',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'alamat_ktp' => 'Jl. Kebon Jeruk No. 1',
                'alamat_menetap' => 'Jl. Simbar Menjangan No. 3 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567890',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-02',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
            [
                'nama_lengkap' => 'Anita Wulandari',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1985-05-15',
                'jenis_kelamin' => 'P',
                'alamat_ktp' => 'Jl. Merdeka No. 10',
                'alamat_menetap' => 'Jl. Simbar Menjangan No. 4 Kelurahan Jatimulyo Kecamatan Lowokwaru',
                'no_telepon' => '081234567891',
                'tanggal_masuk' => '2024-06-01',
                'tanggal_keluar' => '2024-06-02',
                'bukti_ktp' => 'tamu/tamu_ktp.png',
            ],
        ];

        foreach ($data as $item) {
            DB::table('tamu')->updateOrInsert(
                ['nama_lengkap' => $item['nama_lengkap']], // Unique condition
                $item // Data to insert or update
            );
        }
    }
}
