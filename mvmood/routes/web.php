<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {

    $user = User::findOrFail($id);

    if ($user->hasVerifiedEmail()) {
        return redirect(env('FRONTEND_URL') . '/email-verified?status=already');
    }

    $user->markEmailAsVerified();

    return redirect(env('FRONTEND_URL') . '/email-verified?status=success');

})->middleware('signed')->name('verification.verify');
