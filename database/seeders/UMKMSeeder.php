<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UMKMModel;

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
            'nama_umkm' => 'Warung Ibu Tejo',
            'alamat' => 'Jl. Semanggi Barat No.25',
            'no_telepon' => '089621064427',
            'id_warga' => 3,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_ibu_tejo.jpg',
            'deskripsi' => 'Toko nyaman yang menyediakan berbagai kebutuhan sehari-hari dan makanan ringan. Pelayanan ramah dan harga terjangkau membuat Warung Ibu Tejo jadi pilihan utama warga sekitar.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Warung Sembako Madura',
            'alamat' => 'Jl. Semanggi Barat No.30',
            'no_telepon' => '08976234678',
            'id_warga' => 4,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_sembako_madura.jpg',
            'deskripsi' => 'Tempat sempurna untuk berbagai kebutuhan pokok dengan kualitas terbaik dan harga bersaing. Menyediakan bahan makanan, bumbu dapur, hingga kebutuhan rumah tangga.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Warung Makan Banyuwangi',
            'alamat' => 'Jl. Semanggi Barat No.45',
            'no_telepon' => '08123467854',
            'id_warga' => 5,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_banyuwangi.jpg',
            'deskripsi' => 'Menyajikan hidangan khas Banyuwangi dengan cita rasa autentik. Tempat favorit pecinta kuliner tradisional dengan suasana nyaman dan pelayanan baik.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Nasi Goreng Hijau',
            'alamat' => 'Jl. Semanggi Barat No.55',
            'no_telepon' => '08135679343',
            'id_warga' => 6,
            'status_pengajuan' => null,
            'gambar' => 'umkm/nasi_goreng_hijau.jpg',
            'deskripsi' => 'Dikenal dengan nasi goreng hijaunya yang unik dan lezat. Selalu ramai dikunjungi, warung ini menyajikan nasi goreng enak dan menyehatkan dengan bahan-bahan pilihan.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Es Degan Segar',
            'alamat' => 'Jl. Semanggi Barat No. 42',
            'no_telepon' => '08997654346',
            'id_warga' => 7,
            'status_pengajuan' => null,
            'gambar' => 'umkm/es_degan.jpg',
            'deskripsi' => 'Menyajikan es kelapa muda yang segar dan manis. Favorit banyak orang, Es Degan Segar juga menawarkan berbagai minuman alami dan berkualitas.'
        ]);
    }
}
