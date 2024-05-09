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
        Schema::create('warga_sementara', function (Blueprint $table) {
            $table->id('id_warga_sementara');
            $table->string('bukti_ktp');
            $table->string('nik', 20)->unique();
            $table->date('tanggal_lahir');
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('alamat_asal', 255);
            $table->string('alamat_domisili', 255);
            $table->string('pekerjaan', 50);
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin','Cerai Mati','Cerai Hidup'])->default('Belum Kawin');
            $table->date('tanggal_masuk');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga_sementara');
    }
};
