<?php

<<<<<<< HEAD
use App\Http\Controllers\BansosController;
=======
use App\Http\Controllers\PenerimaBansosController;
>>>>>>> c6088fc3718eb3214c96976a7b6f74c510d19462
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;

Route::get('/',[WelcomeController::class,'index']);

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

<<<<<<< HEAD
// Bansos Routes
Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', [BansosController::class, 'index'])->name('bansos.index');
    Route::get('/list', [BansosController::class, 'list'])->name('bansos.list'); 
    Route::get('/create', [BansosController::class, 'create'])->name('bansos.create');
    Route::post('/', [BansosController::class, 'store'])->name('bansos.store');
    Route::get('/{id}', [BansosController::class, 'show'])->name('bansos.show');
    Route::get('/{id}/edit', [BansosController::class, 'edit'])->name('bansos.edit'); 
    Route::put('/{id}', [BansosController::class, 'update'])->name('bansos.update'); 
    Route::delete('/{id}', [BansosController::class, 'destroy'])->name('bansos.destroy');
});

// Add this if you haven't already defined it in your ServiceProvider
Route::pattern('id', '[0-9]+');

=======
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
>>>>>>> c6088fc3718eb3214c96976a7b6f74c510d19462


// Route::get('/', function () {
//     return view('welcome');
// });
