<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

// Public homepage → show products (instead of login)
Route::get('/', [ProductController::class, 'index'])->name('home');

// Publicly accessible products (list + details)
Route::resource('product', ProductController::class);
route::resource('form', FormController::class);
// Protected routes (need login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Only admins/staff can manage products
    Route::resource('product', ProductController::class);
});

require __DIR__.'/auth.php';
