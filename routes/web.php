<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\EnsureIsLoggedIn;
use App\Http\Middleware\EnsureRoleIsAdmin;

Route::middleware(['auth', EnsureRoleIsAdmin::class])->group(function () {
    // User routes
    Route::name('users.list')->get('/users', [UserController::class, 'show']);
    Route::name('users.create')->get('/users/create', [UserController::class, 'create']);
    Route::name('users.store')->post('/users/store', [UserController::class, 'store']);
    Route::name('users.detail')->get('/users/{id}', [UserController::class, 'detail']);
    Route::name('users.edit.role')->get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::name('users.update.role')->put('/users/{id}/update', [UserController::class, 'update']);

    // Product routes
    Route::name('product.create')->get('/product/create', [ProductController::class, 'create']);
    Route::name('product.store')->post('/product/store', [ProductController::class, 'store']);
    Route::name('product.edit')->get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::name('product.update')->put('/product/{id}/update', [ProductController::class, 'update']);
    Route::name('product.destroy')->delete('/product/{id}/destroy', [ProductController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    // User routes
    Route::view('/app', 'app')->name('app');

    // Product routes
    Route::name('product.list')->get('/product', [ProductController::class, 'show']);
    Route::name('product.detail')->get('/product/{id}', [ProductController::class, 'detail']);
});

Route::middleware([EnsureIsLoggedIn::class])->group(function () {
    // Authentication routes
    Route::name('login.form')->get('/login', [LoginController::class, 'show']);
    Route::name('login')->post('/login', [LoginController::class, 'login']);
    Route::name('register.form')->get('/register', [RegisterController::class, 'show']);
    Route::name('register')->post('/register', [RegisterController::class, 'register']);
});

// Public routes
Route::view('/', 'welcome')->name('home');
Route::name('logout')->get('/logout', [LoginController::class, 'logout']);
