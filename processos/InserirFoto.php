<?php
session_start();
if(isset($_SESSION['matricula_usuario'])){
    require_once("../controle/ControleFotos.php");
    require_once("../modelo/Fotos.php");
    $foto = new Fotos();
    $controle = new ControleFotos();
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
			$img= fopen($imagem,"rb");	
            $foto->setMatricula($_SESSION['matricula_usuario']);
            $foto->setFoto($img);
            if($controle->InserirFoto($foto)){
                echo "<span id='supost'></span>";
            }
            echo "<span id='errfot'></span>";
        }
    }
}else{
    header("Location: ../");
}
?>