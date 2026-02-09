<?php
require_once "models/loginModel.php";

class loginController {
    public function login(){
        require "views/login.php";
    }
    public function loginProcess(){
        $email = $_POST['email'];
        $password = $_POST['password';]
        $model = new loginModel();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $model->login($email, $password);
        if ($user){
            $_SESSION['id'] = $user['id'];
            $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['rol'] = $user['rol'];

            header("Location: home.php");
            exit;
        }

        $_SESSION['error']="Usuario o contraseña incorrectos";
        require "views/login.php";
    }

    public function logout(){
        session_destroy();
        header("Location: login.php");
    }
}

?>