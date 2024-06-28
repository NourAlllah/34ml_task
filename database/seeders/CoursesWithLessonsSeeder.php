<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesWithLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $courseTitles = [
            'Laravel Fundamentals',
            'JavaScript for Beginners',
            'Vue.js Essentials',
            'React Development',
            'Python Programming',
            'Machine Learning Crash Course',
            'Git and Version Control',
            'Web Security Fundamentals',
            'Building APIs with Laravel',
            'Deployment Strategies',
        ];

        for ($i = 0; $i < 10; $i++) {
            $courseData = [
                'title' => $courseTitles[$i],
                'image_url' => 'course.jpg', 
                'description' => 'This is a sample description for course No. ' . ($i + 1) .' ('. $courseTitles[$i] .').',
                'no_of_lessons' => rand(5, 10),
            ];

            $course = DB::table('courses')->insertGetId($courseData);

            // Generate random lessons for the current course
            for ($j = 0; $j < $courseData['no_of_lessons']; $j++) {
                $lessonData = [
                    'course_id' => $course,
                    'title' => 'Lesson ' . ($j + 1) . ' - ' . $courseData['title'],
                    'content' => 'This is some sample content for lesson ' . ($j + 1) . ' of course No. ' . ($i + 1), 
                ];

                DB::table('lessons')->insert($lessonData);
            }
        }
    }
}
