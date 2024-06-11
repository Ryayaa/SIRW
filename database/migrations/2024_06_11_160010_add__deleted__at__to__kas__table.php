<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToKasTable extends Migration
{
    public function up()
    {
        Schema::table('kas', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('kas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
