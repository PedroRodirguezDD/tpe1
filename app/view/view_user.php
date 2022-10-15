<?php

class ViewUser{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }

    function formLogin($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display("login.tpl");
    }

}