<?php

use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::get('/users/login', [LoginController::class, 'index']);

    Route::post('/users/login/store', [LoginController::class, 'store']);

    Route::get('/main', [MainController::class, 'index'])->name('admin');
});

// User client
