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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


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
    Route::get('/cart/add/{id}', [CartController::class, 'addT oCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::view('/checkout', 'users.checkout')->name('users.checkout');

    // Add other pages that should only be accessed when logged in:
    // Route::view('/profile', 'users.profile')->name('users.profile');
    // Route::view('/orders', 'users.orders')->name('users.orders');

    // routes/web.php

    

});



Route::view('/admin/dashboard', 'admin.index')->name('admin.index');