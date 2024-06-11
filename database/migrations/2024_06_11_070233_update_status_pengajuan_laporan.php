<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Alter the table and change the enum values with a default value
        DB::statement("ALTER TABLE laporan_masalah MODIFY COLUMN status_pengajuan ENUM('approved', 'wait', 'pending', 'reject') NOT NULL DEFAULT 'pending'");
    }

    public function down()
    {
        // Revert the changes if the migration is rolled back
        DB::statement("ALTER TABLE laporan_masalah MODIFY COLUMN status_pengajuan ENUM('approved', 'pending', 'reject') NOT NULL DEFAULT 'pending'");
    }
};
