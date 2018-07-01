<?php 
require_once("../controle/ControleHome.php");
$controle = new ControleHome();
$retorno = $controle->SelecionarLinha();
if($retorno !=null){
foreach ($retorno as $linaExibir) {
        if($linaExibir->posicao =="left"){
?>
            <article class="" >
				<div class="w3-margin-top w3-margin-bottom w3-padding-16" >
					<div class="w3-container w3-center" >
						<div class="w3-col s12 m6" >
							<div class="w3-hide-small">
								<img src='<?php echo "../processos/LinhaImagem.php?id=$linaExibir->id"; ?>' id="teste" style="width:100%;height: 400px" />
							</div>
							<div class="w3-hide-medium w3-hide-large">
								<img src='<?php echo "../processos/LinhaImagem.php?id=$linaExibir->id"; ?>' id="teste" style="width:100%;height: 200px" />
							</div>
						</div>
						<div class="w3-col s12 m6 " >
							<h3 class="w3-text-black "><?php echo $linaExibir->nome; ?></h3>
							<div class="conteudoI">
								<p class="w3-text-black"><?php echo $linaExibir->descricao;  ?></p>
							</div>
						</div>
					</div>
				</div>
            </article>
        <?php }else{ ?>
			<article class=" " >
				<div class="w3-margin-top w3-margin-bottom w3-padding-16" >
					<div class="w3-container w3-center" >
						<div class="w3-col s12 m6">
							<h3 class="w3-text-black"><?php echo $linaExibir->nome; ?></h3>
							<div class="conteudoI">
								<p class="w3-text-black"><?php echo $linaExibir->descricao;  ?></p>
							</div>
						</div>
						<div class="w3-col s12 m6" >
							<div class="w3-hide-small">
								<img src='<?php echo "../processos/LinhaImagem.php?id=$linaExibir->id"; ?>' id="teste" style="width:100%;height: 400px" />
							</div>
							<div class="w3-hide-medium w3-hide-large">
								<img src='<?php echo "../processos/LinhaImagem.php?id=$linaExibir->id"; ?>' id="teste" style="width:100%;height: 200px" />
							</div>
						</div>
					</div>
				</div>
            </article>
<?php
        }
    }
}
?>