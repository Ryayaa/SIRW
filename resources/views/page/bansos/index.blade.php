<title>Informasi Bansos Bansos</title>
@extends('user-login.index')

@section('content')
<section class="mt-4">
    <section id="intro-bansos" class="intro-bansos ">
        <div class="container ">
            <div class=" mb-4">
                <div class="">
                    <h2 class="section-title text-center mb-3">Informasi Mengenai Bantuan Sosial</h2>
                    <p class="text-left section-description">Bansos atau Bantuan Sosial adalah bantuan berupa uang atau barang dari pemerintah kepada masyarakat yang bertujuan untuk mengurangi beban hidup mereka. Bansos ini diberikan kepada masyarakat yang membutuhkan sesuai dengan kriteria yang telah ditentukan.</p>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="text-left">
                        <h2 class="section-title mb-3 text-center">Bantuan Sosial Yang dapat Diterima</h2>
                        <p>Berikut bantuan Sosial yang dapat diterima oleh warga di Kelurahan Jatimulyo : </p>
                        <ul class="list-group col-md-8">
                            @foreach($bansosList as $bansos)
                            <li class="ms-4">
                                <h3 class="bansos-title mb-2" >{{ $bansos->nama_bansos }}</h3>
                                <p class="bansos-description">{{ $bansos->deskripsi }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



<div id="daftar-bansos" class="daftar-bansos">
    <div class="container">
        <h3 class="mb-4 section-title">Pertanyaan Yang Sering Ditanyakan</h3>
            <div class="card" id="bansos-card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button">
                        Data Apa yang Diperlukan Untuk Pengajuan Bansos?
                    </button>
                </h5>
            </div>
            <div id="collapseBansos" class="collapse" aria-labelledby="headingOne" data-parent="#daftar-bansos">
                <div class="card-body">
                    <p>Untuk pengajuan bantuan sosial (bansos), data yang diperlukan biasanya mencakup informasi tentang identitas pribadi, kondisi ekonomi, dan status keluarga pemohon. Berikut adalah daftar umum data yang sering diperlukan:</p>
                    <ul>
                        <li>
                            <strong>Data Pribadi:</strong>
                            <ul class="indent">
                                <li><strong>Nama Lengkap:</strong> Pemohon diharuskan mengisi nama lengkap sesuai dengan KTP.</li>
                                <li><strong>Tempat dan Tanggal Lahir:</strong> Informasi mengenai tempat dan tanggal lahir pemohon.</li>
                                <li><strong>Jenis Kelamin:</strong> Pilihan antara laki-laki atau perempuan.</li>
                                <li><strong>Nomor KTP/NIK:</strong> Nomor Kartu Tanda Penduduk atau Nomor Induk Kependudukan.</li>
                                <li><strong>Alamat Lengkap:</strong> Alamat sesuai KTP dan alamat domisili jika berbeda.</li>
                                <li><strong>Nomor Telepon:</strong> Nomor telepon yang bisa dihubungi.</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Data Keluarga:</strong>
                            <ul class="indent">
                                <li><strong>Kartu Keluarga (KK):</strong> Nomor dan data anggota keluarga.</li>
                                <li><strong>Status Perkawinan:</strong> Lajang, menikah, cerai, atau duda/janda.</li>
                                <li><strong>Jumlah Anggota Keluarga:</strong> Anggota keluarga yang menjadi tanggungan.</li>
                                <li><strong>Data Identitas Setiap Anggota Keluarga:</strong> Nama, NIK, hubungan dengan kepala keluarga.</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Kondisi Ekonomi:</strong>
                            <ul class="indent">
                                <li><strong>Sumber Penghasilan Utama:</strong> Jenis pekerjaan atau sumber pendapatan.</li>
                                <li><strong>Penghasilan Bulanan:</strong> Penghasilan pemohon dan pasangan jika ada.</li>
                                <li><strong>Surat Keterangan Tidak Mampu (SKTM):</strong> Surat keterangan dari kelurahan/desa.</li>
                                <li><strong>Bukti Penghasilan:</strong> Slip gaji atau bukti penghasilan lainnya.</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Dokumen Pendukung:</strong>
                            <ul class="indent">
                                <li><strong>Surat Pengantar dari RT/RW:</strong> Surat pengantar untuk pengajuan.</li>
                                <li><strong>Surat Keterangan Domisili:</strong> Jika alamat tinggal berbeda dengan alamat KTP.</li>
                                <li><strong>Foto Rumah:</strong> Foto tempat tinggal saat ini.</li>
                                <li><strong>Rekening Listrik atau Air:</strong> Bukti beban hidup bulanan.</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Data Pendidikan:</strong> (jika ada anggota keluarga yang sedang menempuh pendidikan)
                            <ul class="indent">
                                <li><strong>Kartu Pelajar atau Mahasiswa:</strong> Identitas pendidikan.</li>
                                <li><strong>Surat Keterangan dari Sekolah atau Kampus:</strong> Keterangan status pendidikan.</li>
                                <li><strong>Data Beasiswa:</strong> Jika ada beasiswa yang diterima.</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Kondisi Kesehatan:</strong> (jika ada anggota keluarga yang sakit atau penyandang disabilitas)
                            <ul class="indent">
                                <li><strong>Surat Keterangan Dokter:</strong> Dokumen medis yang relevan.</li>
                                <li><strong>Dokumen Pendukung Lainnya:</strong> Resep obat atau hasil diagnosa medis.</li>
                            </ul>
                        </li>
                    </ul>
                    <p>Proses pengajuan bansos juga biasanya memerlukan pemohon untuk mengisi formulir aplikasi yang disediakan oleh instansi terkait. Data dan dokumen yang lengkap akan membantu mempercepat proses verifikasi dan pengajuan bantuan sosial.</p>
                </div>
            </div>
        </div>

        <!-- Add new collapsible card -->
        <div class="card mt-3" id="proses-pengajuan-card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button">
                        Bagaimana Proses Pengajuan Bansos?
                    </button>
                </h5>
            </div>
            <div id="collapseProsesPengajuan" class="collapse" aria-labelledby="headingTwo" data-parent="#daftar-bansos">
                <div class="card-body">
                    <p>Proses pengajuan bantuan sosial (bansos) terdiri dari beberapa langkah yang harus diikuti oleh pemohon. Berikut adalah langkah-langkah umumnya:</p>
                    <ol>
                        <li>
                            <strong>Mengumpulkan Dokumen yang Diperlukan:</strong>
                            <div class="step-details">
                                <p>Pemohon harus menyiapkan berbagai dokumen pendukung, seperti:</p>
                                <ul>
                                    <li>Kartu Tanda Penduduk (KTP)</li>
                                    <li>Kartu Keluarga (KK)</li>
                                    <li>Surat Keterangan Tidak Mampu (SKTM) dari kelurahan/desa</li>
                                    <li>Bukti penghasilan atau slip gaji</li>
                                    <li>Dokumen pendukung lainnya seperti surat keterangan domisili, foto rumah, rekening listrik atau air</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <strong>Mengisi Formulir Pengajuan:</strong>
                            <div class="step-details">
                                <p>Pemohon diharuskan mengisi formulir pengajuan yang disediakan oleh instansi terkait. Formulir ini bisa diperoleh dari kantor dinas sosial atau diunduh dari situs web resmi.</p>
                            </div>
                        </li>
                        <li>
                            <strong>Mendapatkan Surat Pengantar dari RT/RW:</strong>
                            <div class="step-details">
                                <p>Pemohon harus mendapatkan surat pengantar dari ketua RT atau RW setempat sebagai bukti bahwa pemohon benar-benar berdomisili di wilayah tersebut.</p>
                            </div>
                        </li>
                        <li>
                            <strong>Pengajuan ke Kelurahan atau Dinas Sosial:</strong>
                            <div class="step-details">
                                <p>Setelah semua dokumen lengkap, pemohon harus mengajukan permohonan ke kantor kelurahan atau dinas sosial terdekat. Petugas akan memeriksa kelengkapan dokumen dan mengonfirmasi data yang diberikan.</p>
                            </div>
                        </li>
                        <li>
                            <strong>Proses Verifikasi dan Validasi:</strong>
                            <div class="step-details">
                                <p>Instansi terkait akan melakukan verifikasi dan validasi terhadap data dan dokumen yang diserahkan. Petugas mungkin akan melakukan kunjungan lapangan untuk memastikan kondisi sebenarnya.</p>
                            </div>
                        </li>
                        <li>
                            <strong>Pengambilan Keputusan:</strong>
                            <div class="step-details">
                                <p>Berdasarkan hasil verifikasi, instansi terkait akan membuat keputusan apakah permohonan bantuan sosial disetujui atau ditolak. Pemohon akan diberitahu mengenai hasil ini.</p>
                            </div>
                        </li>
                        <li>
                            <strong>Penyaluran Bantuan:</strong>
                            <div class="step-details">
                                <p>Jika permohonan disetujui, bantuan sosial akan disalurkan sesuai dengan mekanisme yang telah ditetapkan. Bantuan bisa berupa uang tunai, sembako, atau bentuk bantuan lainnya.</p>
                            </div>
                        </li>
                    </ol>
                    <p>Pastikan untuk mengikuti setiap langkah dengan cermat dan menyediakan informasi serta dokumen yang akurat agar proses pengajuan berjalan lancar.</p>
                </div>
            </div>
        </div>

    </div>
</div>
</section>
@endsection

<style>
    /* General Styles */

    /* Intro Section */



</style>

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var collapsibleCards = document.querySelectorAll('.card');

        collapsibleCards.forEach(function (card) {
            card.addEventListener('click', function () {
                var collapseId = card.querySelector('.collapse').id;
                toggleCollapse(collapseId);
            });
        });

        function toggleCollapse(collapseId) {
            var collapseElement = document.getElementById(collapseId);
            if (collapseElement.classList.contains('show')) {
                collapseElement.classList.remove('show');
            } else {
                collapseElement.classList.add('show');
                closeOtherCollapse(collapseId);
            }
        }

        function closeOtherCollapse(currentCollapseId) {
            collapsibleCards.forEach(function (card) {
                var collapseId = card.querySelector('.collapse').id;
                if (collapseId !== currentCollapseId) {
                    var otherCollapse = document.getElementById(collapseId);
                    otherCollapse.classList.remove('show');
                }
            });
        }
    });
</script>
@endpush
