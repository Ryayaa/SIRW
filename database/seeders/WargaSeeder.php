<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nik' => '3573050101900001',
                'nama_lengkap' => 'Suprianto ',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 1',
                'roles' => 'rw',
                'pekerjaan' => 'Pegawai',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('RW12345678'),
                'id_keluarga' => 1,
                'username' => 'adminRW',
                'no_telepon' => '085914526570',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050101900002',
                'nama_lengkap' => 'Jatmiko ',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 2',
                'roles' => 'rt',
                'pekerjaan' => 'Pegawai',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('RT12345678'),
                'id_keluarga' => 2,
                'username' => 'adminRT',
                'no_telepon' => '085914521247',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050202900003',
                'nama_lengkap' => 'Ayu Wijaya',
                'tanggal_lahir' => '1990-02-02',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 2',
                'roles' => 'warga',
                'pekerjaan' => 'Guru',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('Ayu Wijaya'),
                'id_keluarga' => 2,
                'username' => 'AyuWijaya',
                'no_telepon' => '085914521248',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Istri',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050303850004',
                'nama_lengkap' => 'Budi Santoso',
                'tanggal_lahir' => '1985-03-03',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 3',
                'roles' => 'warga',
                'pekerjaan' => 'Dokter',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('Budi Santoso'),
                'id_keluarga' => 3,
                'username' => 'BudiSantoso',
                'no_telepon' => '085914521249',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga', 
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050404920005',
                'nama_lengkap' => 'Citra Lestari',
                'tanggal_lahir' => '1992-04-04',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 3',
                'roles' => 'warga',
                'pekerjaan' => 'Pengusaha',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('Citra Lestari'),
                'id_keluarga' => 3,
                'username' => 'CitraLestari',
                'no_telepon' => '085914521250',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Istri',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050404100006',
                'nama_lengkap' => 'Tina Lestari',
                'tanggal_lahir' => '2010-04-04',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 3',
                'roles' => 'warga',
                'pekerjaan' => 'Pelajar',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Tina Lestari'),
                'id_keluarga' => 3,
                'username' => 'TinaLestari',
                'no_telepon' => '085914521251',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Anak',
            ],
            [
                'nik' => '3573050505880007',
                'nama_lengkap' => 'Dedi Mulyadi',
                'tanggal_lahir' => '1988-05-05',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 4',
                'roles' => 'warga',
                'pekerjaan' => 'Polisi',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('Dedi Mulyadi'),
                'id_keluarga' => 4,
                'username' => 'DediMulyadi',
                'no_telepon' => '085914721251',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050707040008',
                'nama_lengkap' => 'Andreagazy',
                'tanggal_lahir' => '2004-07-07',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 4',
                'roles' => 'warga',
                'pekerjaan' => 'Pengacara',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('warga12345'),
                'id_keluarga' => 4,
                'username' => 'Andreagazy',
                'no_telepon' => '085914721253',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Anak',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051010910011',
                'nama_lengkap' => 'Ira Santika',
                'tanggal_lahir' => '1991-10-10',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 1',
                'roles' => 'warga',
                'pekerjaan' => 'Arsitek',
                'status_perkawinan' => 'Kawin',
                'password' => Hash::make('Ira Santika'),
                'id_keluarga' => 1,
                'username' => 'IraSantika',
                'no_telepon' => '085914721256',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Istri',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051111860012',
                'nama_lengkap' => 'Joko Setiawan',
                'tanggal_lahir' => '1986-11-11',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl remujung no. 1',
                'roles' => 'rt',
                'pekerjaan' => 'Pengusaha',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('RT12378912'),
                'id_keluarga' => 5,
                'username' => 'AdminRT2',
                'no_telepon' => '085914721257',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051212940013',
                'nama_lengkap' => 'Kartika Dewi',
                'tanggal_lahir' => '1994-12-12',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl remujung no. 2',
                'roles' => 'warga',
                'pekerjaan' => 'Designer',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Kartika Dewi'),
                'id_keluarga' => 6,
                'username' => 'KartikaDewi',
                'no_telepon' => '085914721258',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573052005950014',
                'nama_lengkap' => 'Larasati Wulandari',
                'tanggal_lahir' => '1995-05-20',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl remujung no. 3',
                'roles' => 'warga',
                'pekerjaan' => 'Penulis',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Larasati Wulandari'),
                'id_keluarga' => 7,
                'username' => 'LarasatiWulandari',
                'no_telepon' => '085914721260',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050508930015',
                'nama_lengkap' => 'Dewi Lestari',
                'tanggal_lahir' => '1993-08-15',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl remujung no. 4',
                'roles' => 'warga',
                'pekerjaan' => 'Musisi',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Dewi Lestari'),
                'id_keluarga' => 8,
                'username' => 'DewiLestari',
                'no_telepon' => '085914721261',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573053004920017',
                'nama_lengkap' => 'Fitriani Susanti',
                'tanggal_lahir' => '1992-04-30',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl kesumba no. 1',
                'roles' => 'rt',
                'pekerjaan' => 'Akuntan',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('RT98765432'),
                'id_keluarga' => 9,
                'username' => 'AdminRT3',
                'no_telepon' => '085914721263',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051009880018',
                'nama_lengkap' => 'Aditya Pratama',
                'tanggal_lahir' => '1988-09-18',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl kesumba no. 2',
                'roles' => 'warga',
                'pekerjaan' => 'Programmer',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Aditya Pratama'),
                'id_keluarga' => 10,
                'username' => 'AdityaPratama',
                'no_telepon' => '085914721264',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573052111910019',
                'nama_lengkap' => 'Anisa Rahmawati',
                'tanggal_lahir' => '1991-11-21',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl kesumba no. 3',
                'roles' => 'warga',
                'pekerjaan' => 'Arsitek',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Anisa Rahmawati'),
                'id_keluarga' => 11,
                'username' => 'AnisaRahmawati',
                'no_telepon' => '085914721265',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051402930020',
                'nama_lengkap' => 'Rizky Pratama',
                'tanggal_lahir' => '1993-02-14',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl kesumba no. 4',
                'roles' => 'warga',
                'pekerjaan' => 'Guru',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Rizky Pratama'),
                'id_keluarga' => 12,
                'username' => 'RizkyPratama',
                'no_telepon' => '085914721266',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573050910920022',
                'nama_lengkap' => 'Fajar Setiawan',
                'tanggal_lahir' => '1992-10-09',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl senggani no. 1',
                'roles' => 'rt',
                'pekerjaan' => 'Pengusaha',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('RT444444'),
                'id_keluarga' => 13,
                'username' => 'AdminRT4',
                'no_telepon' => '085914721268',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051811940023',
                'nama_lengkap' => 'Dewi Anggraeni',
                'tanggal_lahir' => '1994-11-18',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl senggani no. 2',
                'roles' => 'warga',
                'pekerjaan' => 'Wirausaha',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Dewi Anggraeni'),
                'id_keluarga' => 14,
                'username' => 'DewiAnggraeni',
                'no_telepon' => '085914721269',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '35730530060024',
                'nama_lengkap' => 'Andi Kurniawan',
                'tanggal_lahir' => '1990-06-30',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl senggani no. 3',
                'roles' => 'warga',
                'pekerjaan' => 'Insinyur',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Andi Kurniawan'),
                'id_keluarga' => 15,
                'username' => 'AndiKurniawan',
                'no_telepon' => '085914721270',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573052009930025',
                'nama_lengkap' => 'Rina Agustina',
                'tanggal_lahir' => '1993-09-20',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl senggani no. 4',
                'roles' => 'warga',
                'pekerjaan' => 'Akuntan',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Rina Agustina'),
                'id_keluarga' => 16,
                'username' => 'RinaAgustina',
                'no_telepon' => '085914721271',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573052311200030',
                'nama_lengkap' => 'Rudi Hidayat',
                'tanggal_lahir' => '2000-11-23',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 4',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Rudi Hidayat'),
                'id_keluarga' => 4,
                'username' => 'RudiHidayat',
                'no_telepon' => '085914721276',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512200026',
                'nama_lengkap' => 'Arrya Fitriansyah',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl remujung no. 1',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Arrya Fitriansyah'),
                'id_keluarga' => 5,
                'username' => 'ArryaFitriansyah',
                'no_telepon' => '085914721273',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512000027',
                'nama_lengkap' => 'Ridho Fauzian',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl kesumba no. 3',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Ridho Fauzian'),
                'id_keluarga' => 9,
                'username' => 'RidhoFauzian',
                'no_telepon' => '085914721274',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512000028',
                'nama_lengkap' => 'Lalu Immaratul',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl kesumba no. 2',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Lalu Immaratul'),
                'id_keluarga' => 8,
                'username' => 'LaluImmaratul',
                'no_telepon' => '085914721275',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512000029',
                'nama_lengkap' => 'Nadia Omara',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl. Semanggi Barat No. 1',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Nadia Omara'),
                'id_keluarga' => 1,
                'username' => 'NadiaOmara',
                'no_telepon' => '085914721276',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051519000031',
                'nama_lengkap' => 'Anies',
                'tanggal_lahir' => '1990-12-15',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_domisili' => 'Jl simbar menjangan no. 1',
                'roles' => 'rt',
                'pekerjaan' => 'Swasta',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('RT555555'),
                'id_keluarga' => 17,
                'username' => 'AdminRT5',
                'no_telepon' => '085914721277',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Kepala Keluarga',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512000032',
                'nama_lengkap' => 'Novaria',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl simbar menjangan no. 2',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Novaria'),
                'id_keluarga' => 18,
                'username' => 'Novaria',
                'no_telepon' => '085914721278',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512000033',
                'nama_lengkap' => 'Nanda Twinadila',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl simbar menjangan no. 3',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Nanda Twinadila'),
                'id_keluarga' => 19,
                'username' => 'Nanda Twinadila',
                'no_telepon' => '085914721279',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
            [
                'nik' => '3573051512000034',
                'nama_lengkap' => 'Amel',
                'tanggal_lahir' => '2000-12-15',
                'jenis_kelamin' => 'Perempuan',
                'alamat_domisili' => 'Jl simbar menjangan no. 4',
                'roles' => 'warga sementara',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Kawin',
                'password' => Hash::make('Amel'),
                'id_keluarga' => 20,
                'username' => 'Amel',
                'no_telepon' => '085914721280',
                'tempat_lahir' => 'Malang',
                'status_hubungan' => 'Lainnya',
                'bukti_ktp' => '0987654321.png',
            ],
        ];

        foreach ($data as $item) {
            DB::table('warga')->updateOrInsert(
                ['nik' => $item['nik']], // Unique condition
                $item // Data to insert or update
            );
        }
    }
}
