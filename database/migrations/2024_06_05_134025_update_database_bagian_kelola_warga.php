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
        Schema::table('rt', function (Blueprint $table) {
            // Menghapus kolom
            $table->dropColumn(['nama_lengkap', 'jenis_kelamin', 'alamat', 'no_telepon','status','mulai_jabatan','akhir_jabatan']);
        });
        Schema::table('rw', function (Blueprint $table) {
            // Menghapus kolom
            $table->dropColumn(['nama_lengkap', 'jenis_kelamin', 'alamat', 'no_telepon']);
            
            // Menambahkan kolom id_warga dan membuatnya nullable serta menjadi foreign key ke tabel warga
            $table->unsignedBigInteger('id_warga')->nullable();
            $table->foreign('id_warga')->references('id_warga')->on('warga')->onDelete('set null');
        });
        Schema::table('warga', function (Blueprint $table) {
            $table->string('bukti_ktp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->enum('status_hubungan', ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Lainnya'])->nullable();

        });
        Schema::table('keluarga', function (Blueprint $table) {
            $table->string('bukti_kk')->nullable();
        });
        Schema::create('ketua_rt', function (Blueprint $table) {
            $table->id('id_ketua_rt');
            $table->unsignedBigInteger('id_rt');
            $table->unsignedBigInteger('id_warga')->nullable();
            $table->enum('status', ['aktif', 'pensiun'])->default('aktif');
            $table->dateTime('mulai_jabatan');
            $table->dateTime('akhir_jabatan')->nullable();
            $table->foreign('id_rt')->references('id_rt')->on('rt');
            $table->foreign('id_warga')->references('id_warga')->on('warga');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rt', function (Blueprint $table) {
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('no_telepon', 15);
            $table->enum('status', ['aktif', 'pensiun'])->default('aktif');
            $table->dateTime('mulai_jabatan');
            $table->dateTime('akhir_jabatan')->nullable();
        });
        Schema::table('rw', function (Blueprint $table) {
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('no_telepon', 15);
            $table->dropForeign(['id_warga']);
            $table->dropColumn('id_warga');
        });
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn(['bukti_ktp', 'tempat_lahir', 'status_hubungan']);
        });
        Schema::table('keluarga', function (Blueprint $table) {
            $table->dropColumn('bukti_kk');
        });
        Schema::dropIfExists('ketua_rt');
    }
};
