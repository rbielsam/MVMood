<?php
require_once "models/loginModel.php";

class loginController {
    public function login(){
        require "views/login.php";
    }
    public function loginProcess(){
        $model = new loginModel();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $model->login($email, $password);
        if ($user){
            $_SESSION['id'] = $user['id'];
            $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['id'] = $user['id'];
        }
    }
}

?>