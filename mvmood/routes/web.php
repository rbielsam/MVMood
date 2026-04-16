<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PublicacionesController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/amvmood', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);

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

Route::get('/home', [PublicacionesController::class, 'index'])->name('publicaciones.home');

Route::get('/publicacion/crear', [PublicacionesController::class, 'crear']);
Route::post('/publicacion/guardar', [PublicacionesController::class, 'store']);

Route::get('/publicacion/editar/{id}', [PublicacionesController::class, 'editar']);
Route::post('/publicacion/update', [PublicacionesController::class, 'update']);
Route::get('/publicacion/eliminar/{id}', [PublicacionesController::class, 'eliminar']);

Route::get('/perfil/editar/{id}', [UserController::class, 'editarPerfil']);
Route::post('/perfil/update', [UserController::class, 'updatePerfil']);
