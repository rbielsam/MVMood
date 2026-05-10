<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {

    $user = User::findOrFail($id);

    if ($user->hasVerifiedEmail()) {
        return redirect(env('FRONTEND_URL') . '/?verified=already');
    }

    $user->markEmailAsVerified();

    return redirect(env('FRONTEND_URL') . '/?verified=1');

})->middleware('signed')->name('verification.verify');
