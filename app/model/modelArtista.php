<?php

class ModelArtista{
    private $db;

    function __construct(){
        $this->db=$this->connect();
    }

    function connect(){
        $db=new PDO("mysql:host=localhost;"."dbname=tpe;charset=utf8","root","");
        return $db;
    }

    function getArtistas(){
        $query=$this->db->prepare("SELECT * FROM artista");
        $query->execute();
        $artistas=$query->fetchAll(PDO::FETCH_OBJ);
        return $artistas;
    }

    function getArtista($id){
        $query=$this->db->prepare("SELECT * FROM artista WHERE id=?");
        $query->execute([$id]);
        $artista=$query->fetch(PDO::FETCH_OBJ);
        return $artista;
    }

    function add($nombre){
        $query=$this->db->prepare("INSERT INTO artista (nombre) VALUES (?)");
        $query->execute([$nombre]);
    }

    function delete($id){
        $query=$this->db->prepare("DELETE FROM artista WHERE id=?");
        $query->execute([$id]);
    }

    function editar($nombre,$id){
        $query=$this->db->prepare("UPDATE artista SET nombre=? WHERE id=?");
        $query->execute([$nombre,$id]);
    }

    
}