<?php

namespace App\Http\Controllers;
use App\Models\Lesson;
use App\Models\UserLesson;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        return view('lesson_details', compact('lesson'));
    }

    public function watch(Request $request, Lesson $lesson)
    {

        $user = Auth::user();

        //check if user enrolled this course before watching the lesson


        /* return redirect()->route('lessons.show', $lesson)->with('status', false)->with('message', 'You have already watched this lesson'); */

        // Check if the user has already watched this lesson
        $alreadyWatched = UserLesson::where('user_id', $user->id)
                                    ->where('lesson_id', $lesson->id)
                                    ->exists();

        /* if (!$alreadyWatched) {
            UserLesson::create([
                'user_id' => $user->id,
                'lesson_id' => $lesson->id,
                'watched_at' => now(), 
            ]);
        } */

        return redirect()->route('lessons.show', $lesson)->with('status', true)->with('message', 'Lesson marked as watched');

    }
}
