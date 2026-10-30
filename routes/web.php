<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AcademicEventController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $upcomingEvents = auth()->user()
        ->academicEvents()
        ->where('start_at', '>=', now('Asia/Jakarta'))
        ->orderBy('start_at', 'asc')
        ->take(5)
        ->get();

    return view('dashboard', compact('upcomingEvents'));

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('notes', NoteController::class)
        ->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)
        ->except(['show']);
});

Route::resource('academic-events', AcademicEventController::class)
    ->except(['show'])
    ->names('academic-events');

require __DIR__.'/auth.php';
