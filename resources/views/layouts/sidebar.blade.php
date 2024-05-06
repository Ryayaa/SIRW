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
              <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/warga') }}" class="nav-link {{ $activeMenu == 'warga' ? 'active' : '' }} ">
                <i class="nav-icon far fa-address-card"></i>
                <p>Kelola Warga</p>
            </a>
<<<<<<< HEAD
        </li>
        <li class="nav-item">
            <a href="{{ url('/bansos') }}" class="nav-link {{ $activeMenu == 'bansos' ? 'active' : '' }}">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>Kelola Bansos</p>
            </a>
        </li>
=======
          </li>
          <li class="nav-item">
            <a href="{{ url('/penerima') }}" class="nav-link {{ $activeMenu == 'penerima' ? 'active' : '' }} ">
                <i class="nav-icon far fa fa-file-medical"></i>
                <p>Penerima Bansos</p>
            </a>
          </li>
>>>>>>> c6088fc3718eb3214c96976a7b6f74c510d19462
          {{-- <li class="nav-header">Data Pengguna</li>
          <li class="nav-item">
              <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>Level User</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                  <i class="nav-icon far fa-user"></i>
                  <p>Data User</p>
              </a>
          </li>
          <li class="nav-header">Data Barang</li>
          <li class="nav-item">
              <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} ">
                  <i class="nav-icon far fa-bookmark"></i>
                  <p>Kategori Barang</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} ">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>Data Barang</p>
              </a>
          </li>
          <li class="nav-header">Data Transaksi</li>
          <li class="nav-item">
              <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-cubes"></i>
                  <p>Stok Barang</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/transaksi') }}" class="nav-link {{ $activeMenu == 'transaksi' ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-cash-register"></i>
                  <p>Transaksi Penjualan</p>
              </a>
          </li> --}}
      </ul>
  </nav>
</div>