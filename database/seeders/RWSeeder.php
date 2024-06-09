<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RWModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id_warga' => 1,
            'status' => 'Aktif',
            'mulai_jabatan' => '2020-01-01',
        ];

        // Tambahkan data lainnya sesuai kebutuhan
    DB::table('rw')->updateOrInsert($data);

    }
}
