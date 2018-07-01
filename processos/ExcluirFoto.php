<?php
session_start();
if(isset($_GET['id']) AND isset($_SESSION['matricula_usuario']) OR isset($_SESSION['admin_usuario'])){
	require_once("../controle/ControleFotos.php");
	require_once("../modelo/Fotos.php");
	$foto = new Fotos();
	$controle = new ControleFotos();
	$foto->setId($_GET['id']);
	if($controle->ExcluirFoto($foto)){
		echo "<span id='susExclu'></span>";
	}
}
?>