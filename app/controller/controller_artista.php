<?php

include "app/view/view_artista.php";

class ControllerArtista{
    private $modelCan;
    private $view; 
    private $modelArt;
    private $helper;

    function __construct(){
        $this->modelCan=new ModelCancion();
        $this->view=new ViewArtista();
        $this->modelArt=new ModelArtista();
        $this->helper=new HelperUser();
    }

    function showArtistas(){

        session_start();

        $artistas=$this->modelArt->getArtistas();
        $this->view->showArtistas($artistas);
    }

    function showItems($id){
        $items=$this->modelCan->getItems($id);
        $artista=$this->modelArt->getArtista($id);
        $this->view->showItems($items, $artista);
    }
//cambiando
    function addArtista(){
        $nombre=$_POST['nombre'];
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
        || $_FILES['imagen']['type'] == "image/png" ) {
            $this->modelArt->add($nombre,$_FILES['imagen']['tmp_name']);
        }
        else{
            $this->modelArt->add($nombre);
        }
        
        header("Location:".BASE_URL."artistas");
    } 

    function deleteArtista($id){
        //busco una cancion que tenga el id de este artista en su artista_id_fk
        $cancion=$this->modelCan->getItems($id);

        //si esta vacia es porq no hay ninguna, eso nos permite eliminar un artista ya que no se esta usando
        if(empty($cancion)){
            $this->modelArt->delete($id);
            header("Location:".BASE_URL."artistas");
        }
        //si tuviese una cancion conectada al artista ya no se podria eliminar 
        else{
            $this->view->error("No puedes eliminar este artista ya que esta en uso");
        }

    }

    function formEditar_artista($id){

        $this->helper->verificarLogin();

        $artista=$this->modelArt->getArtista($id);
        $this->view->formEditar_artista($artista);
    }
//cambiando
    function editarArtista(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];

        $cancion=$this->modelCan->getItems($id);

        //si ninguna cancion tiene ese id de clave foranea modifico
        //si coincide es porq el artista que quiero modificar ya tiene relacion con canciones que se encuentran en la otra tabla
        //en ese caso no modifico para no afectar los valores de la tabla cancion
        if(empty($cancion)){
            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
            || $_FILES['imagen']['type'] == "image/png" ) {
                $this->modelArt->editar($nombre,$id,$_FILES['imagen']['tmp_name']);
            }
            else{
                $this->modelArt->editar($nombre,$id);
            }
            header("Location:".BASE_URL."artistas");
        }
        else{
            $this->view->error("No puedes modificar este artista ya que esta en uso");
        }
    }

}