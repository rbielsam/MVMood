<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->middleware(['auth', 'verified']);
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }
    public function register(Request $request){

        $validated = $request->validate([
            'nickname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'nickname' => $validated['nickname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        event(new Registered($user));

        // Log them in
        Auth::login($user);

        // Redirect to home
        return redirect()->route('verification.notice');
    }
}
