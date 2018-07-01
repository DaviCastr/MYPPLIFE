<?php
session_start();
	if(isset($_POST["id"]) AND isset($_FILES["imagem"]) AND  isset($_SESSION["admin_usuario"])){
		$id = $_POST["id"];
		$descricao = $_POST["descricao"];
		$nome = $_POST["nome"];
		$imagem = $_FILES["imagem"];
		$nomeI = $imagem["name"];
		$tamanho = $imagem["size"];
		$foto = $imagem["tmp_name"];
		$erro = $imagem["error"];
		$tipoimg = $imagem["type"];
		$extensao = strtolower(pathinfo($nomeI,PATHINFO_EXTENSION));
		#strtolower coloca a extenção em minusculo
		$permitidos="jpg;jpeg;png;gif;ico";
		if(strstr($permitidos,$extensao) AND $tamanho<=2097152){
			$img= fopen($foto,"rb");
			require_once("../modelo/Home.php");
			require_once("../controle/ControleHome.php");
			$linha = new Home();
			$controle = new ControleHome();
			$linha->setNome($nome);
			$linha->setDescricao($descricao);
			$linha->setId($id);
			$linha->setImagem($img);
			if($controle->AtualizarLinha($linha)){
				echo "<span id='susAtu'></span>";
			}
			
		}else{
			"<span id='errAtu'></span>";
		}
	}
?>