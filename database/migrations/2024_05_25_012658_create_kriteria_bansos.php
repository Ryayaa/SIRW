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
        Schema::create('kriteria_bansos', function (Blueprint $table) {
            $table->id('id_kriteria');
            $table->unsignedBigInteger('id_bansos');
            $table->string('nama');
            $table->double('bobot');
            $table->enum('jenis', ['Cost', 'Benefit']);
            $table->timestamps();
            
            $table->foreign('id_bansos')->references('id_bansos')->on('bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_bansos');
    }
};
