<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\UserCourse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $lessons = $course->lessons; // Retrieve lessons associated with the course
        return view('course_details', compact('course', 'lessons'));
    }

    public function enroll(Request $request, Course $course)
    {
        $user = Auth::user();

        // Check if the user is already enrolled in the course
        $alreadyEnrolled = UserCourse::where('user_id', $user->id)
                                     ->where('course_id', $course->id)
                                     ->exists();

        if (!$alreadyEnrolled) {
           /*  UserCourse::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'enrolled_at' => now()
            ]); */

            return redirect()->back()->with('status', 'Successfully enrolled');
        } else {
            return redirect()->route('courses.show', $course->id)->with('status', 'You are already enrolled in this course');
        }
    }
}
