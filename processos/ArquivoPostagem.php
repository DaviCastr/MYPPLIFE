<?php 
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../");
}else{
	$id = $_GET['id'];
	require_once("../modelo/Postagem.php");
	require_once("../controle/ControlePostagem.php");
	$Postag = new Postagem();
	$controle = new ControlePostagem();
	$Postag->setId($id);
    $imga = $controle->Arquivo($Postag);
    header("Content-type: image");
	echo $imga;
}
?>