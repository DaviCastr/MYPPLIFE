<?php 
session_start();
if (!isset($_GET['sen']) OR !isset($_GET['em'])) {
	header("Location: ../");
}else{
	require_once("../modelo/Usuario.php");
	require_once("../controle/ControleUsuario.php");
	$Usuario = new Usuario();
	$controle = new ControleUsuario();
	$ema = trim(strip_tags($_GET['em']));
	$sena =trim(strip_tags($_GET['sen'])); 
	$Usuario->setEmail($ema);
	$Usuario->setSenha($sena);
	$logi = $controle->Login($Usuario);
	if ($logi != null) {
		if ($logi->getConfImg() == null) {
			$_SESSION['confimg']="";
		}else{
			$_SESSION['confimg']="true";
		}
		$_SESSION['matricula_usuario'] = $logi->getMatricula();
		$_SESSION['nome_usuario'] = $logi->getNome();
	}else{
		echo "<span id='erlog'></span>";
	}
}

?>