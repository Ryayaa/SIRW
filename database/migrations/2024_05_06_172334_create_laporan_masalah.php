<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_masalah', function (Blueprint $table) {
            $table->id('id_laporan_masalah');
            $table->string('judul_laporan');
            $table->text('deskripsi');
            $table->date('tanggal_laporan');
            $table->string('gambar')->nullable();
            $table->enum('status_hide',['y','t'])->default('y');
            $table->unsignedBigInteger('id_warga')->nullable();
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_masalah');
    }
};
