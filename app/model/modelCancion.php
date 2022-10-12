<?php

class ModelCancion{
    private $db;

    function __construct(){
        $this->db=$this->connect();
    }

    function connect(){
        $db=new PDO("mysql:host=localhost;"."dbname=tpe;charset=utf8","root","");
        return $db;
    }

    function getCanciones(){
        $query=$this->db->prepare("SELECT * FROM cancion");
        $query->execute();
        $canciones=$query->fetchAll(PDO::FETCH_OBJ);
        return $canciones;
    }

    function getCancion($id){
        $query=$this->db->prepare("SELECT * FROM cancion WHERE id=?");
        $query->execute([$id]);
        $cancion=$query->fetch(PDO::FETCH_OBJ);
        return $cancion;
    }

    function getItems($id){
        $query=$this->db->prepare("SELECT * FROM cancion WHERE artista_id_fk=?");
        $query->execute([$id]);
        $items=$query->fetchAll(PDO::FETCH_OBJ);
        return $items;    
    }

    function add($nombre, $anio, $genero,$artista){
        $query=$this->db->prepare("INSERT INTO cancion (nombre,anio,genero,artista_id_fk) VALUES (?,?,?,?)");
        $query->execute([$nombre,$anio,$genero,$artista]);
    }

    function delete($id){
        $query=$this->db->prepare("DELETE FROM cancion WHERE id=?");
        $query->execute([$id]);
    }

    function editar($id,$nombre,$anio,$genero,$artista){
        $query=$this->db->prepare("UPDATE cancion SET nombre=?, anio=?, genero=?, artista_id_fk=? WHERE id=?");
        $query->execute([$nombre,$anio,$genero,$artista,$id]);
    }

}