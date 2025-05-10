<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class XpStageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $xpStages = [
            ['stage' => 1, 'xp' => 2],
            ['stage' => 2, 'xp' => 6],
            ['stage' => 3, 'xp' => 12],
            ['stage' => 4, 'xp' => 19],
            ['stage' => 5, 'xp' => 27],
            ['stage' => 6, 'xp' => 36],
            ['stage' => 7, 'xp' => 46],
            ['stage' => 8, 'xp' => 58],
            ['stage' => 9, 'xp' => 70],
            ['stage' => 10, 'xp' => 83],
            ['stage' => 11, 'xp' => 96],
            ['stage' => 12, 'xp' => 111],
            ['stage' => 13, 'xp' => 126],
            ['stage' => 14, 'xp' => 142],
            ['stage' => 15, 'xp' => 159],
            ['stage' => 16, 'xp' => 177],
            ['stage' => 17, 'xp' => 195],
            ['stage' => 18, 'xp' => 214],
            ['stage' => 19, 'xp' => 233],
            ['stage' => 20, 'xp' => 253],
        ];

        DB::table('xp_stage')->insert($xpStages);
    }
}
