<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'index']);
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/new_user',[AdminController::class,'new_user']);

Route::post('/admin/users', [AdminController::class, 'store']);

// routes/web.php

use App\Http\Controllers\OtpController;

// Route::get('/auth/login', [AuthController::class, 'showLoginForm']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/verify-otp', [OtpController::class, 'showVerificationForm']);
Route::post('/auth/verify-otp', [OtpController::class, 'verifyOtp']);

