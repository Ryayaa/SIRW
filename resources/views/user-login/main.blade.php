@extends('user-login.index')

<section id="hero-static">
    <div class="hero-static">
        <div class="hero-bg"></div>
        <div class="container d-flex flex-column text-center position-relative">
            <div class="items">
                <h2 class="welcome">Website RW 03 Jatimulyo</h2>
                <h2><span>Selamat Datang</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis fugiat temporibus</p>
                <div class="d-flex">
                    {{-- <a href="#pengumuman" class="btn-get-started scrollto">Get Started</a> --}}
                    {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                </div>
            </div>
        </div>

    </div>

    <div id="features" class="features">
        <div class="container mt-4">
            <ul class="nav nav-tabs row gy-4 d-flex justify-content-center">
                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" href="{{route('bansos.user-login')}}">
                        <i class="bi bi-binoculars color-cyan"></i>
                        <h4 class="text-center">Bansos</h4>
                    </a>
                </li>
                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" href="{{route('pengumuman')}}">
                        <i class="bi bi-megaphone-fill color-indigo"></i>
                        <h4 class="text-center">Pengumuman</h4>
                    </a>
                </li>
                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" href="{{route('kegiatanWarga')}}">
                        <i class="bi bi-calendar2-week color-teal"></i>
                        <h4 class="text-center">Kegiatan</h4>
                    </a>
                </li>
                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" href="{{route('laporanMasalah')}}">
                        <i class="bi bi-newspaper color-red"></i>
                        <h4 class="text-center">Laporan</h4>
                    </a>
                </li>
                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" href="{{route('umkm.user-login')}}">
                        <i class="bi bi-shop color-blue"></i>
                        <h4 class="text-center">UMKM</h4>
                    </a>
                </li>
                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" href="{{route('struktur')}}">
                        <i class="bi bi-people-fill color-orange"></i>
                        <h4 class="text-center">Struktur</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Section Pengumuman -->
<section id="pengumuman" class="pengumuman py-5">
    <div class="container">
        <div class="section-header text-center">
            <h2>Pengumuman</h2>
            <p>Pengumuman Terbaru</p>
        </div>
        <div class="row justify-content-center">
            @foreach ($pengumumans as $pengumuman)
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="pengumuman-item rounded position-relative">
                        <a href="{{ route('pengumuman.detail', $pengumuman->id_pengumuman) }}"></a>
                        <div class="content">
                            <time class="mb-2">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F Y') }}</time>
                            <h4>{{ $pengumuman->judul_pengumuman }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($pengumuman->deskripsi, 200) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-4 text-center">
                    <a class="pengumuman-button" href="{{route('pengumuman')}}">Pengumuman Lainnya</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section Kegiatan -->
<section id="recent-blog-posts" class="recent-blog-posts">
<div class="container">
    <div class="section-header text-center">
        <h2>Kegiatan</h2>
        <p>Kegiatan Yang Akan Datang</p>
    </div>
    <div class="row mb-4">
        @foreach ($kegiatans as $kegiatan)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{route('kegiatan.detail',$kegiatan->id_kegiatan_warga)}}">
                    <div class="card activity-card">
                        <img src="{{ asset('assets/img/faq.jpg') }}" class="card-img-top" alt="Activity Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                            <div class="details">
                                <p class="mb-1"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') }}</p>
                                <p class="mb-1"><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d F Y') }}</p>
                                <p><i class="bi bi-geo-alt"></i> {{ $kegiatan->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="">
        <div class="col-md-12 mt-4 text-center ">
            <a href="{{route('kegiatanWarga')}}" class="custom-button">Kegiatan Lainnya</a>
        </div>
    </div>
</div>
</section>


<!-- Section UMKM -->
<section id="umkm" class="umkm">
    <div class="container w-100">
        <div class="section-header">
            <h2 class="text-center">Daftar UMKM</h2>
            <p>Daftar UMKM Di Lingkungan RW</p>
        </div>
        <div class="row">
            @foreach ($umkms as $umkm)
                <div class="col-md-6 col-6 mb-4">
                    <a href="{{ route('umkm.detail', $umkm->id_umkm) }}" class="article-link">
                        <article class="article-list">
                            <div class="inner row d-flex">
                                <div class="col-md-6">
                                    <figure class="rounded">
                                        <img src="{{-- asset('images/'.$bansos->gambar) --}}{{ asset('assets/img/faq.jpg') }}"
                                            class="img-fluid" alt="{{ $umkm->nama_umkm }}">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <div class="details">
                                        <div class="detail">
                                            <h1 class="umkm-title position-relative top-0">{{ $umkm->nama_umkm }}</h1>
                                            <p class="umkm-paragraph">{{ $umkm->alamat }}</p>
                                            <p class="umkm-paragraph">{{ $umkm->no_telepon }}</p>
                                        </div>
                                        <p class="position-relative bottom-0">Pemilik :
                                            {{ $umkm->warga->nama_lengkap }}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{route('umkm.user-login')}}" class="umkm-button">UMKM Lainnya</a>
            </div>
        </div>
    </div>
</section>
