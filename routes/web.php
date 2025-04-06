<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Redirect berdasarkan status login
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('register');
});

// Dashboard hanya bisa diakses jika sudah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Halaman produk hanya bisa diakses oleh user yang sudah login
Route::get('/product', [ProductController::class, 'index'])->middleware('auth')->name('product');

