<?php

namespace Database\Seeders;

use App\Models\RwModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class testrw extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RwModel::updateOrCreate([
            'nama_lengkap' => 'RW-Test',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Test',
            'no_telepon' => '1234567890',
            'username' => 'TestRW',
            'password' => Hash::make('12345'),
            'status' => 'Aktif',
            'mulai_jabatan' => now(),
        ]);
    }
}
