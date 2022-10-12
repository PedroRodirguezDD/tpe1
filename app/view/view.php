<?php

include "./libs/libs/Smarty.class.php";

class View{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }


    function error($msj){
        $this->smarty->assign('mensaje', $msj);
        $this->smarty->display('error.tpl');
    }

    function showHome($canciones,$artistas){
        $this->smarty->assign('canciones', $canciones);
        $this->smarty->assign('artistas', $artistas);
        $this->smarty->display("viewHome.tpl");
    }

    function showCancion($cancion){
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->display("viewCancion.tpl");
    }

    /*
    function showArtistas($artistas){
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display("viewArtistas.tpl");
    }*/

    function showItems($items,$artista){
        $this->smarty->assign('items', $items);
        $this->smarty->assign('artista', $artista);
        $this->smarty->display('viewItems.tpl');
    }

    function selectArtistas($artistas){
        $this->smarty->assign('artistas',$artistas);
        //le mando los artistas al formulario de canciones asi puede aparecer las opciones de artistas en un select
        $this->smarty->display('form_cancion.tpl');
    }

    //
    function formEditar_cancion($cancion,$artistas){
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->assign('artistas',$artistas);
        //le mando los artistas al formulario de canciones asi puede aparecer las opciones de artistas en un select
        $this->smarty->display('form_cancion.tpl');
    }

    function formEditar_artista($artista){
        $this->smarty->assign('art',$artista);
        $this->smarty->display('form_artista.tpl');
    }
}