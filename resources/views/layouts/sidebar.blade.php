<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <!-- Kelola Data -->
            <li class="nav-item has-treeview {{ in_array($activeMenu, ['rw', 'rt', 'keluarga', 'warga', 'tamu']) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Kelola Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/rw') }}" class="nav-link {{ $activeMenu == 'rw' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-tie"></i>
                            <p>Jabatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/keluarga') }}" class="nav-link {{ $activeMenu == 'keluarga' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-house-user"></i>
                            <p>Keluarga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/warga') }}" class="nav-link {{ $activeMenu == 'warga' ? 'active' : '' }}">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>Warga Sementara</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tamu.index') }}" class="nav-link {{ $activeMenu == 'tamu' ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>Data Tamu</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Kelola Bansos -->
            <li class="nav-item has-treeview {{ in_array($activeMenu, ['bansos', 'penerima']) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>
                        Kelola Bansos
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/bansos') }}" class="nav-link {{ $activeMenu == 'bansos' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>Kelola Bansos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/penerima') }}" class="nav-link {{ $activeMenu == 'penerima' ? 'active' : '' }}">
                            <i class="nav-icon far fa-file-medical"></i>
                            <p>Penerima Bansos</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Pengajuan -->
            <li class="nav-item has-treeview {{ $activeMenu == 'umkm' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Pengajuan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/umkm') }}" class="nav-link {{ $activeMenu == 'umkm' ? 'active' : '' }}">
                            <i class="nav-icon far fa-file-medical"></i>
                            <p>Pengajuan UMKM</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('/warga_sementara') }}" class="nav-link {{ $activeMenu == 'warga_sementara' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>Warga Sementara</p>
                </a>
            </li>         
            <li class="nav-item">
                <a href="{{ url('/pengumuman') }}" class="nav-link {{ $activeMenu == 'pengumuman' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-bullhorn"></i>
                    <p>Pengumuman</p>
                </a>
            </li>
            <!-- Kegiatan Warga -->
            <li class="nav-item">
                <a href="{{ url('/kegiatan') }}" class="nav-link {{ $activeMenu == 'kegiatan' ? 'active' : '' }}">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Kegiatan Warga</p>
                </a>
            </li>
            <!-- Pengelolaan Kas -->
            <li class="nav-item">
                <a href="{{ url('/kas') }}" class="nav-link {{ $activeMenu == 'kas' ? 'active' : '' }}">
                    <i class="nav-icon far fa-file-medical"></i>
                    <p>Pengelolaan Kas</p>
                </a>
            </li>
            <!-- Logout -->
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
