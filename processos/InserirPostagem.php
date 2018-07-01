<?php
session_start();
if(!isset($_POST['descricao']) OR !isset($_SESSION['matricula_usuario']) OR !isset($_POST['conf'])){
    header("Location: ../");
}else{
    require_once("../modelo/Postagem.php");
    require_once("../controle/ControlePostagem.php");
    $matricula = $_SESSION['matricula_usuario'];
    $descricao = trim(strip_tags($_POST['descricao']));
    $curtidas = 0;
    date_default_timezone_set('America/Fortaleza');
    $data =  date("d/m/Y",time());
    $hora = date('h:i A',time());
    $postagem = new Postagem();
    $controle = new ControlePostagem();
    $postagem->setMatricula($matricula);
    $postagem->setHora($hora);
    $postagem->setData($data);
    $postagem->setDescricao($descricao);
    $postagem->setCurtidas($curtidas);
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
            if($controle->InserirPostagem($postagem)){
                echo "<span id='supost'></span>";
            }else{
            
            }
        }
	}else{
        if($controle->InserirPostagem($postagem)){
            echo "<span id='supost'></span>";
        }else{
        
        }
    }
}
?>