<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;


// Rotta principale
Route::get('/', [MainController::class, 'index'])->name('home');

// Rotte per il back-office
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Rotte per gestire i progetti
        Route::resource('projects', ProjectController::class);
        // Rotte per gestire i tipi
        Route::resource('types', TypeController::class);
    });

// Rotte per l'autenticazione
require __DIR__.'/auth.php';


