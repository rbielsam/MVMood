<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index() {
        //$todosLosComentarios = Comentario::all()
        //    ->orderBy('created_at', 'desc')
        //    ->get();
//, ['comentarios' => $todosLosComentarios]
        // Enviem les dades a la vista (com el ModelAndView)
        //return view('publicaciones.home');
    }

    public function agregar()
    {

    }
}
