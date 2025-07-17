<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Route auth (login, register, dll)
require __DIR__.'/auth.php';

// Route yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('customers', CustomerController::class);
});

