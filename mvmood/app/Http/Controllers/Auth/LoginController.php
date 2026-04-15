<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function showLogin(){
        if (Auth::check()) {
            return redirect()->route('publicaciones.home');
        }
        return view('auth.login');
    }

    public function login(Request $request){
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

            return redirect('/home');
        }

        return back()
            ->withErrors([
                'email' => 'El email o la contraseña son incorrectos.',
            ])
            ->onlyInput('email');
    }
    /*public function __invoke(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->onlyInput('email');
    }*/
}
