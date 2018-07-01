<?php 
session_start();
require_once("../controle/ControlePostagem.php");
$controle = new ControlePostagem();
require_once("../modelo/Postagem.php");
$retorno = $controle->SelecionarPostagens();
if($retorno !=null){
foreach ($retorno as $post) {
?>
<div class="w3-card w3-white w3-round w3-margin-left w3-margin-right w3-margin-top" ><br>
    <div class="w3-container">
        <?php if (!empty($post->confimg)) { 
                echo"  <img src='../processos/PerfilPostagem.php?matricula={$post->matricula}'  class='PerfilPostagem w3-left w3-circle w3-margin-right'>";
            }else{
                echo " <img src='../img/papel.jpg' class='PerfilPostagem w3-left w3-circle w3-margin-right'>";
             } 
        ?>
        <h4 class="PostagemNome w3-left"><?php echo $post->nome; ?></h4><br /><br /><br />
        <span class="w3-right w3-padding w3-opacity curtircoment" ><?php echo $post->datas." as ".$post->hora; ?></span>
        <hr class="w3-clear">
        <p><?php echo chunk_split($post->descricao, 28); ?></p>
        <?php 
            if(!empty($post->confarc)){
        ?>
            <div class="w3-row-padding">
                <div class="w3-center">
                <?php
                    echo "<img src='../processos/ArquivoPostagem.php?id={$post->id}' class='arquivoPostagem w3-padding' style=';max-height:400px;border-radius:5px;display:block;margin-left: auto;margin-right: auto;' alt='Imagem' class='w3-margin-bottom'>";
                ?>
                </div>
            </div>
        <?php } 
        if(isset($_SESSION['matricula_usuario'])){
        ?>
        <button type="button" onclick='Curtir(<?php echo "CurtidasPostagens$post->id"; ?>,<?php echo $post->id; ?>)' class="curtircoment w3-button w3-theme-d1 w3-margin-bottom">
            <span id='<?php echo "CurtidasPostagens$post->id"; ?>'>
            <?php if($post->curtidas != 0){echo $post->curtidas; } ?>
            <i class="fa fa-thumbs-up"></i> Curtir
            </span>
        </button> 
        <button type="button" onclick="Comentario(<?php echo $post->id; ?>)" class="w3-button w3-theme-d2 btncoment w3-margin-bottom curtircoment"><i class="fa fa-comment"></i>  Comentário</button>
            <?php }else{ ?>
        <button type="button" onclick="document.getElementById('Login').style.display = 'block';" class="curtircoment w3-button w3-theme-d1 w3-margin-bottom">
            <span id='<?php echo "CurtidasPostagens$post->id"; ?>'>
            <?php if($post->curtidas != 0){echo $post->curtidas; } ?>
            <i class="fa fa-thumbs-up"></i> Curtir
            </span>
        </button>
        <button type="button" onclick="document.getElementById('Login').style.display = 'block';" class="w3-button w3-theme-d2 btncoment w3-margin-bottom curtircoment"><i class="fa fa-comment"></i>  Comentário</button> 
        <?php } ?>
        
    </div> 
    <hr />
    <div class="w3-light-grey w3-padding">
        <div class="gformcomen" style=" width: 100%; border: solid #ccc 0.5px;margin-bottom:5px; height: 150px; overflow-y: auto; max-height: 150px;" src="postcoments.php">
            <?php
            $controleComentario = new ControlePostagem();
            $Comenta = new Postagem();
            $Comenta->setId($post->id);
            $retorno = $controleComentario->SelecionarComentario($Comenta);
            if($retorno !=null){
            foreach ($retorno as $coment) {
            ?>
            <div>
                <div style="width:100%">
                    <header class="w3-container w3-padding w3-light-grey">
                        <?php if (!empty($coment->confimg)) { 
                                echo"  <img src='../processos/PerfilPostagem.php?matricula={$coment->matricula}' style='width:35px;height:35px;'  class='w3-left w3-circle w3-margin-right'>";
                            }else{
                                 echo " <img src='../img/papel.jpg' style='width:35px;height:35px;' class='w3-left w3-circle w3-margin-right'>";
                            } 
                        ?>
                        <span style="font-size: 11px"><b><?php echo $coment->nome; ?></b> <?php echo chunk_split($coment->comentario, 18); ?> </span>
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
?>
        </div>
    </div>
</div>
<?php
 } 
}
?>