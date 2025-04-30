<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// use Illuminate\Support\Facades\Route;
Route::middleware(['auth', 'role:recruiter'])->get('/test-recruiter', function () {
    return '✅ You are a recruiter';
});

Route::middleware(['auth', 'role:seeker'])->get('/test-seeker', function () {
    return '✅ You are a seeker';
});





require __DIR__.'/auth.php';
