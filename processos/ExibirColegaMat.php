<?php 
session_start();
if(isset($_GET['matricula']) AND isset($_SESSION['matricula_usuario'])){
    require_once("../controle/ControleUsuario.php");
    require_once("../modelo/Usuario.php");
    $matr = $_GET['matricula'];
    $contr = new ControleUsuario();
    $coleg = new Usuario();
    $coleg->setMatricula($matr);
    $resCol = $contr->SelecionarColegaMat($coleg);
    if (empty($resCol->confimg)) { ?>
        <img class="w3-circle img" style="width:35px;height:35px" src="../img/padrao.jpg"><?php echo $resCol->nome; ?>
    <?php }else{?>
        <img class="w3-circle img"  style="width:35px;height:35px" src='<?php echo "../processos/Perfil.php?matricula=$resCol->matricula"; ?>'><?php echo $resCol->nome; ?>
    <?php } 
}
?>