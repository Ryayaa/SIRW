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
        Schema::create('nilai_kriteria', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->unsignedBigInteger('id_kriteria');
            $table->string('subkriteria');
            $table->integer('nilai');
            $table->timestamps();
            
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria_bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_keriteria');
    }
};
