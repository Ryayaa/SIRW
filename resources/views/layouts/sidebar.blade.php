{{-- JS7 praktikum 1 bagian 12 --}}

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
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{--{{ $activeMenu == 'dashboard' ? 'active' : '' }}--}} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/warga') }}" class="nav-link {{--{{ $activeMenu == 'warga' ? 'active' : '' }}--}} ">
                  <i class="nav-icon far fa-address-card"></i>
                  <p>Kelola Warga</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/rw') }}" class="nav-link {{ ($activeMenu == 'rw') ? 'active' : '' }} ">
                <i class="nav-icon far fa fa-user-tie"></i>
                <p>Ketua RW</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/rt') }}" class="nav-link {{ ($activeMenu == 'rt') ? 'active' : '' }} ">
                <i class="nav-icon far fa fa-user-tie"></i>
                <p>Ketua RT</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/keluarga') }}" class="nav-link {{ ($activeMenu == 'keluarga') ? 'active' : '' }} ">
                <i class="nav-icon far fa fa-house-user"></i>
                <p>Keluarga</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/bansos') }}" class="nav-link {{--{{ ($activeMenu == 'bansos') ? 'active' : '' }}--}}">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>Kelola Bansos</p>
              </a>
          </li>
            <li class="nav-item">
              <a href="{{ url('/penerima') }}" class="nav-link {{--{{ $activeMenu == 'penerima' ? 'active' : '' }}--}} ">
                  <i class="nav-icon far fa fa-file-medical"></i>
                  <p>Penerima Bansos</p>
              </a>
              <li class="nav-item">
                  <a href="{{ route('tamu.index') }}" class="nav-link {{ $activeMenu == 'tamu' ? 'active' : '' }}">
                      <i class="nav-icon far fa fa-user"></i>
                      <p>Data Tamu</p>
                  </a>
              </li>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link ">
                  <i class="nav-icon far fa fa-file-medical"></i>
                  <p>Logout</p>
              </a>
            </li>
        </ul>
    </nav>
  </div>
  
