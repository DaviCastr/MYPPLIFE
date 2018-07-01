<?php 
	if (strlen($_GET['mat']) <7) {
	
	}else{
	require_once("../controle/ControleUsuario.php");
	require_once("../modelo/Usuario.php");
	$Usuario = new Usuario();
	$matr = $_GET['mat'];
	$Usuario->setMatricula($matr);
	$controle = new ControleUsuario();
	if ($controle->VerificarMatricula($Usuario)) {
		echo "<span id='ermat' style='color:red;padding-left:7px'>Mátricula Indisponível</span>";
	}
}
?>