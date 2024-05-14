<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\PenerimaBansosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PengumumanController;

Route::get('/',[WelcomeController::class,'index']);

Route::get('/index', function () {
    return view('index');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function () {
    return view('login');
});

Route::group(['prefix' => 'warga'], function () {
    Route::get('/', [WargaController::class, 'index'])->name('warga.index'); // Menampilkan data warga
    Route::post('/list', [WargaController::class, 'list'])->name('warga.list'); // Menampilkan data warga dalam bentuk JSON untuk DataTables
    Route::get('/create', [WargaController::class, 'create'])->name('warga.store'); // Menampilkan form tambah warga
    Route::post('/', [WargaController::class, 'store']); // Menyimpan data warga
    Route::get('/{id}', [WargaController::class, 'show']); // Menampilkan detail warga
    Route::get('/{id}/edit', [WargaController::class, 'edit']); // Menampilkan form edit warga
    Route::put('/{id}', [WargaController::class, 'update']); // Mengupdate data warga
    Route::delete('/{id}', [WargaController::class, 'destroy']); // Menghapus data warga
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



// Route::get('/', function () {
//     return view('welcome');
// });