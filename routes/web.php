<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PenerimaBansosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;

Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

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

Route::group(['middleware' => ['auth']],function(){
    // Route Untuk RW
    Route::group(['middleware' => ['roles:rw']],function(){
        Route::get('/rw-dashboard', [Dashboard::class,'DashboardRW'])->name('rw-dashboard');
    });


    //Route Untuk RT
    Route::group(['middleware' => ['roles:rt']],function(){
        Route::get('/rt-dashboard', [Dashboard::class,'DashboardRT'])->name('rt-dashboard');
    });

    //Route Untuk Warga
    Route::group(['middleware' => ['roles:warga']],function(){
        Route::get('/warga-dashboard', [Dashboard::class,'DashboardWarga'])->name('user-dashboard');
    });


});
