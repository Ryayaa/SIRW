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
            $table->enum('status', ['pending','diterima', 'ditolak'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga_sementara', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
