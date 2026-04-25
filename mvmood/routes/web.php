<?php

use App\Http\Controllers\Api\PublicacionesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::get('/amvmood', [LoginController::class, 'showLogin']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::post('/logout', [LogoutController::class, 'logout']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [PublicacionesController::class, 'index'])->name('publicaciones.home');
    Route::get('/publicacion/crear', [PublicacionesController::class, 'crear']);
    Route::post('/publicacion/guardar', [PublicacionesController::class, 'store']);
    Route::get('/publicacion/editar/{id}', [PublicacionesController::class, 'editar']);
    Route::post('/publicacion/update', [PublicacionesController::class, 'update']);
    Route::get('/publicacion/eliminar/{id}', [PublicacionesController::class, 'eliminar']);
    Route::get('/perfil/editar/{id}', [UserController::class, 'editarPerfil']);
    Route::post('/perfil/update', [UserController::class, 'updatePerfil']);
});


