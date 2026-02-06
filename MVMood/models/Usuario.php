<?php

class Usuario {
	public $idUnique;
	public $email;
	public $nickname;
	public $foto;
	public $password;
	public $rol;

	public function __construct($datos = []) {
		$this->idUnique	= $datos['idUnique'];
		$this->email	= $datos['email'];
		$this->nickname	= $datos['nickname'];
		$this->foto	= $datos['foto'];
		$this->password	= $datos['password'];
		$this->rol	= $datos['rol'];
	}
}
