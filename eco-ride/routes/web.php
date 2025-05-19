<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;

//driver
Route::get('/register-onboarding', [UserController::class, 'registerWithOnboarding']);
Route::post('/register-onboarding', [UserController::class, 'storeWithOnboarding']);

Route::prefix('driver')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('driver.logout')->middleware('auth');

    Route::get('/login', [AuthController::class, 'showDriverLogin'])->name('driver.login');
    Route::post('/login', [AuthController::class, 'driverLogin']);
    Route::middleware(['auth', 'driver'])->group(function () {
        Route::get('/dashboard', [TripController::class, 'dashboard'])->name('driver.dashboard');
        Route::get('/trips/create', [TripController::class, 'create']);
        Route::post('/trips', [TripController::class, 'store']);
    });
});

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

