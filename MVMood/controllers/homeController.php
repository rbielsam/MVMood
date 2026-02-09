<?php
require_once "models/homeModel.php";

class homeController{
    public function index(){
        if isset($_POST['logout']){
            session_destroy();
            header("Location: index.php")
        }
    }
}

?>