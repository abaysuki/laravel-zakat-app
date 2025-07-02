<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\ProfileController;

// Akses ke root diarahkan ke halaman login
Route::get('/', fn () => redirect()->route('login'));

// Route untuk auth (login, register, forgot password, dll)
require __DIR__.'/auth.php';

// Route untuk user yang belum login
Route::middleware('guest')->group(function () {
    // Auth routes sudah di-include di atas
});

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [MuzakkiController::class, 'dashboard'])->name('dashboard');

    // CRUD Muzakki
    Route::get('/muzakki', [MuzakkiController::class, 'index'])->name('muzakki.index');
    Route::get('/muzakki/create', [MuzakkiController::class, 'create'])->name('muzakki.create');
    Route::post('/muzakki', [MuzakkiController::class, 'store'])->name('muzakki.store');
    Route::get('/muzakki/{id}/edit', [MuzakkiController::class, 'edit'])->name('muzakki.edit');
    Route::put('/muzakki/{id}', [MuzakkiController::class, 'update'])->name('muzakki.update');
    Route::delete('/muzakki/{id}', [MuzakkiController::class, 'destroy'])->name('muzakki.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
