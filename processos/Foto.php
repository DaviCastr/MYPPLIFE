<?php 
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../");
}else{
	require_once("../modelo/Fotos.php");
    require_once("../controle/ControleFotos.php");
    $id = $_GET['id'];
	$Foto = new Fotos();
	$controle = new ControleFotos();
	$Foto->setId($id);
	$imga = $controle->Foto($Foto);
	header("Content-type: image");
	echo $imga;
}
?>