<?php
session_start();
if(!isset($_SESSION['matricula_usuario']) OR !isset($_POST['id'])){
  
}else{
    require_once("../modelo/Postagem.php");
    require_once("../controle/ControlePostagem.php");
    $matricula = $_SESSION['matricula_usuario'];
    
    $comentario = new Postagem();
    $controle = new ControlePostagem();
    $comentario->setId($_POST['id']);
    $comentario->setComentario($_POST['comentario']);
    $comentario->setMatricula($_SESSION['matricula_usuario']);
    if($controle->InserirComentario($comentario)){
        
    }
   
}
?>