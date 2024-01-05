<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GameController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [GameController::class, 'index'])->name('dashboard');
    Route::post('/buy-upgrade/{upgradeId}', [GameController::class, 'buyUpgrade'])->name('buy-upgrade');
});
