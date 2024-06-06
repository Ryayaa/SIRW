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
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->id('id_alternatif');
            $table->unsignedBigInteger('id_penerima');
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_nilai');
            $table->timestamps();

            $table->foreign('id_penerima')->references('id_penerima')->on('penerima_bansos');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria_bansos');
            $table->foreign('id_nilai')->references('id_nilai')->on('nilai_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_alternatif');
    }
};
