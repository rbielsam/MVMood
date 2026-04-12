<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    public function index(){
        $publicaciones = Publicacion::orderBy('created_at', 'desc')->get();
        return view('publicaciones.home', ['publicaciones' => $publicaciones]);
    }

    public function crear(){
        return view('publicaciones.crear');
    }
    public function store(Request $request){
        $request->validate([
            'content' => ['required', 'max:500'],
        ], [
            'content.required' => 'Es necesario ingresar un contenido',
                'content.max' => 'El contenido no debe superar 500 caracteres',
            ]
        );

        Publicacion::create([
            'user_id'   => Auth::id(),
            'contenido' => $request->input('content'),
            'imagen'     => null,
        ]);

        return redirect()->route('publicaciones.home');
    }

    public function eliminar($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        // falta implementar ACL
        $publicacion->delete();
        return redirect()->route('publicaciones.home');

    }

    public function editar($id){
        $publicacion = Publicacion::findOrFail($id);
        return view('publicaciones.editar', ['publicacion' => $publicacion]);
    }

}
