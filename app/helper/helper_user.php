<?php

class HelperUser{

    function verificarLogin(){
        session_start();
        if(!isset($_SESSION['logueado'])){
            header("Location: ".BASE_URL."login");
            die();
        }
    }

}