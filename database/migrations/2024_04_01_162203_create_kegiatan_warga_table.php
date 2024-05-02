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
        Schema::create('kegiatan_warga', function (Blueprint $table) {
            $table->id('id_kegiatan_warga');
            $table->string('nama_kegiatan',100);
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_rt');
            $table->timestamps();

            $table->foreign('id_rt')->references('id_rt')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_warga');
    }
};
