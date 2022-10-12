<?php

include_once "app/controller/controller.php";

define('BASE_URL','//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');

$info='inicio';

if(!empty($_GET['info'])){
    $info=$_GET['info'];
}

$param=explode('/',$info);

$controlador=new Controller();

switch($param[0]){
    case 'inicio':
        $controlador->showHome();
        //$controlador->showArtistas();
        break;
    case 'artistas':
        $controlador->showArtistas();
        break;
    case 'vermas':
        $controlador->showCancion($param[1]);
        break;
    case 'itemXcategoria':
        $controlador->showItems($param[1]);
        break;
    case 'addCancion':
        $controlador->addCancion();
        break;
    case 'deleteCancion':
        $controlador->deleteCancion($param[1]);
        break;
        //
    case 'formEditar_cancion':
        $controlador->formEditar_cancion($param[1]);
        break; 
    case 'editarCancion':
        $controlador->editarCancion();
        break;
    case 'addArtista':
        $controlador->addArtista();
        break;
    case 'deleteArtista':
        $controlador->deleteArtista($param[1]);
        break;
    case 'formEditar_artista':
        $controlador->formEditar_artista($param[1]);
        break; 
    case 'editarArtista':
        $controlador->editarArtista();
        break;
}