<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminMenuItemController;

// Public routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/events', [PublicController::class, 'events'])->name('events');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/menu', [PublicController::class, 'menu'])->name('menu');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware(['web', 'auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('events', AdminEventController::class);
        Route::resource('menu-items', AdminMenuItemController::class);
        Route::get('/about/edit', [AdminController::class, 'editAbout'])->name('about.edit');
        Route::put('/about', [AdminController::class, 'updateAbout'])->name('about.update');
    });
});
