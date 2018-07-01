<?php 
session_start();
if(isset($_POST['email']) AND isset($_SESSION['matricula_usuario'])){
	$foto = $_FILES['Mperfil'];
	require_once("../modelo/Usuario.php");
	require_once("../controle/ControleUsuario.php");
	if(isset($foto["name"]) && $foto["error"]==0){
		$Usuario = new Usuario();
		$controle = new ControleUsuario();
		$nome_usuario = $_POST['nome'];
		$email_usuario = $_POST['email'];
		$senha_usuario = $_POST['senha'];
		$nome = $foto["name"];
		$imagem = $foto["tmp_name"];
		$tamanho = $foto["size"];
		$erro = $foto["error"];
		$tipoimg = $foto["type"];
		$extensao = strtolower(pathinfo($nome,PATHINFO_EXTENSION));
		#strtolower coloca a extenção em minusculo
		$permitidos="jpg;jpeg;png;gif;ico";
		if(strstr($permitidos,$extensao) AND $tamanho<=2097152){
			echo "<span id='confimg'></span>";
			$img= fopen($imagem,"rb");	
			$Usuario->setPerfil($img);
			$Usuario->setMatricula($_SESSION['matricula_usuario']);
			$Usuario->setNome($nome_usuario);
			$Usuario->setEmail($email_usuario);
			$Usuario->setSenha($senha_usuario);
			if ($controle->AtualizarUsuario($Usuario)) {
				$_SESSION['nome_usuario'] = $nome_usuario;
				$confimg ="true";
				$_SESSION['confimg'] = $confimg;
				echo "<span id='suEdi'></span>";
				unset($_SESSION['email_usuario']);
			}else{
				echo "<span id='erEdit'></span>";
			}
		}else{			
			echo "<span id='erimg'></span>";
		}			
	}else{
		$Usuario = new Usuario();
		$controle = new ControleUsuario();
		$nome_usuario = $_POST['nome'];
		$email_usuario = $_POST['email'];
		$senha_usuario = $_POST['senha'];
		$Usuario->setMatricula($_SESSION['matricula_usuario']);
		$Usuario->setNome($nome_usuario);
		$Usuario->setEmail($email_usuario);
		$Usuario->setSenha($senha_usuario);
		if ($controle->AtualizarUsuario($Usuario)) {
			$_SESSION['nome_usuario'] = $nome_usuario;
			echo "<span id='suEdi'></span>";
		}else{
			echo "<span id='erEdit'></span>";
		}			
	}
}	

?>