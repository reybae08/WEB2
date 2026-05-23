<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/product', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/admin/product/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/admin/product', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/admin/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
Route::put('/admin/product/{id}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/admin/product/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::get('/admin/users', [UserController::class, 'index']);
Route::get('/admin/users/create', [UserController::class, 'create']);
Route::post('/admin/users', [UserController::class, 'store']);
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/admin/users/{id}', [UserController::class, 'update']);
Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'loginUser')->name('login');
    
});