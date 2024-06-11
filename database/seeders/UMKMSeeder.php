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
            'deskripsi' => 'Warung Ibu Tejo adalah toko yang nyaman di lingkungan sekitar yang menawarkan berbagai kebutuhan sehari-hari dan makanan ringan. Dengan pelayanan yang ramah dan harga yang terjangkau, Warung Ibu Tejo menjadi pilihan utama bagi warga sekitar untuk berbelanja kebutuhan sehari-hari mereka. Toko ini juga terkenal dengan keramahan pemiliknya yang selalu siap membantu pelanggan dengan sepenuh hati.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Warung Sembako Madura',
            'alamat' => 'Jl. Semanggi Barat No.30',
            'no_telepon' => '08976234678',
            'id_warga' => 4,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_sembako_madura.jpg',
            'deskripsi' => 'Warung Sembako Madura adalah tempat yang sempurna untuk mendapatkan berbagai macam kebutuhan pokok dengan kualitas terbaik dan harga yang bersaing. Warung ini menyediakan berbagai barang mulai dari bahan makanan, bumbu dapur, hingga kebutuhan rumah tangga lainnya. Warung Sembako Madura dikenal dengan produk-produk yang selalu segar dan layanan yang cepat serta efisien.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Warung Makan Banyuwangi',
            'alamat' => 'Jl. Semanggi Barat No.45',
            'no_telepon' => '08123467854',
            'id_warga' => 5,
            'status_pengajuan' => null,
            'gambar' => 'umkm/warung_banyuwangi.jpg',
            'deskripsi' => 'Warung Makan Banyuwangi menawarkan hidangan khas Banyuwangi dengan cita rasa yang autentik dan menggugah selera. Warung ini merupakan tempat favorit bagi pecinta kuliner tradisional yang ingin menikmati masakan Banyuwangi yang asli. Dengan suasana yang nyaman dan pelayanan yang baik, Warung Makan Banyuwangi menjadi tempat yang tepat untuk berkumpul bersama keluarga dan teman.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Nasi Goreng Hijau',
            'alamat' => 'Jl. Semanggi Barat No.55',
            'no_telepon' => '08135679343',
            'id_warga' => 6,
            'status_pengajuan' => null,
            'gambar' => 'umkm/nasi_goreng_hijau.jpg',
            'deskripsi' => 'Nasi Goreng Hijau terkenal dengan nasi goreng hijaunya yang unik dan lezat. Tempat ini selalu ramai dikunjungi oleh penggemar nasi goreng dari berbagai kalangan. Dengan bahan-bahan pilihan dan resep rahasia, Nasi Goreng Hijau menyajikan nasi goreng yang tidak hanya enak, tetapi juga menyehatkan. Selain nasi goreng hijau, warung ini juga menawarkan berbagai pilihan menu lain yang tidak kalah nikmat.'
        ]);

        UMKMModel::create([
            'nama_umkm' => 'Es Degan Segar',
            'alamat' => 'Jl. Semanggi Barat No. 42',
            'no_telepon' => '08997654346',
            'id_warga' => 7,
            'status_pengajuan' => null,
            'gambar' => 'umkm/es_degan.jpg',
            'deskripsi' => 'Es Degan Segar menyajikan minuman segar yang sempurna untuk menghilangkan dahaga di hari yang panas. Dengan es kelapa muda yang segar dan manis, tempat ini menjadi favorit bagi banyak orang. Es Degan Segar juga menawarkan berbagai pilihan minuman lainnya yang dibuat dari bahan-bahan alami dan berkualitas. Tempat ini cocok untuk dikunjungi saat ingin menikmati minuman yang menyegarkan bersama keluarga atau teman.'
        ]);
    }
}
