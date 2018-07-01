<?php
session_start();
if(isset($_SESSION['matricula_usuario']) AND isset($_POST['matricula'])){
$nova = trim( strip_tags($_POST['mensagem']));
// if(isset($nova) AND $nova =="apgmens"){
// 	require_once("Conexao.php");
// 	$con = new Conexao();
// 	$apagar = $con->getCon()->exec("DELETE FROM batepapo;");
// }else 
if (isset($nova) AND strlen($nova) >0) {
	
	require_once("../modelo/BatePapo.php");
	require_once("../controle/ControleBatePapo.php");
	$batepapo = new BatePapo();
	$hora=date('h:i A',time());
	$data=date('AAAA-MM-DD ',time());
	$batepapo->setMatriculaUser($_SESSION['matricula_usuario']);
	$batepapo->setMatriculaAm($_POST['matricula']);
	$batepapo->setMensagem($nova);
	$batepapo->setHora($hora);
	$batepapo->setData($data);
	$controle = new ControlBatePapo();
	if($controle->InserirMensagem($batepapo)){
		
	}
  }
}else{
	echo "n";
}
?>
