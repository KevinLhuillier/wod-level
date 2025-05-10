<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class XpLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $xpLevels = [
            ['level' => 1, 'xp' => 5],
            ['level' => 2, 'xp' => 20],
            ['level' => 3, 'xp' => 49],
            ['level' => 4, 'xp' => 95],
            ['level' => 5, 'xp' => 161],
            ['level' => 6, 'xp' => 249],
            ['level' => 7, 'xp' => 361],
            ['level' => 8, 'xp' => 500],
            ['level' => 9, 'xp' => 668],
            ['level' => 10, 'xp' => 867],
            ['level' => 11, 'xp' => 1099],
            ['level' => 12, 'xp' => 1365],
            ['level' => 13, 'xp' => 1668],
            ['level' => 14, 'xp' => 2009],
            ['level' => 15, 'xp' => 2390],
            ['level' => 16, 'xp' => 2812],
            ['level' => 17, 'xp' => 3277],
            ['level' => 18, 'xp' => 3787],
            ['level' => 19, 'xp' => 4343],
            ['level' => 20, 'xp' => 4946],
            ['level' => 21, 'xp' => 5598],
            ['level' => 22, 'xp' => 6301],
            ['level' => 23, 'xp' => 7056],
            ['level' => 24, 'xp' => 7864],
            ['level' => 25, 'xp' => 8726],
            ['level' => 26, 'xp' => 9644],
            ['level' => 27, 'xp' => 10619],
            ['level' => 28, 'xp' => 11653],
            ['level' => 29, 'xp' => 12746],
            ['level' => 30, 'xp' => 13900],
            ['level' => 31, 'xp' => 15117],
            ['level' => 32, 'xp' => 16397],
            ['level' => 33, 'xp' => 17742],
            ['level' => 34, 'xp' => 19152],
            ['level' => 35, 'xp' => 20629],
            ['level' => 36, 'xp' => 22174],
            ['level' => 37, 'xp' => 23789],
            ['level' => 38, 'xp' => 25474],
            ['level' => 39, 'xp' => 27231],
            ['level' => 40, 'xp' => 29060],
            ['level' => 41, 'xp' => 30963],
            ['level' => 42, 'xp' => 32941],
            ['level' => 43, 'xp' => 34995],
            ['level' => 44, 'xp' => 37126],
            ['level' => 45, 'xp' => 39335],
            ['level' => 46, 'xp' => 41623],
            ['level' => 47, 'xp' => 43991],
            ['level' => 48, 'xp' => 46440],
            ['level' => 49, 'xp' => 48971],
            ['level' => 50, 'xp' => 51585],
        ];

        DB::table('xp_level')->insert($xpLevels);
    }
}
