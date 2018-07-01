<?php session_start(); ?>
<section style="margin-top: 5%;margin-bottom: 5%;">
	<div class="w3-container">
		<article>
			<!-- Abre Modal Imagem -->
			<div id="VerImagemAmp" class="w3-modal w3-black" onclick="this.style.display='none'">
				<span class="w3-button w3-large w3-black w3-text-white w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
				<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
					<img id="ImgMudarM" style="width:90%;max-width:600px;min-height:310px;max-height:500px;" class="w3-image">
					<p id="caption" class="w3-opacity w3-large"></p>
				</div>
			</div>
		<?php 
			if(isset($_SESSION['matricula_usuario'])){
			?>
				<div class="w3-center">
					<div class="w3-row w3-margin-bottom">
						<div class="w3-col">
							<button class="w3-btn w3-text-white" id="Inserir" style="background-color: #008000;"><i class="fa fa-image"></i> Inserir Foto</button>
						</div>
					</div>
				</div>
				<div id="ExcluirConfirma" class="w3-modal">
					<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 350px;margin-top:5%;">
						<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
							<span onclick="document.getElementById('ExcluirConfirma').style.display='none'" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
							<h3 class="w3-center w3-text-white">Deseja mesmo Excluir?</h3>
						</header>
						<div class="w3-container">
							<div class="w3-light-grey w3-padding">
								<div class="w3-center">
									<div class="w3-row">
										<img id="ImgExcluirConf" style="width:200px;height: 200px" class="w3-image w3-center">
										<div class="w3-col s6 m6 l6 w3-margin-top">
											<button class="w3-round w3-text-white w3-btn margin-left" style="background-color: #d77600;"  onclick="document.getElementById('ExcluirConfirma').style.display='none';">Cancelar</button>
										</div>
										<div class="w3-col s6 m6 l6 w3-margin-top ">
											<button id="ConfirmarExcluir" class="w3-round w3-btn w3-red w3-text-white" onclick="">Confirmar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="InserirFoto" class="w3-modal">
					<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 350px;margin-top:5%;">
						<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
							<span onclick="document.getElementById('InserirFoto').style.display='none'" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
							<h3 class="w3-center w3-text-white">Inserir Foto</h3>
						</header>
						<div class="w3-container">
							<div class="w3-light-grey w3-padding">
								<div class="w3-center">
									<div class="w3-row">
										<div class="w3-col s12">
											<div  class="w3-center w3-col s12 m12 l12 w3-margin-bottom">
												<img src="../img/FotoMais.jpg" width='200' id="View" height='200' >
												<progress id="barradeProgresso" class="w3-margin-top" style="display:none;margin-left:auto;margin-right:auto;"></progress>
											</div>
											<div id="enviarComentario"></div>
											<form action="##" method="post" name="FormFotos">
												<div class="w3-col s12 m12 l12">
													<label for="fotos" style="background-color: #d77600;" class="w3-btn w3-round w3-text-white">Foto <i class="fa fa-image"></i></label>
													<input style='display:none' id="fotos" type="file" name="fotos[]" multiple>
												</div>
												<div class="w3-col s12 m12 l12">
													<button type="submit" name="enviar" style="background-color:#008000;" class="w3-margin-top w3-block w3-btn w3-text-white w3-round">Enviar <i class="fa fa-arrow-right"></i></button>
												</div>
											</form>
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
			<div id="ExcluirFotoCont"></div>
			<div id="ExibirFotos" class="w3-row">
				<div class="w3-col l3 m6 w3-margin-bottom">
					<div class="w3-display-container">
						<div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">Ps:carregando ...</div>
						<img src='../img/fundo.jpg' style="border-radius:10px;width: 100%;height:300px;" onclick="AmpliarImagem(this)" class="w3-padding SubirImg">
					</div>
				</div>
				<div class="w3-col l3 m6 w3-margin-bottom">
					<div class="w3-display-container">
						<div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">Ps:carregando ...</div>
						<img src='../img/fundo.jpg' style="border-radius:10px;width: 100%;height:300px;" onclick="AmpliarImagem(this)" class="w3-padding SubirImg">
					</div>
				</div>
				<div class="w3-col l3 m6 w3-margin-bottom">
					<div class="w3-display-container">
						<div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">Ps:carregando ...</div>
						<img src='../img/fundo.jpg' style="border-radius:10px;width: 100%;height:300px;" onclick="AmpliarImagem(this)" class="w3-padding SubirImg">
					</div>
				</div>
				<div class="w3-col l3 m6 w3-margin-bottom">
					<div class="w3-display-container">
						<div class="w3-display-topleft w3-text-white w3-padding" style="background-color: #d77600;">Ps:carregando ...</div>
						<img src='../img/fundo.jpg' style="border-radius:10px;width: 100%;height:300px;" onclick="AmpliarImagem(this)" class="w3-padding SubirImg">
					</div>
				</div>
			</div>
		</article>
	</div>
	<div id="fotsscript"></div>
</section>