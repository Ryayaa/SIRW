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
        Schema::create('kepala_keluarga', function (Blueprint $table) {
            $table->id('id_kepkel');
            $table->timestamps();

            $table->unsignedBigInteger('id_keluarga');
            $table->unsignedBigInteger('id_warga');
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluarga');
            $table->foreign('id_warga')->references('id_warga')->on('warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_keluarga');
    }
};
