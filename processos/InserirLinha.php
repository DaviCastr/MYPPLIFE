<?php
session_start();
if(isset($_SESSION['admin_usuario']) AND isset($_GET['descricao']) AND isset($_GET['nome'])){
    require_once("../controle/ControleHome.php");
    require_once("../modelo/Home.php");
    $MHome = new Home();
    $controle = new ControleHome();
    foreach($_FILES as $arquivo){
        $nome = $arquivo["name"];
		$imagem = $arquivo["tmp_name"];
		$tamanho = $arquivo["size"];
		$erro = $arquivo["error"];
		$tipoimg = $arquivo["type"];
		$extensao = strtolower(pathinfo($nome,PATHINFO_EXTENSION));
		#strtolower coloca a extenção em minusculo
		$permitidos="jpg;jpeg;png;gif;ico";
		if(strstr($permitidos,$extensao) AND $tamanho<=2097152){
            $posit = "left";
			$img= fopen($imagem,"rb");	
            $MHome->setNome($_GET['nome']);
            $MHome->setPosicao($posit);
            $MHome->setDescricao($_GET['descricao']);
            $MHome->setImagem($img);
            if($controle->InserirLinha($MHome)){
                echo "<span id='supost'></span>";
            }
        }
    }
}else{
    header("Location: ../");
}
?>