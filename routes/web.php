<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    // Students Routes
    Route::get('students', [\App\Http\Controllers\students::class, 'index'])->name('students.index');
    Route::get('students/create', [\App\Http\Controllers\students::class, 'create'])->name('students.create');
    Route::post('students', [\App\Http\Controllers\students::class, 'store'])->name('students.store');
    Route::get('students/{StudID}/edit', [\App\Http\Controllers\students::class, 'edit'])->name('students.edit');
    Route::put('students/{StudID}/edit', [\App\Http\Controllers\students::class, 'update'])->name('students.update');
    Route::get('students/{StudID}/delete', [\App\Http\Controllers\students::class, 'destroy'])->name('students.delete');



    Route::get('Workers', [\App\Http\Controllers\workers::class, 'index'])->name('Workers.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
