<?php

include_once "app/controller/controller_cancion.php";
include_once "app/controller/controller_artista.php";

define('BASE_URL','//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');

$info='inicio';

if(!empty($_GET['info'])){
    $info=$_GET['info'];
}

$param=explode('/',$info);

$controlador_cancion=new ControllerCancion();
$controlador_artista=new ControllerArtista();

switch($param[0]){
    case 'inicio':
        $controlador_cancion->showHome();
        break;
    case 'artistas':
        $controlador_artista->showArtistas();
        break;
    case 'vermas':
        $controlador_cancion->showCancion($param[1]);
        break;
    case 'itemXcategoria':
        $controlador_artista->showItems($param[1]);
        break;
    case 'addCancion':
        $controlador_cancion->addCancion();
        break;
    case 'deleteCancion':
        $controlador_cancion->deleteCancion($param[1]);
        break;
        //
    case 'formEditar_cancion':
        $controlador_cancion->formEditar_cancion($param[1]);
        break; 
    case 'editarCancion':
        $controlador_cancion->editarCancion();
        break;
    case 'addArtista':
        $controlador_artista->addArtista();
        break;
    case 'deleteArtista':
        $controlador_artista->deleteArtista($param[1]);
        break;
    case 'formEditar_artista':
        $controlador_artista->formEditar_artista($param[1]);
        break; 
    case 'editarArtista':
        $controlador_artista->editarArtista();
        break;
}