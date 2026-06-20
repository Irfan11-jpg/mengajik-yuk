<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard Utama (Otomatis membagi tampilan lewat DashboardController)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group Halaman khusus GURU
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/fitur-contoh', function () {
        return view('dashboard.guru'); // Nanti bisa dikembangkan untuk fitur Mhs 1 lainnya
    })->name('guru.fitur');
});

// Group Halaman khusus SANTRI (Untuk Mhs 2 dan Mhs 3 nanti)
Route::middleware(['auth', 'role:santri'])->group(function () {
    Route::get('/santri/fitur-contoh', function () {
        return view('dashboard.santri');
    })->name('santri.fitur');
});

// Route bawaan Breeze untuk profile kelola akun
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';