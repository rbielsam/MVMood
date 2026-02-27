<?php

class Publicacion {
	public $id;
	public $idUsuario;
	public $contenido;
	public $foto;
	public $fecha;

	public function __construct($datos = []) {
    	$this->id        = $datos['id'] ?? null;
    	$this->idUsuario = $datos['idUsuario'] ?? null;
    	$this->contenido = $datos['contenido'] ?? '';
    	$this->foto      = $datos['foto'] ?? null;
    	$this->fecha     = $datos['fecha'] ?? date('Y-m-d H:i:s');
	}
}

