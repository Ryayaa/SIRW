<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/faq.jpg" alt=""> -->
            <h1>SIRW<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="#">Tentang</a></li>
                <li class="dropdown"><a href="#"><span>Bantuan Sosial</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('bansos.user-login')}}">Daftar Bansos</a></li>
                        <li><a href="#">Pengajuan Penerima Baru</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>UMKM</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('umkm.user-login')}}">Daftar UMKM</a></li>
                        <li><a href="#">Pengajuan UMKM</a></li>
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
                        <li><a href="#">Surat Pengantar</a></li>
                        <li><a href="#">Warga Sementara</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#">Tamu</a></li>
                <!-- <li><a class="nav-link scrollto" href="#"></a></li> -->
                <li class="dropdown"><a href="#"><span>Akun</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('profile')}}">Profile</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
    </div>
</header>
