<?php

class ViewArtista{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }


    function error($msj){
        $this->smarty->assign('mensaje', $msj);
        $this->smarty->display('error.tpl');
    }

    function showArtistas($artistas){
        $this->smarty->assign('artistas', $artistas);
        $this->smarty->display("viewArtista.tpl");
    }

    function showItems($items,$artista){
        $this->smarty->assign('items', $items);
        $this->smarty->assign('artista', $artista);
        $this->smarty->display('viewItems.tpl');
    }

    function formEditar_artista($artista){
        $this->smarty->assign('art',$artista);
        $this->smarty->display('form_artista.tpl');
    }
}