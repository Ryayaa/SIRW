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
            $table->id();
            $table->string('nama_umkm');
            $table->string('alamat');
            $table->string('no_telepon', 15);
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_warga');
            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->boolean('status_pengajuan')->nullable();
            $table->timestamps();

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
