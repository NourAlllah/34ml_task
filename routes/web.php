<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
/* Route::Post('/courses/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('lesson.watch');
 */

Route::get('/courses/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
Route::post('/lessons/{lesson}/watch', [LessonController::class, 'watch'])->name('lesson.watch');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
