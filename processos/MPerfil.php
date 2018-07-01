<?php 
session_start();
if (!isset($_SESSION['matricula_usuario'])) {
	header("Location: ../");
}else{
	$matricula = $_SESSION['matricula_usuario'];
	require_once("../modelo/Usuario.php");
	require_once("../controle/ControleUsuario.php");
	$Usuario = new Usuario();
	$controle = new ControleUsuario();
	$Usuario->setMatricula($matricula);
	$conexao = new Conexao();
	$sql="SELECT perfil FROM usuarios WHERE matricula=:matricula;";
	$preparar= $conexao->getCon()->prepare($sql);
	$preparar->bindParam("matricula",$matricula);
	$preparar->execute();
	$preparar->bindColumn(1,$img,PDO::PARAM_LOB);
	$arquivo= $preparar->fetch(PDO::FETCH_BOUND);
	header("Content-type: image");
	echo $img;
	fclose($img);
}
?>