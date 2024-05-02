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
        Schema::create('barang_jasa', function (Blueprint $table) {
            $table->id('id_barang_jasa');
            $table->string('nama_barang_jasa',100);
            $table->integer('harga');
            $table->string('deskripsi',255);
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_umkm');

            $table->timestamps();
            $table->foreign('id_umkm')->references('id_umkm')->on('umkm');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_jasa');
    }
};
