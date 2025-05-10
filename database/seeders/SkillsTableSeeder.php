<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['id' => 1, 'name' => 'Thruster', 'type' => 'Weightlifting'],
            ['id' => 2, 'name' => 'Push Press', 'type' => 'Weightlifting'],
            ['id' => 3, 'name' => 'Snatch', 'type' => 'Weightlifting'],
            ['id' => 4, 'name' => 'Clean & Jerk', 'type' => 'Weightlifting'],
            ['id' => 5, 'name' => 'Clean', 'type' => 'Weightlifting'],
            ['id' => 6, 'name' => 'Deadlift', 'type' => 'Weightlifting'],
            ['id' => 7, 'name' => 'Front Squat', 'type' => 'Weightlifting'],
            ['id' => 8, 'name' => 'Back Squat', 'type' => 'Weightlifting'],
            ['id' => 9, 'name' => 'Overhead Squat', 'type' => 'Weightlifting'],
            ['id' => 10, 'name' => 'Pull up', 'type' => 'Gym'],
            ['id' => 11, 'name' => 'Push up', 'type' => 'Gym'],
            ['id' => 12, 'name' => 'T2B', 'type' => 'Gym'],
            ['id' => 13, 'name' => 'HSPU', 'type' => 'Gym'],
            ['id' => 14, 'name' => 'Bar MU', 'type' => 'Gym'],
            ['id' => 15, 'name' => 'Ring MU', 'type' => 'Gym'],
            ['id' => 16, 'name' => 'C2B', 'type' => 'Gym'],
            ['id' => 17, 'name' => 'Pistol Squat', 'type' => 'Gym'],
            ['id' => 18, 'name' => 'Handstand Walk', 'type' => 'Gym'],
            ['id' => 19, 'name' => '5km Run', 'type' => 'Cardio'],
            ['id' => 20, 'name' => 'Row', 'type' => 'Cardio'],
            ['id' => 21, 'name' => 'Bikerg', 'type' => 'Cardio'],
            ['id' => 22, 'name' => 'Skierg', 'type' => 'Cardio'],
            ['id' => 23, 'name' => 'DU', 'type' => 'Cardio'],
            ['id' => 24, 'name' => 'Burpees', 'type' => 'Cardio'],
            ['id' => 25, 'name' => 'Box jumps over', 'type' => 'Cardio'],
        ];

        DB::table('skills')->insert($skills);
    }
}
