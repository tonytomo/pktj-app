<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\EnsureIsLoggedIn;

// If the user is logged in, they can access the following routes
Route::middleware(['auth'])->group(function () {
    // Asset routes
    Route::name('asset.create')->get('/asset/create', [AssetController::class, 'create']);
    Route::name('asset.store')->post('/asset/store', [AssetController::class, 'store']);
    Route::name('asset.edit')->get('/asset/{id}/edit', [AssetController::class, 'edit']);
    Route::name('asset.update')->put('/asset/{id}/update', [AssetController::class, 'update']);
    Route::name('asset.destroy')->delete('/asset/{id}/destroy', [AssetController::class, 'destroy']);
});

// If the user is not logged in, they can access the following routes
Route::middleware([EnsureIsLoggedIn::class])->group(function () {
    Route::name('login.form')->get('/login', [LoginController::class, 'show']);
    Route::name('login')->post('/login', [LoginController::class, 'login']);
    Route::name('register.form')->get('/register', [RegisterController::class, 'show']);
    Route::name('register')->post('/register', [RegisterController::class, 'register']);
});

// Unauthenticated users can access these pages
Route::name('home')->get('/', [AssetController::class, 'show']);
Route::name('contact')->get('/contact', function () {
    return view('contact');
});
Route::name('about')->get('/about', function () {
    return view('about');
});
Route::name('asset.detail')->get('/asset/{id}', [AssetController::class, 'detail']);
Route::name('logout')->get('/logout', [LoginController::class, 'logout']);
