<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index() {
        $todasLasPubicaciones = Publicacion::all();

        // Enviem les dades a la vista (com el ModelAndView)
        return view('publicaciones.home', ['publicaciones' => $todasLasPubicaciones]);

    }
}
