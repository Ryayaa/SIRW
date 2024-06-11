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
            'deskripsi' => 'A cozy neighborhood shop offering a variety of daily necessities and snacks.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Warung Sembako Madura',
            'alamat' => 'Jl. Semanggi Barat No.30',
            'no_telepon' => '08976234678',
            'id_warga' => 4,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_sembako_madura.jpg',
            'deskripsi' => 'Specializes in a wide range of grocery items, focusing on quality and affordability.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Warung Makan Banyuwangi',
            'alamat' => 'Jl. Semanggi Barat No.45',
            'no_telepon' => '08123467854',
            'id_warga' => 5,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_banyuwangi.jpg',
            'deskripsi' => 'A traditional eatery serving delicious Banyuwangi-style meals with authentic flavors.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Nasi Goreng Hijau',
            'alamat' => 'Jl. Semanggi Barat No.55',
            'no_telepon' => '08135679343',
            'id_warga' => 6,
            'status_pengajuan' => null,
            'gambar' => 'umkm/nasi_goreng_hijau.jpg',
            'deskripsi' => 'Known for its unique green fried rice, this place is a hit among locals and tourists alike.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Es Degan Segar',
            'alamat' => 'Jl. Semanggi Barat No. 42',
            'no_telepon' => '08997654346',
            'id_warga' => 7,
            'status_pengajuan' => null,
            'gambar' => 'umkm/es_degan.jpg',
            'deskripsi' => 'Offers refreshing coconut water and other beverages, perfect for a hot day.'
        ]);
    }
}
