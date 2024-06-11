<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengumumanModel;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PengumumanModel::create([
            'judul_pengumuman' => 'Pengumuman Hari Raya',
            'deskripsi' => 'Pada Hari Raya yang fitri ini, kami mengucapkan selamat kepada seluruh warga atas kesuksesan yang telah kita raih bersama. Mari kita jaga kebersamaan dan semangat gotong royong di tengah-tengah pandemi ini.',
            'gambar' => 'pengumuman/pengumuman_hari_raya.jpg',
            'tanggal' => '2024-07-20',
            'id_rt' => 1,
        ]);

        PengumumanModel::create([
            'judul_pengumuman' => 'Pembagian Sembako',
            'deskripsi' => 'Pembagian sembako akan dilakukan pada tanggal 25 Juli 2024, dimohon kepada seluruh warga yang membutuhkan agar dapat mengikuti proses pembagian tersebut sesuai jadwal yang telah ditentukan.',
            'gambar' => 'pengumuman/pembagian_sembako.jpg',
            'tanggal' => '2024-07-25',
            'id_rt' => 2,
        ]);

        PengumumanModel::create([
            'judul_pengumuman' => 'Peringatan Hari Lingkungan Hidup',
            'deskripsi' => 'Pada Hari Lingkungan Hidup ini, mari kita tingkatkan kesadaran untuk menjaga kelestarian alam. Ayo bersama-sama berkontribusi dalam menjaga kebersihan lingkungan dan melestarikan alam untuk generasi masa depan.',
            'gambar' => 'pengumuman/hari_lingkungan_hidup.jpg',
            'tanggal' => '2024-06-05',
            'id_rt' => 3,
        ]);

        PengumumanModel::create([
            'judul_pengumuman' => 'Pemberitahuan Perbaikan Jalan',
            'deskripsi' => 'Diberitahukan kepada seluruh warga bahwa akan dilakukan perbaikan jalan di sekitar RT. Kami mohon kerjasama dari seluruh warga untuk tidak parkir kendaraan di lokasi yang akan diperbaiki selama proses perbaikan berlangsung.',
            'gambar' => 'pengumuman/perbaikan_jalan.jpg',
            'tanggal' => '2024-06-10',
            'id_rt' => 4,
        ]);

        PengumumanModel::create([
            'judul_pengumuman' => 'Sosialisasi Program Kesehatan',
            'deskripsi' => 'Kami mengundang seluruh warga untuk menghadiri sosialisasi program kesehatan yang akan dilaksanakan pada tanggal 15 Juni 2024. Dalam kegiatan ini, akan dibahas berbagai informasi penting seputar kesehatan dan upaya pencegahan penyakit.',
            'gambar' => 'pengumuman/sosialisasi_kesehatan.jpg',
            'tanggal' => '2024-06-15',
            'id_rt' => 5,
        ]);
    }
}
