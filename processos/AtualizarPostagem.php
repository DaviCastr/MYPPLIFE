<?php
session_start();
if(isset($_POST["id"]) AND isset($_SESSION["matricula_usuario"])){
	require_once("../modelo/Postagem.php");
 require_once("../controle/ControlePostagem.php");
	$descricao = trim(strip_tags($_POST['descricao']));
    $postagem = new Postagem();
    $controle = new ControlePostagem();
    $postagem->setDescricao($descricao);
    $arquivo = $_FILES['arquivo'];
    if(isset($arquivo["name"]) && $arquivo["error"]==0){
		$nome = $arquivo["name"];
		$imagem = $arquivo["tmp_name"];
		$tamanho = $arquivo["size"];
		$erro = $arquivo["error"];
		$tipoimg = $arquivo["type"];
		$extensao = strtolower(pathinfo($nome,PATHINFO_EXTENSION));
		#strtolower coloca a extenção em minusculo
		$permitidos="jpg;jpeg;png;gif;ico";
		if(strstr($permitidos,$extensao) AND $tamanho<=2097152){
			$img= fopen($imagem,"rb");	
            $postagem->setArquivo($img);
            if($controle->AtualizarPostagem($postagem)){
                echo "<span id='supost'></span>";
            }else{
            	echo "<span id='errpost'></span>";
            }
        }
	}else{
        if($controle->AtualizarPostagem($postagem)){
            echo "<span id='supost'></span>";
        }else{
        		echo "<span id='errpost'></span>";
        }
    }

}

?>