<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/', action: [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::get('/carpool', action: [TripController::class, 'index']);
Route::get('/carpool/details', action: [TripController::class, 'show']);

