<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Redirect trang chủ về trang đăng nhập
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Guest Routes — Chỉ cho phép khi CHƯA đăng nhập
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // Đăng nhập
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Đăng ký
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    // Quên mật khẩu
    Route::get('/forgot-password', [PasswordController::class, 'showForgotForm'])->name('password.forgot');
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLink'])->name('password.sendResetLink');

    // Đặt lại mật khẩu (từ link email)
    Route::get('/reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Auth Routes — Yêu cầu đã đăng nhập
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Đổi mật khẩu
    Route::get('/change-password', [PasswordController::class, 'showChangeForm'])->name('password.change');
    Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('password.change.submit');
});

/*
|--------------------------------------------------------------------------
| Client Routes — ma_quyen = 2
|--------------------------------------------------------------------------
*/
Route::prefix('client')
    ->middleware(['auth', 'role:2'])
    ->name('client.')
    ->group(function () {

        Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');

    });

/*
|--------------------------------------------------------------------------
| Admin Routes — ma_quyen = 1 + IP Restriction
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'role:1', 'ip.restrict'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    });
