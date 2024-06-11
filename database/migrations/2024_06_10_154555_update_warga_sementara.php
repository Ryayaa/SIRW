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
        Schema::table('warga_sementara', function (Blueprint $table) {
            $table->string('bukti_ktp')->nullable()->change();
            $table->string('tempat_lahir', 100)->after('tanggal_lahir');
            $table->dropColumn('alamat_asal');
            $table->dropForeign(['id_warga']);
            $table->dropColumn('id_warga');
            $table->dropColumn('tanggal_masuk');
            $table->dropColumn('status_pengajuan');
            $table->dropColumn('password');
            $table->enum('status_hubungan', ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Lainnya'])->nullable();
            $table->enum('agama', ['islam', 'protestan', 'katolik', 'budha', 'hindu', 'khonghucu'])->nullable();
            $table->string('no_telepon', 15)->nullable()->after('tempat_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga_sementara', function (Blueprint $table) {
            $table->string('bukti_ktp')->nullable(false)->change();
            $table->dropColumn('tempat_lahir');
            $table->string('alamat_asal', 100)->nullable();
            $table->unsignedBigInteger('id_warga')->nullable();
            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->date('tanggal_masuk');
            $table->enum('status_pengajuan', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('password');
            $table->dropColumn('status_hubungan');
            $table->dropColumn('agama');
            $table->dropColumn('no_telepon');
        });
    }
};
