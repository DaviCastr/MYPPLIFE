<?php 
session_start();
if (!isset($_GET['matricula'])) {
	header("Location: ../");
}else{
	$matricula = $_GET['matricula'];
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