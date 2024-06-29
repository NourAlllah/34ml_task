<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class UserController extends Controller
{
    public function index()
    {
        $courses = Course::all(); 
        return view('dashboard', compact('courses'));
    }
}