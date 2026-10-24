<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// ── Routes Publiques ─────────────────────────────────────────────────────────
Route::get('/', HomeController::class)->name('home');

Route::prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('index');
    Route::get('/{specialty:slug}', [PortfolioController::class, 'specialty'])->name('specialty');
    Route::get('/{specialty:slug}/{project:slug}', [PortfolioController::class, 'project'])->name('project');
});

Route::get('/services', ServiceController::class)->name('services');
Route::get('/a-propos', AboutController::class)->name('about');

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'create'])->name('create');
    Route::post('/', [ContactController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('store');
});

// ── Authentification & Profil Breeze ──────────────────────────────────────────
Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
