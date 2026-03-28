<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\PublicacionesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mvmood', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/signup', [RegisterController::class, 'showForm']);
Route::post('/signup', [RegisterController::class, 'processForm']);

Route::get('/publicaciones', [PublicacionesController::class, 'index']);
Route::post('/publicaciones', [PublicacionesController::class, 'index']);
