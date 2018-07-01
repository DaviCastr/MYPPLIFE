<?php 
session_start();
if (!isset($_SESSION['matricula_usuario'])) {
	header("Location: ../");
}else{
	if (isset($_GET['matricula'])) {
		$matricula = $_GET['matricula'];
	}else{
		$matricula = $_SESSION['matricula_usuario'];
	}
	require_once("../modelo/Usuario.php");
	require_once("../controle/ControleUsuario.php");
	$Usuario = new Usuario();
	$controle = new ControleUsuario();
	$Usuario->setMatricula($matricula);
	$imga = $controle->Perfil($Usuario);
	header("Content-type: image");
	echo $imga;
}
?>