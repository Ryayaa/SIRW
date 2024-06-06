<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PenerimaBansosController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KasController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard', [WelcomeController::class, 'index']);



// Route::get('/login', function () {
//     return view('login');
// });
Route::group(['prefix' => 'rw'], function () {
    Route::get('/', [RwController::class, 'index'])->name('rw.index'); // Menampilkan data warga
    Route::post('/list', [RwController::class, 'list'])->name('rw.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [RwController::class, 'create'])->name('rw.create'); // Menampilkan form tambah warga
    Route::post('/', [RwController::class, 'store'])->name('rw.store'); // Menyimpan data warga
    Route::get('/{id}', [RwController::class, 'show'])->name('rw.show'); // Menampilkan detail warga
    Route::get('/{id}/edit', [RwController::class, 'edit'])->name('rw.edit'); // Menampilkan form edit warga
    Route::put('/{id}', [RwController::class, 'update'])->name('rw.update'); // Mengupdate data warga
    Route::delete('/{id}', [RwController::class, 'destroy'])->name('rw.destroy'); // Menghapus data warga
});

Route::group(['prefix' => 'rt'], function () {
    Route::get('/', [RtController::class, 'index'])->name('rt.index'); // Menampilkan data warga
    Route::post('/list', [RtController::class, 'list'])->name('rt.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [RtController::class, 'create'])->name('rt.create'); // Menampilkan form tambah warga
    Route::post('/', [RtController::class, 'store'])->name('rt.store'); // Menyimpan data warga
    Route::get('/{id}', [RtController::class, 'show'])->name('rt.show'); // Menampilkan detail warga
    Route::get('/{id}/edit', [RtController::class, 'edit'])->name('rt.edit'); // Menampilkan form edit warga
    Route::put('/{id}', [RtController::class, 'update'])->name('rt.update'); // Mengupdate data warga
    Route::delete('/{id}', [RtController::class, 'destroy'])->name('rt.destroy'); // Menghapus data warga
});

Route::group(['prefix' => 'warga'], function () {
    Route::get('/', [WargaController::class, 'index'])->name('warga.index'); // Menampilkan data warga
    Route::post('/list', [WargaController::class, 'list'])->name('warga.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [WargaController::class, 'create'])->name('warga.create'); // Menampilkan form tambah warga
    Route::post('/', [WargaController::class, 'store'])->name('warga.store'); // Menyimpan data warga
    Route::get('/{id}', [WargaController::class, 'show'])->name('warga.show'); // Menampilkan detail warga
    Route::get('/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit'); // Menampilkan form edit warga
    Route::put('/{id}', [WargaController::class, 'update'])->name('warga.update'); // Mengupdate data warga
    Route::delete('/{id}', [WargaController::class, 'destroy'])->name('warga.destroy'); // Menghapus data warga
});

// Bansos Routes
Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', [BansosController::class, 'index'])->name('bansos.index');
    Route::post('/list', [BansosController::class, 'list'])->name('bansos.list');
    Route::get('/create', [BansosController::class, 'create'])->name('bansos.create');
    Route::post('/', [BansosController::class, 'store'])->name('bansos.store');
    Route::get('/{id}', [BansosController::class, 'show'])->name('bansos.show');
    Route::get('/{id}/edit', [BansosController::class, 'edit'])->name('bansos.edit');
    Route::put('/{id}', [BansosController::class, 'update'])->name('bansos.update');
    Route::delete('/{id}', [BansosController::class, 'destroy'])->name('bansos.destroy');
});

Route::group(['prefix' => 'penerima'], function () {
    Route::get('/', [PenerimaBansosController::class, 'index'])->name('penerima.index'); // Menampilkan data warga
    Route::post('/list', [PenerimaBansosController::class, 'list'])->name('penerima.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [PenerimaBansosController::class, 'create'])->name('penerima.create'); // Menampilkan form tambah warga
    Route::post('/', [PenerimaBansosController::class, 'store'])->name('penerima.store'); // Menyimpan data warga
    Route::get('/{id}', [PenerimaBansosController::class, 'show']); // Menampilkan detail warga
    Route::get('/{id}/edit', [PenerimaBansosController::class, 'edit']); // Menampilkan form edit warga
    Route::put('/{id}', [PenerimaBansosController::class, 'update']); // Mengupdate data warga
    Route::delete('/{id}', [PenerimaBansosController::class, 'destroy']); // Menghapus data warga
});

Route::group(['prefix' => 'rw'], function () {
    Route::get('/', [RwController::class, 'index'])->name('rw.index'); // Menampilkan data warga
    Route::post('/list', [RwController::class, 'list'])->name('rw.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [RwController::class, 'create'])->name('rw.create'); // Menampilkan form tambah warga
    Route::post('/', [RwController::class, 'store'])->name('rw.store'); // Menyimpan data warga
    Route::get('/{id}', [RwController::class, 'show'])->name('rw.show'); // Menampilkan detail warga
    Route::get('/{id}/edit', [RwController::class, 'edit'])->name('rw.edit'); // Menampilkan form edit warga
    Route::put('/{id}', [RwController::class, 'update'])->name('rw.update'); // Mengupdate data warga
    Route::delete('/{id}', [RwController::class, 'destroy'])->name('rw.destroy'); // Menghapus data warga
});

Route::group(['prefix' => 'rt'], function () {
    Route::get('/', [RtController::class, 'index'])->name('rt.index'); // Menampilkan data warga
    Route::post('/list', [RtController::class, 'list'])->name('rt.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [RtController::class, 'create'])->name('rt.create'); // Menampilkan form tambah warga
    Route::post('/', [RtController::class, 'store'])->name('rt.store'); // Menyimpan data warga
    Route::get('/{id}', [RtController::class, 'show'])->name('rt.show'); // Menampilkan detail warga
    Route::get('/{id}/edit', [RtController::class, 'edit'])->name('rt.edit'); // Menampilkan form edit warga
    Route::put('/{id}', [RtController::class, 'update'])->name('rt.update'); // Mengupdate data warga
    Route::delete('/{id}', [RtController::class, 'destroy'])->name('rt.destroy'); // Menghapus data warga
});

Route::group(['prefix' => 'keluarga'], function () {
    Route::get('/', [KeluargaController::class, 'index'])->name('keluarga.index'); // Menampilkan data warga
    Route::post('/list', [KeluargaController::class, 'list'])->name('keluarga.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [KeluargaController::class, 'create'])->name('keluarga.create'); // Menampilkan form tambah warga
    Route::post('/', [KeluargaController::class, 'store'])->name('keluarga.store'); // Menyimpan data warga
    Route::get('/{id}', [KeluargaController::class, 'show'])->name('keluarga.show'); // Menampilkan detail warga
    Route::get('/{id}/edit', [KeluargaController::class, 'edit'])->name('keluarga.edit'); // Menampilkan form edit warga
    Route::put('/{id}', [KeluargaController::class, 'update'])->name('keluarga.update'); // Mengupdate data warga
    Route::delete('/{id}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy'); // Menghapus data warga
});

Route::group(['prefix' => 'tamu'], function () {
    Route::get('/', [TamuController::class, 'index'])->name('tamu.index');
    Route::post('/list', [TamuController::class, 'list'])->name('tamu.list');
    Route::get('/create', [TamuController::class, 'create'])->name('tamu.create');
    Route::post('/', [TamuController::class, 'store'])->name('tamu.store');
    Route::get('/{id}', [TamuController::class, 'show'])->name('tamu.show');
    Route::get('/{id}/edit', [TamuController::class, 'edit'])->name('tamu.edit');
    Route::put('/{id}', [TamuController::class, 'update'])->name('tamu.update');
    Route::delete('/{id}', [TamuController::class, 'destroy'])->name('tamu.destroy');
});
Route::group(['middleware' => ['auth']], function () {
    // Route Untuk RW
    Route::group(['middleware' => ['roles:rw']], function () {
        Route::get('/rw-dashboard', [Dashboard::class, 'DashboardRW'])->name('rw-dashboard');
    });

    Route::group(['prefix' => 'pengumuman'], function () {
        Route::get('/', [PengumumanController::class, 'index'])->name('pengumuman.index'); // Menampilkan daftar pengumuman
        Route::post('/list', [PengumumanController::class, 'list'])->name('pengumuman.list'); // Menampilkan data pengumuman dalam bentuk JSON untuk DataTables
        Route::get('/create', [PengumumanController::class, 'create'])->name('pengumuman.create'); // Menampilkan form tambah pengumuman
        Route::post('/', [PengumumanController::class, 'store'])->name('pengumuman.store'); // Menyimpan data pengumuman
        Route::get('/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show'); // Menampilkan detail pengumuman
        Route::get('/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit'); // Menampilkan form edit pengumuman
        Route::put('/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update'); // Mengupdate data pengumuman
        Route::delete('/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy'); // Menghapus data pengumuman
    });



    Route::group(['prefix' => 'keluarga'], function () {
        Route::get('/', [KeluargaController::class, 'index'])->name('keluarga.index'); // Menampilkan data warga
        Route::post('/list', [KeluargaController::class, 'list'])->name('keluarga.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
        Route::get('/create', [KeluargaController::class, 'create'])->name('keluarga.create'); // Menampilkan form tambah warga
        Route::post('/', [KeluargaController::class, 'store'])->name('keluarga.store'); // Menyimpan data warga
        Route::get('/{id}', [KeluargaController::class, 'show'])->name('keluarga.show'); // Menampilkan detail warga
        Route::get('/{id}/edit', [KeluargaController::class, 'edit'])->name('keluarga.edit'); // Menampilkan form edit warga
        Route::put('/{id}', [KeluargaController::class, 'update'])->name('keluarga.update'); // Mengupdate data warga
        Route::delete('/{id}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy'); // Menghapus data warga
    });

Route::group(['prefix' => 'umkm'], function () {
    Route::get('/', [UMKMController::class, 'index'])->name('umkm.index'); // Display UMKM list
    Route::post('/list', [UMKMController::class, 'list'])->name('umkm.list'); // Display UMKM data in JSON format for DataTables
    Route::get('/create', [UMKMController::class, 'create'])->name('umkm.create'); // Display form to add UMKM
    Route::post('/', [UMKMController::class, 'store'])->name('umkm.store'); // Store UMKM data
    Route::get('/{id}', [UMKMController::class, 'show'])->name('umkm.show'); // Display UMKM details
    Route::get('/{id}/edit', [UMKMController::class, 'edit'])->name('umkm.edit'); // Display form to edit UMKM
    Route::put('/{id}', [UMKMController::class, 'update'])->name('umkm.update'); // Update UMKM data
    Route::delete('/{id}', [UMKMController::class, 'destroy'])->name('umkm.destroy'); // Delete UMKM data
});

Route::group(['prefix' => 'kegiatan'], function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index'); // Menampilkan daftar kegiatan
    Route::post('/list', [KegiatanController::class, 'list'])->name('kegiatan.list'); // Menampilkan data kegiatan dalam format JSON untuk DataTables
    Route::get('/create', [KegiatanController::class, 'create'])->name('kegiatan.create'); // Menampilkan formulir untuk menambah kegiatan
    Route::post('/', [KegiatanController::class, 'store'])->name('kegiatan.store'); // Menyimpan data kegiatan
    Route::get('/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show'); // Menampilkan detail kegiatan
    Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit'); // Menampilkan formulir untuk mengedit kegiatan
    Route::put('/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update'); // Memperbarui data kegiatan
    Route::delete('/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy'); // Menghapus data kegiatan
});

Route::group(['prefix' => 'kas'], function () {
    Route::get('/', [KasController::class, 'index'])->name('kas.index'); // Menampilkan daftar kas
    Route::post('/list', [KasController::class, 'list'])->name('kas.list'); // Menampilkan data kas dalam bentuk JSON untuk DataTables
    Route::get('/create', [KasController::class, 'create'])->name('kas.create'); // Menampilkan form tambah kas
    Route::post('/', [KasController::class, 'store'])->name('kas.store'); // Menyimpan data kas
    Route::get('/{id}', [KasController::class, 'show'])->name('kas.show'); // Menampilkan detail kas
    Route::get('/{id}/edit', [KasController::class, 'edit'])->name('kas.edit'); // Menampilkan form edit kas
    Route::put('/{id}', [KasController::class, 'update'])->name('kas.update'); // Mengupdate data kas
    Route::delete('/{id}', [KasController::class, 'destroy'])->name('kas.destroy'); // Menghapus data kas
    Route::get('/transaksi/create', [KasController::class, 'createTransaksi'])->name('kas.transaksi.create'); // Menampilkan form transaksi kas
    Route::post('/transaksi', [KasController::class, 'storeTransaksi'])->name('kas.transaksi.store'); // Menyimpan data transaksi kas
    Route::get('/kas/history', [KasController::class, 'history'])->name('kas.history');

});



    //Route Untuk RT
    Route::group(['middleware' => ['roles:rt']], function () {
        Route::get('/rt-dashboard', [Dashboard::class, 'DashboardRT'])->name('rt-dashboard');
    });

    //Route Untuk Warga
    Route::group(['middleware' => ['roles:warga']], function () {
        Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
        Route::get('/warga-dashboard', [Dashboard::class, 'DashboardWarga'])->name('user-dashboard');
        Route::post('/profile/change-password', [AuthController::class, 'changePassword'])->name('profile.change-password');
        Route::get('/struktur-rw', [PageController::class, 'showPengurusRW'])->name('struktur');


        //surat
        Route::get('/surat_pengantar/create', [PageController::class, 'showSuratForm'])->name('surat_pengantar.form');
        Route::post('/surat_pengantar', [PageController::class, 'createSurat'])->name('surat_pengantar.create');
        //pengumuman
        Route::get('/pengumuman-list', [PageController::class, 'showPengumuman'])->name('pengumuman');
        Route::get('/pengumuman-list/detail/{id_pengumuman}', [PageController::class, 'showDetailPengumuman'])->name('pengumuman.detail');
        Route::get('/kegiatan-list', [PageController::class, 'showKegiatan'])->name('kegiatanWarga');
        Route::get('/kegiatan-list/detail/{id}', [PageController::class, 'showDetailKegiatan'])->name('kegiatan.detail');
        Route::get('/laporan-list', [PageController::class, 'showLaporan'])->name('laporanMasalah');
        Route::get('/laporan-list/detail/{id}', [PageController::class, 'showDetailLaporan'])->name('laporanMasalah.detail');
        Route::get('/umkm.-list', [PageController::class, 'showUMKM'])->name('umkm.user-login');
        Route::get('/umkm-list/detail/{id}', [PageController::class, 'showDetailUMKM'])->name('umkm.detail');
        Route::get('/bansos-list', [PageController::class, 'showBansos'])->name('bansos.user-login');

    Route::get('/laporan_masalah', [PageController::class, 'showLaporanForm'])->name('laporan_masalah_form.show');
    Route::post('/laporan_masalah/create', [PageController::class, 'createLaporanForm'])->name('laporan_masalah_form.create');

    Route::get('/umkm-form', [PageController::class, 'showPengajuanUMKMForm'])->name('umkm_form.show');
    Route::post('/umkm-form/create', [PageController::class, 'createPengajuanUMKMForm'])->name('umkm_form.create');

    Route::get('/tamu-form', [PageController::class, 'showTamuForm'])->name('tamu_form.show');
    Route::post('/tamu-form/create', [PageController::class, 'createTamuForm'])->name('tamu_form.create');

    Route::get('/warga-sementara-form', [PageController::class, 'showWargaSementaraForm'])->name('warga-sementara_form.show');
    Route::post('/warga-sementara-form/create', [PageController::class, 'createWargaSementaraForm'])->name('warga-sementara_form.create');
    });



});
