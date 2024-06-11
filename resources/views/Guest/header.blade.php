<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="{{route('LandingPage')}}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <h1>SIRW<span>.</span></h1>
            {{-- <img src="assets/img/faq.jpg" alt=""> --}}
       </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{route('LandingPage')}}">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Bantuan Sosial</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('bansos.user-login')}}">Daftar Bansos</a></li>
                        <li><a href="{{route('pengajuan.user-login')}}">Pengajuan Penerima Baru</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>UMKM</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('umkm.user-login')}}">Daftar UMKM</a></li>
                        <li><a href="{{route('umkm_form.show')}}">Pengajuan UMKM</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('struktur')}}">Struktur Pengurus</a></li>
                        <li><a href="{{route('pengumuman')}}">Pengumuman</a></li>
                        <li><a href="{{route('kegiatanWarga')}}">Kegiatan Warga</a></li>
                        <li><a href="{{route('laporanMasalah')}}">Laporan Masalah</a></li>
                        {{-- <li><a href="{{route('kasWarga')}}">Kas</a></li> --}}
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Pengajuan</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('surat_pengantar-form.show')}}">Surat Pengantar</a></li>
                        <li><a href="{{route('warga-sementara_form.show')}}">Warga Sementara</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{route('tamu_form.show')}}">Tamu</a></li>
                <!-- <li><a class="nav-link scrollto" href="#"></a></li> -->
                <li class="nav-link">
                    <a class="btn-getstarted scrollto " href="{{route('login')}}">Masuk</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
    </div>
</header>
