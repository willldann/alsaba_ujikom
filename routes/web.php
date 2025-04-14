<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController; // ← Tambahkan ini
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('users.dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/product', [ProductController::class, 'index'])->middleware('auth')->name('product');

// ➕ Route ke halaman about
Route::get('/about', [AboutController::class, 'index'])->name('about');
