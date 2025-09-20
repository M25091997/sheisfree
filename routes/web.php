<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user-register', [AuthController::class, 'register'])->name('user.register');
Route::get('/register', [AuthController::class, 'register'])->name('user.store');
Route::get('/escort-register', [AuthController::class, 'advertiser_register'])->name('advertiser.register');
Route::post('/escort-register', [AuthController::class, 'advertiser_store'])->name('advertiser.store');


// Admin routes
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
