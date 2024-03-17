<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResultPublicController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ResultController;

Route::get('/', [ResultPublicController::class, 'index'])->name('result.public.index');
Route::post('/', [ResultPublicController::class, 'show'])->name('result.public.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/student', StudentController::class)
        ->name('index', 'student.index')
        ->name('create', 'student.create')
        ->name('store', 'student.store')
        ->name('edit', 'student.edit')
        ->name('update', 'student.update')
        ->name('destroy', 'student.destroy')
        ->except(['show']);

    Route::resource('/course', CourseController::class)
        ->name('index', 'course.index')
        ->name('create', 'course.create')
        ->name('store', 'course.store')
        ->name('edit', 'course.edit')
        ->name('update', 'course.update')
        ->name('destroy', 'course.destroy')
        ->except(['show']);

    Route::resource('/result', ResultController::class)
        ->name('index', 'result.index')
        ->name('create', 'result.create')
        ->name('store', 'result.store')
        ->name('edit', 'result.edit')
        ->name('update', 'result.update')
        ->name('destroy', 'result.destroy')
        ->except(['show']);

    Route::resource('/semester', SemesterController::class)
        ->name('index', 'semester.index')
        ->name('create', 'semester.create')
        ->name('store', 'semester.store')
        ->name('edit', 'semester.edit')
        ->name('update', 'semester.update')
        ->name('destroy', 'semester.destroy')
        ->except(['show']);
});

require __DIR__ . '/auth.php';
