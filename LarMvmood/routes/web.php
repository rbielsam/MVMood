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

Route::get('/email/verify', function () {
    return view('mail.verifyEmail');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // marca el email como verificado
    return redirect('/mvmood'); // o la ruta que quieras
})->middleware(['auth', 'signed'])->name('verification.verify');

// Reenviar correo de verificación
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', '¡Link de verificación enviado!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
