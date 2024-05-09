<?php

namespace Database\Seeders;

use App\Models\RtModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class testrt extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RtModel::updateOrCreate([
            'no_rt' => '2',
            'nama_lengkap' => 'RT-Test',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Test2',
            'username' => 'TestRT',
            'password' => Hash::make('12345'),
            'status' => 'Aktif',
            'mulai_jabatan' => now(),
        ]);
    }
}
