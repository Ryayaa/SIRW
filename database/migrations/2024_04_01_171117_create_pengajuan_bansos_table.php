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
        Schema::create('pengajuan_bansos', function (Blueprint $table) {
            $table->id('id_pengajuan_bansos');
            $table->unsignedBigInteger('id_warga_diajukan');
            $table->integer('pendapatan');
            $table->integer('listrik_rumah');
            $table->string('sktm');
            $table->string('keterangan');
            $table->enum('status_pengajuan',['Terkonfirmasi','Belum Dikonfirmasi'])->default('Belum Dikonfirmasi');
            $table->unsignedBigInteger('id_warga');
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->foreign('id_warga_diajukan')->references('id_warga')->on('warga');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bansos');
    }
};
