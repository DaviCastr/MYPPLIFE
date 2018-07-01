<?php 
session_start();
	if(isset($_SESSION["admin_usuario"]) AND isset($_GET["id"])){
	require_once("../modelo/Home.php");
	require_once("../controle/ControleHome.php");
	$id = $_GET["id"];
	$linha = new Home();
	$controle = new ControleHome();
	$linha->setId($id);
	if($controle->ExcluirLinha($linha)){
		echo "<span id='susexclu'></span>";
	}
}else{
	header("Location: ../");
}

?>