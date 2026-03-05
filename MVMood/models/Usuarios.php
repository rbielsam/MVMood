<?php

class Usuario {
	public $id;
	public $idUnique;
	public $email;
	public $nickname;
	public $foto;
	public $password;
	public $rol;

	public function __construct($datos = []) {
    	$this->id       = $datos['id'] ?? null;
		$this->idUnique = $datos['idUnique'] ?? '';
    	$this->email    = $datos['email'] ?? '';
    	$this->nickname = $datos['nickname'] ?? '';
    	$this->foto     = $datos['foto'] ?? 'user.png';
    	$this->password = $datos['password'] ?? '';
    	$this->rol      = $datos['rol'] ?? 'user';
	}
}
