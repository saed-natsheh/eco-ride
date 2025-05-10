<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});
// admin actions
Route::post('/admin/create-employee', [AdminDashboardController::class, 'createEmployee'])->middleware(['auth', 'admin']);
Route::post('/admin/suspend/{id}', [AdminDashboardController::class, 'Suspend'])->middleware(['auth', 'admin']);


Route::get('/', action: [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::get('/carpool', action: [TripController::class, 'index']);
Route::get('/carpool/details', action: [TripController::class, 'show']);

