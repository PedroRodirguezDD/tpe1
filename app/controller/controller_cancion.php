<?php

include "app/model/modelCancion.php";
include "app/view/view_cancion.php";
include "app/model/modelArtista.php";

class ControllerCancion{
    private $modelCancion;
    private $view;
    private $modelArtista;

    function __construct(){
        $this->modelCancion=new ModelCancion();
        $this->view=new ViewCancion();
        $this->modelArtista=new ModelArtista();
    }

    function showHome(){
        $canciones=$this->modelCancion->getCanciones();
        //aca vo a traer el los artistas con el modelo de artistas y luego con la vista se los voy a pasar al form.tpl

        $artistas=$this->modelArtista->getArtistas();
        $this->view->selectArtistas($artistas);

        $this->view->showHome($canciones,$artistas);

        //agrego form para agregar artistas
    }

    function showCancion($id){
        $cancion=$this->modelCancion->getCancion($id);
        $this->view->showCancion($cancion);
    }

    //ABM DE CANCIONES

    function addCancion(){
        $nombre=$_GET['nombre'];
        $anio=$_GET['anio'];
        $genero=$_GET['genero'];
        $artista=$_GET['id_artista'];

        $this->modelCancion->add($nombre, $anio, $genero,$artista);

        header("Location:".BASE_URL);
    }

    function deleteCancion($id){
        $this->modelCancion->delete($id);
        header("Location:".BASE_URL);
    }
    //
    function formEditar_cancion($id){
        $cancion=$this->modelCancion->getCancion($id);
        $artistas=$this->modelArtista->getArtistas();
        
        $this->view->formEditar_cancion($cancion,$artistas);
    }

    function editarCancion(){

        //disabled del formulario no me deja tomar el valor del id
        $id=$_GET['id'];
        $nombre=$_GET['nombre'];
        $anio=$_GET['anio'];
        $genero=$_GET['genero'];
        $artista=$_GET['id_artista'];
        
        $this->modelCancion->editar($id,$nombre,$anio,$genero,$artista);
        header("Location:".BASE_URL);
    }

}