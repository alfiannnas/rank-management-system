<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankManagementController;
use App\Http\Controllers\ParticipantManagementController;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Rank Management
    Route::resource('rank-management', RankManagementController::class);
    Route::resource('participant-management', ParticipantManagementController::class);
    Route::resource('user-management', UserManagementController::class);
});

require __DIR__.'/auth.php';
