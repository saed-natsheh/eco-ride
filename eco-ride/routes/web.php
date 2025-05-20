<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\TripViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarpoolController;

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


//user
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/carpools', [CarpoolController::class, 'index'])->name('carpools.index');
Route::get('/trip/{id}', [TripViewController::class, 'show'])->name('trip.show');
Route::post('/trip/{id}/join', [TripViewController::class, 'join'])->middleware('auth')->name('trip.join');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/', action: [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm']);

Route::get('/carpool', action: [TripController::class, 'index']);
Route::get('/carpool/details', action: [TripController::class, 'show']);

