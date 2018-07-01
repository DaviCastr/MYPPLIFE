<?php 
if (strlen($_GET['em']) <13) {
	
}else{
	require_once("../controle/ControleUsuario.php");
	require_once("../modelo/Usuario.php");
	$Usuario = new Usuario();
	$matr = $_GET['em'];
	$Usuario->setEmail($matr);
	$controle = new ControleUsuario();
	if ($controle->VerificarEmail($Usuario)) {
		echo "<span id='erema' style='color:red;padding-left:7px'>E-mail Indisponível</span>";
	}
}
?>