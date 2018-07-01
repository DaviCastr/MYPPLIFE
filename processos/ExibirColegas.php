<?php
session_start();
if(isset($_SESSION['matricula_usuario'])){
require_once("../controle/ControleUsuario.php");
$usuario = new ControleUsuario();

$resultados = $usuario->SelecionarColega();
    if ($resultados !=null) {
        foreach ($resultados as $colega) {
            if($colega->matricula == $_SESSION['matricula_usuario']){

            }else{
        ?>
            <?php if (empty($colega->confimg)) { ?>
                <a href="#Colega" style='font-size:14px;' onclick="AbrirBatePapa(<?php echo $colega->matricula; ?>)" class="w3-left w3-bar-item w3-btn"> <img class="w3-circle img" style="width:30px;height:30px" src="../img/padrao.jpg"><?php echo $colega->nome; ?></a>
            <?php }else{?>
                <a href="#Colega" style='font-size:14px;' onclick="AbrirBatePapa(<?php echo $colega->matricula; ?>)" class="w3-left w3-bar-item w3-btn"><img class="w3-circle img"  style="width:30px;height:30px" src='<?php echo "../processos/Perfil.php?matricula=$colega->matricula"; ?>'><?php echo $colega->nome; ?></a>
            <?php } ?>
            
        <?php
            }
        }
    }
}else{
    header("Location: ../");
}
?>