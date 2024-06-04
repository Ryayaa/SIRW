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
        Schema::create('rt', function (Blueprint $table) {
            $table->id('id_rt');
            $table->string('no_rt')->unique();
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 255);
            $table->string('no_telepon',45);
            $table->unsignedBigInteger('id_rw');
            $table->enum('status', ['Aktif', 'Pensiun']);
            $table->dateTime('mulai_jabatan')->nullable();
            $table->dateTime('akhir_jabatan')->nullable();
            $table->foreign('id_rw')->references('id_rw')->on('rw');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
