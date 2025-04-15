<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('users.dashboard');
})->middleware('auth')->name('dashboard');

// Route::get('/product', function () {
//     return view('users.product');
// })->middleware('auth')->name('product');

Route::get('/about', function () {
    return view('users.about');
})->middleware('auth')->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('users.product');

Route::get('/contact', function () {
    return view('users.contact');
})->middleware('auth')->name('contact');

Route::get('/cart', function () {
    return view('users.cart');
})->middleware('auth')->name('cart');

Route::get('/cart', [CartController::class, 'index'])->name('users.cart');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::view('/checkout', 'users.checkout')->name('users.checkout');

Route::get('/product', [ProductController::class, 'index'])->middleware('auth')->name('product');

Route::get('/produk/{id}', [ProductController::class, 'show'])->name('users.detail_produk');





