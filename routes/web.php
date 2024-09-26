<?php

// use App\Http\Controllers\admin\MainController;
// use App\Http\Controllers\Admin\Users\LoginController;
// use Illuminate\Support\Facades\Route;



// Route::prefix('admin')->group(function () {

//     Route::get('/users/login', [LoginController::class, 'index']);

//     Route::post('/users/login/store', [LoginController::class, 'store']);

//     Route::get('/', [MainController::class, 'index'])->name('admin');
// });


use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\ProductController; // Giả định có ProductController cho giao diện khách hàng
use Illuminate\Support\Facades\Route;

// Routes cho Giao diện Khách Hàng
Route::get('/', function () {
    return view('welcome'); // Trang chủ
});

// Routes cho Đăng Nhập và Đăng Ký
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login/store', [LoginController::class, 'store']);
// Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register/store', [LoginController::class, 'register']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.store');
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Routes cho Admin
Route::prefix('admin')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [MainController::class, 'index'])->name('admin.dashboard');
    });
});

// Routes cho hành động cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Hành động cần xác thực (thanh toán, thêm vào giỏ hàng, v.v.)
    // Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    // Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
});

// Route cho Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
