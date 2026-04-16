<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editarPerfil()
    {
        $user = Auth::user();
        return view('perfil.editar', ['user' => $user]);
    }

    public function updatePerfil(Request $request){

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $validated = $request->validate([
            'nickname' => 'required|string|max:255',
        ]);
        //$user->nickname = $request->$validated['nickname'];
        $user->update($request->all());
        $user->save();
        return redirect('/home');
    }
}
