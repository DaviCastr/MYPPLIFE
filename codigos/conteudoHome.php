<?php session_start(); ?>
<section id="conteudo">
	<div class="">
		<div class="w3-row">
			<div class="w3-round">
			<!-- conteúdo -->
			<!-- introdução -->
			<aside>
				<div class="w3-container w3-content w3-padding w3-padding-64" style="max-width:650px">
					<h3 class="w3-center w3-text-black">3º Informática 2018</h3>
					<p class="w3-justify w3-text-black" style="font-size: 18px">Esse site busca reunir e falar um pouco sobre a turma de Informática 3º Ano 2018, onde estudam na EEEP Paulo Petrola, seguindo a cronologia durante o 1º Ano até a data atual.</p>
				</div>
			</aside>
			<div class="w3-container">
			<?php if(isset($_SESSION['admin_usuario'])){ ?>
				<div class="w3-center">
					<div class="w3-row w3-margin-bottom">
						<div class="w3-col">
							<button class="w3-btn w3-text-white" id="Inserir" style="background-color: #008000;"><i class="fa fa-image"></i> Inserir Na Linha do Tempo</button>
						</div>
					</div>
				</div>
				<div id="InserirLinha" class="w3-modal">
					<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 450px;margin-top:2%;">
						<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
							<span onclick="document.getElementById('InserirLinha').style.display='none'" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
							<h3 class="w3-center w3-text-white">Inserir Linha do Tempo</h3>
						</header>
						<div class="w3-container">
							<div class="w3-light-grey w3-padding">
								<div class="w3-center">
									<div class="w3-row">
										<div class="w3-col s12">
											<div  class="w3-center w3-col s12 m12 l12 w3-margin-bottom">
												<img src="../img/FotoMais.jpg" width='200' id="ViewHoem" height='200' >
												<progress id="barradeProgressoHome" class="w3-margin-top" style="display:none;margin-left:auto;margin-right:auto;"></progress>
											</div>
											<div id="enviarLinha"></div>
											<form action="##" method="post" name="FormInserirLinha">
												<div class="w3-col s12 m12 l12">
													<label for="fotos" style="background-color: #d77600;" class="w3-btn w3-round w3-text-white">Foto <i class="fa fa-image"></i></label>
													<input style='display:none' id="fotos" type="file" name="fotos[]">
												</div>
												<div class="w3-col s12 m12 l12">
													<label for="nome" class="w3-left">Nome <i class="fa fa-user"></i></label>
													<input id="nome" placeholder="Nome da linha..." class="w3-input" type="text" name="nome">
												</div>
												<div class="w3-col s12 m12 l12">
													<label for="nome" class="w3-left">Descrição <i class="fa fa-user"></i></label>
													<textarea id="descricao" class="w3-input" style="max-width:385px;max-height:150px" name="descricao"></textarea>
												</div>
												<div class="w3-col s12 m12 l12">
													<button type="submit" name="Enviar" style="background-color:#008000;" class="w3-margin-top w3-block w3-btn w3-text-white w3-round">Enviar <i class="fa fa-arrow-right"></i></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }	?>
				<div id="ExibirLinhaHome">
				<article class="w3-card">
					<div class="w3-margin-top w3-margin-bottom w3-padding-16" >
						<div class="w3-container w3-center" >
							<div class="w3-col s12 m6" >
								<div class="w3-hide-small">
									<img src="../img/fundo.jpg" id="teste" style="width:100%;height: 400px" />
								</div>
								<div class="w3-hide-medium w3-hide-large">
									<img src="../img/fundo.jpg" id="teste" style="width:100%;height: 200px" />
								</div>
							</div>
							<div class="w3-col s12 m6" >
								<h3>carregando... </h3>
									<div class="conteudoI">
									<p>carregando...</p>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<!-- slide -->
			<article class="w3-margin-bottom">
				<div class="w3-container">
					<div id="ExibirSlideHome" class="w3-content w3-display-container" style="max-width: 1000px;" id="slides">
					<?php
						require_once("../controle/ControleFotos.php");
						$controleFot = new ControleFotos();
						$resultado = $controleFot->SelecionarFotosHome();
						if($resultado != null){
							foreach ($resultado as $fots) {
						?>
							<img class="imgslide" style="width:100%;height:350px;max-height:500px;" src='<?php echo "../processos/Foto.php?id=$fots->id"; ?>' />
						<?php }
						}
						?>
						<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
							<div class="w3-left w3-hover-text-khaki" style="font-size:25px;" onclick="adslide(-1)">&#10094;</div>
							<div class="w3-right w3-hover-text-khaki" style="font-size:25px;" onclick="adslide(+1)">&#10095;</div>  
						</div>
					</div>
				</div>
			</article>
			</div>
			<aside>
				<!-- panel -->
				<div class="bgimg-2 w3-display-container w3-opacity-min">
				  <div class="w3-display-middle" style="white-space:nowrap;">
				    
				  </div>
				</div>
				<!-- /panel -->
			</aside>
			<!-- fim conteúdo -->
			</div>
		</div>
	</div>
	<div id="homescripts"></div>
</section>