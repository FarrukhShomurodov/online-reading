<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm']);
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('dashboard.login');

Route::middleware('auth:admin')->group(function () {
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
