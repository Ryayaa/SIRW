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
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('alamat_domisili', 255);
            $table->string('pekerjaan', 50);
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin','Cerai Mati','Cerai Hidup'])->default('Belum Kawin');
            $table->enum('roles', ['rt', 'rw','warga','warga sementara'])->default('warga');
            $table->string('password');

            $table->timestamps();


            $table->unsignedBigInteger('id_keluarga');
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluarga');
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
