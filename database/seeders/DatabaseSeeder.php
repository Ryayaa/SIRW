<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RTSeeder::class,
            KeluargaSeeder::class,
            WargaSeeder::class,
            RWSeeder::class,
            BansosSeeder::class,
            PenerimaSeeder::class,
            KriteriaSeeder::class,
            NilaiKriteriaSeeder::class,
            AlternatifSeeder::class,
        ]);
    }
}
