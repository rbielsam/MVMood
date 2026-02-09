<?php

class Publicacion {
	public $id;
	public $idUnique;
	public $idUsuario;
	public $contenido;
	public $foto;

	public function __construct($datos = []) {
		$this->id	= $datos['id'];
		$this->idUnique	= $datos['idUnique'];
		$this->idUsuario= $datos['idUsuario'];
		$this->contenido= $datos['contenido'];
		$this->foto	= $datos['foto'];
	}
}
