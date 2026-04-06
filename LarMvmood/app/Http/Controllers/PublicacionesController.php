<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    public function index() {
        //$todasLasPubicaciones = Publicacion::all()
        //    ->orderBy('created_at', 'desc')
        //    ->get();
//, ['publicaciones' => $todasLasPubicaciones]

        //$comentarios = Comentario:all()
        return view('publicaciones.home');
    }

    public function crear()
    {
        return view('crear');
    }

    public function guardar(Request $request)
    {
        $request->validate(
            [
                'content' => ['required', 'max:500'],
            ],
            [
                'content.required' => 'El contenido es obligatorio.',
                'content.max'      => 'El contenido no puede superar los 500 caracteres.',
            ]
        );

        Publicacion::create([
            'idUnique'  => uniqid('p', true),
            'idUsuario' => Auth::user()->idUnique,
            'contenido' => $request->input('content'),
            'foto'      => null,
        ]);

        return redirect()->route('home');

    }

    public function eliminar($id)
    {
        $publicacion = Publicacion::findOrFail($id);

        $usuarioActual = Auth::user();
        $esDueno = $publicacion->idUsuario === $usuarioActual->idUnique;
        $esAdmin = $usuarioActual->rol === 'admin';

        if (!$esDueno && !$esAdmin) {
            return redirect()->route('home')
                ->with('error', 'No puedes eliminar publicaciones de otros usuarios');
        }

        $publicacion->delete();

        return redirect()->route('home')
            ->with('mensaje', 'Publicación eliminada correctamente');
    }
    public function editar($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('editar', compact('publicacion'));
    }

    public function notificaciones()
    {
        return view('notificaciones');
    }

    public function mensajes()
    {
        return view('mensajes');
    }
}
