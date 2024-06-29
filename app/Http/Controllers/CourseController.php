<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $lessons = $course->lessons; // Retrieve lessons associated with the course
        return view('course_details', compact('course', 'lessons'));
    }
}
