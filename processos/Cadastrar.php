<?php
	$nome = trim( strip_tags($_GET['nome']));
	$email = trim( strip_tags($_GET['email']));
	$matricula = trim( strip_tags($_GET['matricula']));
	$senha = $_GET['senha'];

	// if(strlen($nome) <4 OR strlen($email) <13 OR strlen($matricula) <7 OR strlen($senha) <8){
	// 	header("Location: ../");
	// }else{
		try{
			require_once("../modelo/Usuario.php");
			require_once("../controle/ControleUsuario.php");
			$Usuario = new Usuario();
			$Usuario->setNome($nome);
			$Usuario->setEmail($email);
			$Usuario->setMatricula($matricula);
			$Usuario->setSenha($senha);
			$Usuario->setPvisit("true");
			$controle = new ControleUsuario();
			if($controle->CadastrarUsuario($Usuario)){
				
			}else{
				echo "<span id='ercad'></span>";
			}
		}catch(Exception $e){
			$arc = fopen("console.log","w");
			fwrite($arc, $e->getMessage());
		}

	// }
?>