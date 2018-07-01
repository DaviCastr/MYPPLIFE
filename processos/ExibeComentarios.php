<?php 
session_start();
if(isset($_SESSION['matricula_usuario'])){
    require_once("../controle/ControlePostagem.php");
    require_once("../modelo/Postagem.php");
    $controleComentario = new ControlePostagem();
    $Comenta = new Postagem();
    $Comenta->setId($_GET['id']);
    $retorno = $controleComentario->SelecionarComentario($Comenta);
    if($retorno !=null){
    foreach ($retorno as $coment) {
    ?>
                <div>
                    <div style="width:100%">
                        <header class="w3-container w3-padding w3-light-grey">
                            <?php if ($coment->confimg != null) { 
                                    echo"  <img src='../processos/PerfilPostagem.php?matricula={$coment->matricula}' style='width:35px;height:35px;'  class='w3-left w3-circle w3-margin-right'>";
                                }else{
                                     echo " <img src='../img/papel.jpg' style='width:35px;height:35px;' class='w3-left w3-circle w3-margin-right'>";
                                } 
                            ?>
                            <span style="font-size: 11px"><b><?php echo $coment->nome; ?></b> <?php echo chunk_split($coment->comentario, 22); ?> </span>
                            <p style="font-size: 10px"></p> 
                        </header>
                    </div>
                </div>

    <?php
        $resposta = $coment->nome;
     } 
        if (empty($resposta)) {
          ?>
                <div>
                    <div style="width:100%">
                        <header class="w3-center w3-container w3-padding w3-light-grey">
                            <span style="font-size: 11px"><b>Seja o(a) primeiro(a) Comentar</b>
                        </header>
                    </div>
                </div>
          <?php
        }
    }
}else{
    header("Location: ../");
}

?>