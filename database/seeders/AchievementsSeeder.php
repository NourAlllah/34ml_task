<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessonMilestones = [
            [
                'name' => 'First Lesson Watched',
                'description' => 'Congratulations on taking your first step!',
                'type' => 'lesson',
                'threshold' => 1,
            ],
            [
                'name' => 'Lessons Watched Enthusiast',
                'description' => 'You\'re on a roll! Keep learning!',
                'type' => 'lesson',
                'threshold' => 5,
            ],
            [
                'name' => 'Lessons Watched Master',
                'description' => 'Impressive progress! Keep expanding your knowledge.',
                'type' => 'lesson',
                'threshold' => 10,
            ],
            [
                'name' => 'Lessons Watched Guru',
                'description' => 'A true knowledge seeker! Keep exploring new topics.',
                'type' => 'lesson',
                'threshold' => 25,
            ],
            [
                'name' => 'Lessons Watched Scholar',
                'description' => 'Adept learner! You\'re on a journey of continuous learning.',
                'type' => 'lesson',
                'threshold' => 50,
            ],
        ];

        $commentMilestones = [
            [
                'name' => 'First Comment Written',
                'description' => 'Your voice matters! Share your thoughts.',
                'type' => 'comment',
                'threshold' => 1,
            ],
            [
                'name' => 'Active Commenter',
                'description' => 'Keep the conversation going! Share your insights.',
                'type' => 'comment',
                'threshold' => 3,
            ],
            [
                'name' => 'Engaged Commentator',
                'description' => 'Valuable contributor! Your comments are appreciated.',
                'type' => 'comment',
                'threshold' => 5,
            ],
            [
                'name' => 'Prolific Commentator',
                'description' => 'A thoughtful voice in the community! Keep sharing your ideas.',
                'type' => 'comment',
                'threshold' => 10,
            ],
            [
                'name' => 'Commentator Extraordinaire',
                'description' => 'You\'re fostering a vibrant community! Thank you for your contributions.',
                'type' => 'comment',
                'threshold' => 20,
            ],
        ];

        // Lesson Achievements
        foreach ($lessonMilestones as $milestone) {
            DB::table('achievements')->insert($milestone);
        }

        // Comment Achievements
        foreach ($commentMilestones as $milestone) {
            DB::table('achievements')->insert($milestone);
        }
    }
}
