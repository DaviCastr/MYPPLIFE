<?php
session_start();
if(!isset($_GET['id'])){
    header("Location: ../");
}else{
    require_once("../modelo/Postagem.php");
    require_once("../controle/ControlePostagem.php");
    
    $postagem = new Postagem();
    $controle = new ControlePostagem();
    $postagem->setId($_GET['id']);
    $retorno  = $controle->VerCurtidas($postagem);
   
    echo $retorno->curtidas;
	
}
?>