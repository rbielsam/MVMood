<?php


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect(env('FRONT_URL', 'http://localhost:5173').'/login?verified=1');
})->middleware(['auth', 'signed'])->name('verification.verify');
