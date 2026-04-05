<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\PublicacionesController;
use \App\Http\Controllers\EmailsController;
use \Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/signup', [RegisterController::class, 'showForm']);
Route::post('/signup', [RegisterController::class, 'processForm']);

Route::get('/publicaciones', [PublicacionesController::class, 'index']);
Route::post('/publicaciones', [PublicacionesController::class, 'index']);

Route::get('/sendMail', [EmailsController::class, 'WelcomeEmail']);

Route::get('/email/verify', [RegisterController::class, 'showVerification'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [RegisterController::class, 'resendVerification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
