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
        Schema::table('rt', function (Blueprint $table) {
            $table->dropForeign(['id_rw']);
            $table->dropColumn('id_rw');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rt', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rw')->nullable();
            $table->foreign('id_rw')->references('id_rw')->on('rw');
        });
    }
};
