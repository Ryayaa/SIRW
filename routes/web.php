<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PenerimaBansosController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;

Route::get('/',[WelcomeController::class,'index']);

Route::get('/index', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
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

// Route::get('/', function () {
//     return view('welcome');
// });