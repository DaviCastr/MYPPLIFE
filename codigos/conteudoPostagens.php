<?php session_start(); 
if(isset($_SESSION['matricula_usuario'])){
?>
<div id="ModalPrevPost" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 450px;margin-top:5%;">
		<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
			<span onclick="document.getElementById('ModalPrevPost').style.display='none'" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
			<h3 class="w3-center w3-text-white">Foto</h3>
		</header>
		<div class="w3-container">
			<div class="w3-light-grey w3-padding">
				<div class="w3-center">
					<div class="w3-row">
						<div class="w3-col s12">
							<div  class="w3-center w3-col s12 m12 l12 w3-margin-bottom">
								<img src="" style="width:100%; max-width:400px;max-height:400px;" id="imgPostPrev" >
								<div id="respostapostimg"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
<div id="ComentarioPost" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 600px;margin-top:10%;">
		<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
			<span onclick="document.getElementById('ComentarioPost').style.display='none'" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
		</header>
		<div class="w3-container">
			<div class="w3-light-grey w3-padding">
				<div class="gformcomen" id="ExibirComentarios" style=" width: 100%; border: solid #ccc 0.5px;margin-bottom:5px; height: 150px; overflow-y: auto; max-height: 150px;" src="postcoments.php">
					<div>
						<div style="width:100%">
							<header class="w3-container w3-padding w3-light-grey">
								<img src="../img/papel.jpg"  alt="Avatar" class="w3-left w3-circle" style="width:35px;height:35px;">
								<span style="font-size: 11px"><b>John Doe</b> masssa kdkm dnd dnjd j d j dj j </span>
							</header>
						</div>
					</div>
				</div>
				<form action="#" method="post" name="FormulariodeComentario">
					<div class="w3-row">
						<div class="w3-col s9 m9 l10">
							<input type="hidden" name="id" />
							<input type="text" maxlength="100" autocomplete="off" class="inputcoment w3-input w3-border w3-round" placeholder="Comentário" name="comentario" >
						</div>
						<div class=" w3-col s3 m3 l2">
							<button type="submit" name="enviarC" class="w3-orange w3-right w3-text-white w3-btn w3-circle"><i class="fa fa-arrow-right"></i></button>
						</div>
					</div>
				</form>
				<div id="enviarComentario"></div>
			</div>
		</div>
	</div>
</div>

<section class="w3-margin-bottom" style="margin-top: 3%">
	<div class="w3-container">
		<div class="w3-row">
			<div style="position:relative;background:#008000;" class="w3-hide-small w3-col s12 m2 l2 w3-card-4 w3-left w3-padding">
				<div class="" style="margin-bottom:5px;height:680px" id="contposts">
					<div class="w3-card w3-orange w3-round">
						
					</div>
				</div>
			</div>
			<div class="w3-col s12 m8 l8" id="postContainer">
				<?php if(isset($_SESSION["matricula_usuario"]) AND isset($_SESSION['nome_usuario'])){ ?>
				<div class="w3-card w3-white w3-round w3-round w3-margin-left w3-margin-right">
						<form action="##" method="post" name="FormInserirPost" class="w3-input">
							<div class="w3-col s2 m2" style="width:50px">
								<?php if (empty($_SESSION['confimg'])) { ?>
									<img class="w3-circle w3-middle img PerfilPostagem" width="45" height="45" src="../img/papel.jpg">
								<?php }else{?>
									<img class="w3-circle img PerfilPostagem" width="50" height="50" src="../processos/Perfil.php">
								<?php } ?>
							</div>
							<div class="w3-rest">
								<input type="hidden" name="conf" value="conf">
								<div class="w3-col s8 m7 l9">		
									<textarea placeholder="Compartilhe sua informação" name="descricao" class="w3-input w3-border w3-round" id="descricao" style="text-line:10px;border-radius:10px;width:100%;min-height:45px;max-height:45px;max-width:100%;"></textarea>
								</div>	
								<div class="w3-col s4 m2 l1">
									<label for="arquivo" class="w3-btn w3-green w3-text-white w3-circle w3-margin-left "><i class='fa fa-image'></i></label>
									<input type="file" style="display:none;" id="arquivo" class=" w3-center" name="arquivo">
								</div>
								<div class="w3-hide-small w3-col s12 m3 l2">
									<button type="submit" class="w3-orange w3-right w3-text-white w3-btn  w3-circle"><i class="fa fa-arrow-right"></i></button>
								</div>
								<div class="w3-hide-medium w3-hide-large w3-hide-medium w3-hide-large w3-col s12">
									<button name="enviarPostB" type="submit" class="w3-margin w3-orange w3-right w3-text-white w3-btn w3-circle"><i class="fa fa-arrow-right"></i></button>
								</div>
							</div>
						</form>
						<div id="inserirPostagem"></div>
				</div>
				<?php } ?>
				<div id="ExibePostagens">
					<div class="w3-card w3-white w3-round w3-margin-left w3-margin-right w3-margin-top" ><br>
						<div class="w3-container">
							<img src="../img/fundo.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
							<span class="w3-right w3-opacity">carregando... </span>
							<h4 class="w3-left">...</h4><br>
							<hr class="w3-clear">
							<p>carregando...</p>
							<div class="w3-row-padding">
								<div class="w3-center">
								<img src="../img/fundo.jpg" class="w3-padding" style="width:95%;max-height:300px;border-radius:5px;display:block;margin-left: auto;margin-right: auto;" alt="Northern Lights" class="w3-margin-bottom">
								</div>
							</div>
							<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Curtir</button> 
							<button type="button" onclick="" class="w3-button w3-theme-d2 btncoment w3-margin-bottom"><i class="fa fa-comment"></i>  Comentário</button>
						</div> 
						<hr />
						<div class="w3-light-grey w3-padding">
							
							<form action="#" method="post" name="formcomentario">
								<div class="w3-col" style="width:50px"><img class="w3-circle w3-middle" src="../img/papel.jpg" width="40" height="40"></div>
								<div class="w3-rest">
								<input type="text" maxlength="100" autocomplete="off" class="inputcoment w3-input w3-border w3-round" placeholder="Comentário" name="comentario" id="cccc">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div style="background:#d77600;" class="w3-hide-small w3-col s12 m2 l2 w3-card-4 w3-right w3-padding">
				<div class="" style="margin-bottom:5px;min-height:680px;">
					
				</div>
			</div>
		</div>
	</div>
	<div id="postscript"></div>
</section>