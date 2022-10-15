<?php

include "app/view/view_user.php";
include "app/model/model_user.php";

class ControllerUser{

    private $model;
    private $vista;

    function __construct(){
        $this->model=new ModelUser();
        $this->vista=new ViewUser();
    }

    function login(){
        $this->vista->formLogin();
    }

    function verificacion(){
        
        $email=$_POST['email'];
        $password=$_POST['password'];

        $user=$this->model->traerMail($email);

        if($user && password_verify($password, $user->password)){
            session_start();
            $_SESSION['user'] = $user->email;
            $_SESSION['logueado']=true;
            header("Location: ".BASE_URL);
        }
        else{
            $this->vista->formLogin("La contraseña o el mail del usuario son incorrectos, verifique los datos");
        }
    }

    function logout(){
        session_start();
        session_destroy();
        header("Location: ".BASE_URL);
    }
}

