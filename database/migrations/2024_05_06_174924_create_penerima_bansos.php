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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id('id_penerima');
            $table->unsignedBigInteger('id_warga');
            $table->unsignedBigInteger('id_bansos');
            $table->enum('status',['pending','tolak','diterima']);
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->foreign('id_bansos')->references('id_bansos')->on('bansos');

        });
    }
    /**}
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
