<?php

namespace App\Http\Controllers;
use App\Models\Lesson;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function submit(Request $request , Lesson $lesson){

        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::user()->id, 
            'lesson_id' => $request->lesson, 
            'content' => $request->comment,
        ]);

        return back()->with('status', true)->with('message', 'Comment submitted successfully!');
    }
}
