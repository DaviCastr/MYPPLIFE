<?php
session_start();
    require_once("../controle/ControleFotos.php");
    $controleFot = new ControleFotos();
    $resultado = $controleFot->SelecionarFotos();
if($resultado != null){
    foreach ($resultado as $fots) {
    ?>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <?php 
        if(isset($_SESSION['matricula_usuario'])){ 
            if($_SESSION['matricula_usuario'] == $fots->matricula OR isset($_SESSION['admin_usuario'])){
        ?>
                <div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">
                    Ps:<?php echo $fots->nome; ?> <a href="#ex" onclick="SolicitarExcluirFoto(<?php echo $fots->id; ?>)" style="text-decoration: none;" class="excluir w3-right w3-badge w3-red w3-text-white w3-margin-left">&times;</a>
                </div>
        <?php
            }else{
        ?>
                <div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">
                    Ps:<?php echo $fots->nome; ?>
                </div>
            <?php 
            }
         }else{
            ?>
            <div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">
                Ps:<?php echo $fots->nome; ?>
            </div>
            <?php
         }
        ?>
        <img src='<?php echo "../processos/Foto.php?id=$fots->id"; ?>' style="border-radius:10px;width: 100%;height:300px;" onclick="AmpliarImagem(this)" class="w3-padding SubirImg">
      </div>
    </div>
        <!-- <div class="w3-col s12 m6 l4 w3-card w3-animate-zoom w3-round FotosSite" style="margin-top:1%;">	
			<img src='<?php echo "../processos/Foto.php?id=$fots->id"; ?>' style="border-radius:10px;width: 100%;height:300px;" onclick="AmpliarImagem(this)" class="w3-padding SubirImg" >
			<h4 class="infor w3-center w3-text-black">publicado por</h4>
			<p class="w3-center w3-text-black"><?php echo $fots->nome; ?></p>
		</div> -->
    <?php
    }        
}
?>