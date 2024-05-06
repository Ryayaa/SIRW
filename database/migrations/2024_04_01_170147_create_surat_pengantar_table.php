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
        Schema::create('surat_pengantar', function (Blueprint $table) {
            $table->id('id_surat_pengantar');
            $table->string('keterangan',255);
            $table->date('tanggal');
            $table->unsignedBigInteger('id_warga');
            $table->unsignedBigInteger('id_jenis_surat');
            $table->timestamps();
            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->foreign('id_jenis_surat')->references('id_jenis_surat')->on('jenis_surat_pengantar');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pengantar');
    }
};
