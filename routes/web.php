<?php

use App\Http\Controllers\ChirpController;
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

/**
 * Verb         URI                     Action      Route Name
 * GET          /chirps                 index       chirps.index
 * POST         /chirps                 store       chirps.store
 * GET          /chirps/{chirp}/edit    edit        chirps.edit
 * PUT/PATCH    /chirps/{chirp}         update      chirps.update
 */
Route::resource('chirps', ChirpController::class)
    ->only(['index','store','edit','update'])
    ->middleware(['auth','verified']);

require __DIR__.'/auth.php';
