<?php
require_once "models/AuthModel.php";

class AuthController {

	public function login() {
    	require "views/login.php";
	}

	public function loginProcess() {
    	$model = new AuthModel();
    	$email = $_POST['email'];
    	$password = $_POST['password'];

    	$user = $model->login($email, $password);

    	if ($user) {
        	$_SESSION['id']       = $user['idUnique'];
        	$_SESSION['nickname'] = $user['nickname'];
        	$_SESSION['email']    = $user['email'];
        	$_SESSION['rol']      = $user['rol'];
        	$_SESSION['foto']     = $user['foto'];

        	header("Location: index.php");
        	exit;
    	}

    	$_SESSION['error'] = "Email o contraseña incorrectos";
    	header("Location: index.php?controller=Auth&action=login");
    	exit;
	}

	public function logout() {
    	session_destroy();
    	header("Location: index.php?controller=Auth&action=login");
    	exit;
	}
}

?>
