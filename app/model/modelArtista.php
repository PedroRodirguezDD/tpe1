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
//cambiando
    function add($nombre,$imagen=null){
        $pathImg=null;
        if($imagen){
            $pathImg=$this->cargarImagen($imagen);
        }
        $query=$this->db->prepare("INSERT INTO artista (nombre,imagen) VALUES (?,?)");
        $query->execute([$nombre,$pathImg]);
    }

    function delete($id){
        $query=$this->db->prepare("DELETE FROM artista WHERE id=?");
        $query->execute([$id]);
    }
//cambiando
    function editar($nombre,$id,$imagen=null){
        $pathImg=null;
        if($imagen){
            $pathImg=$this->cargarImagen($imagen);
        }
        $query=$this->db->prepare("UPDATE artista SET nombre=?, imagen=? WHERE id=?");
        $query->execute([$nombre,$pathImg,$id]);
    }
//cambiando
    function cargarImagen($imagen){
        $target = 'img/artista/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }

    
}