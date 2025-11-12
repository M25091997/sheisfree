<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user-register', [AuthController::class, 'user_register'])->name('user.register');
Route::post('user-register', [AuthController::class, 'user_store'])->name('user.store');
Route::get('/escort-register', [AuthController::class, 'advertiser_register'])->name('advertiser.register');
Route::post('/escort-register', [AuthController::class, 'advertiser_store'])->name('advertiser.store');


// Admin routes
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/profile', function () {
    return view('auth.profile');
})->middleware(['auth'])->name('profile');
Route::get('/profile', function () {
    return view('auth.profile');
})->middleware(['auth'])->name('profiles.index');

Route::get('/listing/new-service', function () {
    return view('auth.new-service');
})->middleware(['auth'])->name('auth.newservice');

Route::post('/listing/new-service', [UserProfileController::class, 'store'])->middleware(['auth'])->name('userprofile.store');
