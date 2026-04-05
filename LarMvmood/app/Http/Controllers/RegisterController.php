<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('inicio.register');
    }

    public function processForm(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:255|unique:usuario,nickname',
            'email' => 'required|ends_with:@institutmvm.cat|string|max:255|email|unique:usuario',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'user_id' => Str::uuid() ,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        event(new Registered($user));

        //auth()->login($user);
        /*return redirect()->route('verification.notice')
            ->with('message', '¡Revisa tu correo para verificar tu cuenta!');*/

        return redirect('/mail/verify');
    }

    public function showVerification(){
        return view('mail.verifyEmail');
    }

    public function verifyEmail(EmailVerificationRequest $request){
        $request->fulfill(); // marca el email como verificado
        return redirect('/mvmood'); // o la ruta que quieras

    }

    public function resendVerification(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', '¡Link de verificación enviado!');

    }
}
