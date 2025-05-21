<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // tes autres routes...
});

// ✅ Ajout de la page d’accueil
Route::get('/', function () {
    return view('welcome'); // ou redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class);

    Route::resource('skills', SkillController::class);
    Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');
});

Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';
