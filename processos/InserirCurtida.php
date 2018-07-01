<?php
session_start();
if(!isset($_SESSION['matricula_usuario']) OR !isset($_GET['id'])){
    header("Location: ../");
}else{
    require_once("../modelo/Postagem.php");
    require_once("../controle/ControlePostagem.php");
    $matricula = $_SESSION['matricula_usuario'];
    
    $postagem = new Postagem();
    $controle = new ControlePostagem();
    $postagem->setId($_GET['id']);
    $postagem->setMatricula($_SESSION['matricula_usuario']);
    $retorno  = $controle->ControlaCurtidas($postagem);
    if($retorno == 0){
        echo "<i class='fa fa-thumbs-up'></i> Curtir";
    }else{
        echo "$retorno <i class='fa fa-thumbs-up'></i> Curtir";
    }
}
?>