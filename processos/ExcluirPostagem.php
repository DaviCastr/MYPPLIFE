<?php 
session_start();
	if(isset($_SESSION["admin_usuario"]) OR isset($_GET["id"]) AND isset($_SESSION["matricula_usuario"])){
	require_once("../modelo/Poatagem.php");
	require_once("../controle/ControlePostagem.php");
	$id = $_GET["id"];
	$post = new Postagem();
	$controle = new ControlePostagem();
	$post->setId($id);
	if($controle->ExcluirPostagem($post)){
		echo "<span id='susexclu'></span>";
	}
}else{
	header("Location: ../");
}

?>