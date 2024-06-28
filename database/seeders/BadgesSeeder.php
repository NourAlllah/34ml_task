<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            [
                'name' => 'Beginner',
                'required_achievements' => 0,
            ],
            [
                'name' => 'Intermediate',
                'required_achievements' => 4,
            ],
            [
                'name' => 'Advanced',
                'required_achievements' => 8,
            ],
            [
                'name' => 'Master',
                'required_achievements' => 10,
            ],
        ];

        foreach ($badges as $badgeData) {
            DB::table('badges')->insert($badgeData);
        }
    }
}
