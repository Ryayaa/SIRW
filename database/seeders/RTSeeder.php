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
                'no_rt' => 'RT-1',
            ],
            [
                'no_rt' => 'RT-2',
            ],
            [
                'no_rt' => 'RT-3',
            ],
            [
                'no_rt' => 'RT-4',
            ],
            [
                'no_rt' => 'RT-5',
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
