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
        Schema::create('feedback_laporan_masalah', function (Blueprint $table) {
            $table->id("id_feedback");
            $table->unsignedBigInteger('id_laporan_masalah');
            $table->string('gambar')->nullable();
            $table->text('feedback');
            $table->foreign('id_laporan_masalah')->references('id_laporan_masalah')->on('laporan_masalah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_laporan_masalah');
    }
};
