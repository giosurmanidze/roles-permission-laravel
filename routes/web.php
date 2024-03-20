<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function() {
        return 'Admin Panel';
    })->name('admin.panel');
});

// Moderator routes
Route::middleware(['auth', 'role:moderator'])->group(function () {
    Route::get('/moderator', function() {
        return 'Moderator Panel';
    })->name('moderator.panel');
});

require __DIR__.'/auth.php';
