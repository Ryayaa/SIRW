<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'no_rt' => '01',
            ],
            [
                'no_rt' => '02',
            ],
            [
                'no_rt' => '03',
            ],
            [
                'no_rt' => '04',
            ],
            [
                'no_rt' => '05',
            ],
        ];

        foreach ($data as $rt) {
            DB::table('rt')->updateOrInsert(
                ['no_rt' => $rt['no_rt']], // Kondisi pencocokan
                $rt // Data untuk di-update atau insert
            );
        }
    }
}
