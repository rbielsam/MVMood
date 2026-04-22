<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'El correo o contraseña son incorrectos',
            ], 401);
        }
        $user = Auth::user();
        if(!$user->hasVerifiedEmail()){
            Auth::logout();
            return response()->json([
                'message' =>'Vefirica tu correo'
            ], 403);
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id'        => $user->id,
                'nickname'  => $user->nickname,
                'email'     => $user->email,
            ],
        ], 200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Sesion cerrada',
        ], 200);
    }
}
