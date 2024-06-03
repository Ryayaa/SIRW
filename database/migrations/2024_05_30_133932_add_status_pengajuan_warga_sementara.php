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
        Schema::table('warga_sementara', function (Blueprint $table) {
            $table->enum('status_pengajuan', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('id_warga');
            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->string('username');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga_sementara', function (Blueprint $table) {
            $table->dropColumn('status_pengajuan');
            $table->dropForeign(['id_warga']);
            $table->dropColumn('id_warga');
            $table->dropColumn('username');

        });
    }
};
