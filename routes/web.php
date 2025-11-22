<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ================================
// USER (hanya bisa melihat data)
// ================================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
        ->name('mahasiswa.index');
});


// ================================
// ADMIN (CRUD mahasiswa lengkap)
// ================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class)
            ->except(['index']);  // index sudah dipakai user
    });


// ================================
// PROFILE
// ================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
