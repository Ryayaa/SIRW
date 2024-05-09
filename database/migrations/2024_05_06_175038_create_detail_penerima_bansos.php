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
        Schema::create('detail_penerima_bansos', function (Blueprint $table) {
            $table->id('id_detail_penerima_bansos');
            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->unsignedBigInteger('id_bansos');
            $table->unsignedBigInteger('id_penerima_bansos');
            $table->timestamps();

            $table->foreign('id_bansos')->references('id_bansos')->on('bansos');
            $table->foreign('id_penerima_bansos')->references('id_penerima_bansos')->on('penerima_bansos');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penerima_bansos');
    }
};
