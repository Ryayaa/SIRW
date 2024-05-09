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
        Schema::create('kas', function (Blueprint $table) {
            $table->id('id_kas');
            $table->integer('jumlah');
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_keluar');
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
        Schema::dropIfExists('kas');
    }
};