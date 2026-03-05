<?php
require_once "models/UsuariosModel.php";
require_once "models/PublicacionesModel.php";
require_once "models/Validacion.php";
require_once "models/ACL.php";

class UsuariosController {



	public function signUp(){
    	require "views/signUp.php";
	}
	public function signUpProcess() {
		$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$secondPassword  = password_hash($_POST['repeatPassword'], PASSWORD_DEFAULT);
		$idUnique = uniqid();
		$datos = [
			'idUnique'		=> $idUnique,
        	'nickname'    	=> $_POST['nickname'],
        	'email'   		=> $_POST['email'],
        	'password'    	=> $password,
        	'repeatPassword' => $secondPassword,
        	'dateOfBirth'  	=> $_POST['dateOfBirth']
    	];


		$errores = Validacion::validarUsuario($datos);
    	if (!empty($errores)){
    		$_SESSION['error']= implode(', ', $errores);
    		header ("Location: index.php?controller=Usuarios&action=signUp");
    		exit;
    	}
		$usuario = new Usuario($datos);
		$modeloUsuario = new UsuariosModel();
		$modeloUsuario->save($usuario);
		header("Location: index.php?controller=Publicaciones&action=index");
    	exit;
	}

	public function crear() {
    	
	}

	public function perfil() {
    	if (!isset($_GET['id'])) {
        	$id = $_SESSION['id'];
    	} else {
        	$id = $_GET['id'];
    	}

    	$modeloUsuario = new UsuariosModel();
    	$usuario = $modeloUsuario->getById($id);

    	$modeloPublicaciones = new PublicacionesModel();
    	$publicaciones = $modeloPublicaciones->getByUsuario($id);
	

    	require "views/usuarios_profile.php";
	}


	public function cambiarPassword_form() {
    	require "views/newPassword.php";
	}

	public function cambiarPassword() {
    	
	}
}
?>
