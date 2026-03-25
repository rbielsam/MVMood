<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function showForm()
    {
        return view('inicio.register');
    }

    public function processForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|ends_with:@institutmvm.cat|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return view('inicio.login')
            ->with('status',
                'Registration successful, you can now log in');
    }
}
