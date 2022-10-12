<?php

include "app/model/modelCancion.php";
include "app/view/view.php";
include "app/model/modelArtista.php";

class Controller{
    private $modelCancion;
    private $view;
    //verificar si esto esta bien 
    private $modelArtista;

    function __construct(){
        $this->modelCancion=new ModelCancion();
        $this->view=new View();
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

    /*
    function showArtistas(){
        $artistas=$this->modelArtista->getArtistas();
        $this->view->showArtistas($artistas);
    }*/

    function showItems($id){
        $items=$this->modelCancion->getItems($id);
        $artista=$this->modelArtista->getArtista($id);
        $this->view->showItems($items, $artista);
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
        //revisar
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


    //ABM DE ARTISTAS

    function addArtista(){
        $nombre=$_GET['nombre'];

        $this->modelArtista->add($nombre);
        
        header("Location:".BASE_URL);
    } 

    function deleteArtista($id){
        //busco una cancion que tenga el id de este artista en su artista_id_fk
        $cancion=$this->modelCancion->getItems($id);

        //si esta vacia es porq no hay ninguna, eso nos permite eliminar un artista ya que no se esta usando
        if(empty($cancion)){
            $this->modelArtista->delete($id);
            header("Location:".BASE_URL);
        }
        //si tuviese una cancion conectada al artista ya no se podria eliminar 
        else{
            $this->view->error("No puedes eliminar este artista ya que esta en uso");
        }

    }

    function formEditar_artista($id){
        $artista=$this->modelArtista->getArtista($id);
        $this->view->formEditar_artista($artista);
    }

    function editarArtista(){
        $id=$_GET['id'];
        $nombre=$_GET['nombre'];

        $cancion=$this->modelCancion->getItems($id);

        //si ninguna cancion tiene ese id de clave foranea modifico
        //si coincide es porq el artista que quiero modificar ya tiene relacion con canciones que se encuentran en la otra tabla
        //en ese caso no modifico para no afectar los valores de la tabla cancion
        if(empty($cancion)){
            $this->modelArtista->editar($nombre,$id);
            header("Location:".BASE_URL);
        }
        else{
            $this->view->error("No puedes modificar este artista ya que esta en uso");
        }
    }
}