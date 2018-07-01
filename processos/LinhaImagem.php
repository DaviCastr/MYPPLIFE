<?php 
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../");
}else{
	require_once("../modelo/Home.php");
    require_once("../controle/ControleHome.php");
    $id = $_GET['id'];
	$Hom = new Home();
	$controle = new ControleHome();
	$Hom->setId($id);
	$imga = $controle->LinhaImagem($Hom);
	header("Content-type: image");
	echo $imga;
}
?>