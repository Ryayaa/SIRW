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

Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard',[WelcomeController::class,'index']);



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
Route::group(['middleware' => ['auth']],function(){
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

    });
});
