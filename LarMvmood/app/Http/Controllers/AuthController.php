<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('publicaciones.home');
        }

        return view('inicio.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                    'ends_with:@institutmvm.cat',
                ],
                'password' => ['required', 'min:6'],
            ]
        );

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect('/publicaciones');
        }

        return back()
            ->withErrors([
                'email' => 'El email o la contraseña son incorrectos.',
            ])
            ->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
