<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MuzakkiController;
use Illuminate\Support\Facades\Route;

// Akses ke root langsung ke login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    require __DIR__.'/auth.php';
});
Route::get('/muzakki/{id}/edit', [MuzakkiController::class, 'edit'])->name('muzakki.edit');
Route::put('/muzakki/{id}', [MuzakkiController::class, 'update'])->name('muzakki.update');

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MuzakkiController::class, 'dashboard'])->name('dashboard');
    Route::get('/muzakki', [MuzakkiController::class, 'index'])->name('muzakki.index');
    Route::get('/muzakki/create', [MuzakkiController::class, 'create'])->name('muzakki.create');
    Route::post('/muzakki', [MuzakkiController::class, 'store'])->name('muzakki.store');
    Route::delete('/muzakki/{id}', [MuzakkiController::class, 'destroy'])->name('muzakki.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
