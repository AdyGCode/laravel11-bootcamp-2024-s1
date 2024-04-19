<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
 * Table of the HTTP VERBs, the ENDPOINT URIs, CONTROLLER ACTIONs and the ROUTEs
 * interpreted when using route('ROUTE_NAME') in code.
 *
 * Verb         URI                     Action      Route Name
 * GET          /chirps                 index       chirps.index
 * POST         /chirps                 store       chirps.store
 * GET          /chirps/{chirp}/edit    edit        chirps.edit
 * PUT/PATCH    /chirps/{chirp}         update      chirps.update
 * DELETE       /chirps/{chirp}         destroy     chirps.destroy
 */
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified'],);



Route::middleware(['auth', 'verified',])->group(function () {
    // Trashed (Soft Deleted) users
    Route::get('users/trash', [UserController::class, 'trash'])
        ->name('users.trash');
    // Individual user restore/remove
    Route::get('users/{id}/trash/restore', [UserController::class, 'restore'])
        ->name('users.trash-restore');
    Route::delete('users/{id}/trash/remove', [UserController::class, 'remove'])
        ->name('users.trash-remove');
    // all trashed users restore/remove
    Route::post('users/trash/recover',[UserController::class, 'recoverAll'])
        ->name('users.trash-recover');
    Route::delete('users/trash/empty',[UserController::class, 'empty'])
        ->name('users.trash-empty');

    Route::resource('users', UserController::class);
});


require __DIR__.'/auth.php';
