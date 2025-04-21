<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');


/*
|--------------------------------------------------------------------------
| Public Routes (Tanpa login)
|--------------------------------------------------------------------------
*/
Route::view('/', 'home')->name('home');
Route::view('/about', 'users.about')->name('about');
Route::view('/contact', 'users.contact')->name('contact');

Route::get('/product', [ProductController::class, 'index'])->name('users.product');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('users.detail_produk');

/*
|--------------------------------------------------------------------------
| Protected Routes (Hanya bisa diakses setelah login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'users.dashboard')->name('dashboard');

    // Cart & Checkout
    Route::get('/cart', [CartController::class, 'index'])->name('users.cart');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::view('/checkout', 'users.checkout')->name('users.checkout');

    // Add other pages that should only be accessed when logged in:
    // Route::view('/profile', 'users.profile')->name('users.profile');
    // Route::view('/orders', 'users.orders')->name('users.orders');

    // routes/web.php
    Route::prefix('admin')->group(function () {
        Route::get('/my-store', function () {
            return view('admin.my_store');
        })->name('admin.my_store');

        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.index');
    });

    // routes/web.php


    Route::get('/add_produk', function () {
        return view('admin.add_produk'); // pastikan file produk/add.blade.php ada
    })->name('add_produk');

    Route::get('/my-store', function () {
        return view('admin.my_store'); // pastikan ada view my_store.blade.php
    })->name('my_store');

    // routes/web.php

    // Custom route untuk halaman toko admin (view khusus)
    Route::get('/admin/my-store', [ProductController::class, 'myStore'])->name('admin.my_store');

    // Resource route otomatis lengkap
    Route::resource('products', ProductController::class);

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
});
