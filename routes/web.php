<?php

use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tampilanUtama;
use Illuminate\Support\Facades\Route;


Route::get('/', [KursusController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('kursuses', KursusController::class);
Route::resource('materis', MateriController::class);

Route::get('kursuses/{kursus_id}/materis/create', [MateriController::class, 'create'])
     ->name('materis.create');

// Route to store a new Materi for a specific Kursus
Route::post('kursuses/{kursus_id}/materis', [MateriController::class, 'store'])
     ->name('materis.store');

     Route::get('materis/{id}/edit', [MateriController::class, 'edit'])->name('materis.edit');

// Route untuk memperbarui materi
Route::put('materis/{id}', [MateriController::class, 'update'])->name('materis.update');

Route::delete('materis/{id}', [MateriController::class, 'destroy'])->name('materis.destroy');

Route::get('TampilanUtama', function () {
    return view('WelcomePage.TampilanUtama');
})->name('TampilanUtama');

Route::resource('TampilanUtama', tampilanUtama::class);

require __DIR__.'/auth.php';
