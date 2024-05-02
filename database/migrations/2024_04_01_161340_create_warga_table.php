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
        Schema::create('warga', function (Blueprint $table) {
            $table->id('id_warga');
            $table->string('NKK', 20);
            $table->string('NIK', 20)->unique();
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 255);
            $table->string('pekerjaan', 50);
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin'])->default('Belum Kawin');
            $table->string('password');
            $table->timestamps();

            $table->unsignedBigInteger('id_rt');
            $table->unsignedBigInteger('id_kategori_warga');
            $table->foreign('id_rt')->references('id_rt')->on('rt');
            $table->foreign('id_kategori_warga')->references('id_kategori_warga')->on('kategori_warga');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
