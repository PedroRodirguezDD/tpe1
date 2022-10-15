<?php

class ModelUser{

    private $db;

    function __construct(){
        $this->db=$this->connect();
    }

    function connect(){
        $db=new PDO("mysql:host=localhost;"."dbname=tpe;charset=utf8","root","");
        return $db;
    }

    function traerMail($email){
        $query=$this->db->prepare("SELECT * FROM user WHERE email=?");
        $query->execute([$email]);
        $user=$query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    
}