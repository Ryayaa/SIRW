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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('id_umkm');
            $table->string('nama_umkm',100);
            $table->string('alamat',200);
            $table->string('no_telepon',15);
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_warga');
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('warga');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
