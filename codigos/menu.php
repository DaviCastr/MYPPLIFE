<header id="toppo">
	<nav>
		<div class="w3-top">
			<div class="w3-bar w3-text-white" id="Menu">
				<!-- meus links -->
				<a class="w3-bar-item w3-button w3-hover-black w3-hide-large w3-left" href="javascript:void(0);" onclick="AbMenuFunction()" title="Toggle Navigation Menu">
      				<i class="fa fa-bars"></i>
    			</a>
				<!-- Principal -->
				<div class="w3-hide-large w3-center">
					<a class="w3-bar-item w3-button"> MYPPLIFE</a>
				</div>	
				<div class="w3-hide-medium w3-hide-small">
					<a class="w3-bar-item w3-button"> MYPPLIFE</a>
					<a href="#Inicio" id="HomePc" class="w3-bar-item w3-round w3-btn"><i class="fa fa-home"></i> HOME</a>
					<a href="#fotos" id="Fotos" class="w3-bar-item w3-round w3-btn"><i class="fa fa-th"></i> FOTOS</a>
					<a href="#postagens" id="Postagens" class="w3-bar-item w3-round w3-btn"><i class="fa fa-user"></i> POSTAGENS</a>
   					<a href="#contato" class="w3-bar-item w3-round w3-btn"><i class="fa fa-envelope"></i> CONTATO</a>
   					<?php if (isset($_SESSION['matricula_usuario']) AND isset($_SESSION['nome_usuario'])) {?>
			   		<a href="#usuario"  id="UsuarioPc"  class="w3-center w3-right w3-bar-item w3-btn w3-round"><i class="fa fa-user"></i> <?php echo $_SESSION['nome_usuario']; ?></a>
			   			<div class="w3-sidebar w3-card-4 w3-animate-right w3-bar-block w3-border-right" id="MenuUserPc">
								<a id="FecharMenuConta" class="w3-large w3-button">&times;</a>
								<div id="menuUser">
								<?php if (empty($_SESSION['confimg'])) { ?>
									<img class="w3-circle img" id="imgusermud" src="../img/papel.jpg">
								<?php }else{?>
									<img class="w3-circle img" id="imgusermud" src="../processos/Perfil.php">
								<?php } ?>
								<a href="#Usuario" class="w3-center w3-bar-item w3-btn"><?php echo $_SESSION['nome_usuario']; ?></a>
								</div>
							<a href="#Conta" id="ContaPc" class="w3-bar-item w3-btn"><i class="fa fa-user-circle"></i> CONTA</a>
							<a href="#Editar Conta" id="EditarConta"  class="w3-bar-item w3-btn"><i class="fa fa-user-edit"></i> EDITAR CONTA</a>
							<a href="#batepapo" id="BatePapoPcLink" class="w3-bar-item w3-btn"><i class="fa fa-user"></i> BATE PAPO</a>
							<a href="#sair" id="Sair" class="w3-bar-item w3-btn"><i class="fa fa-sign-out-alt"></i> Sair</a>
							<div id="Logout"></div>
						</div>
						<div class="w3-sidebar w3-card-4 w3-animate-right w3-bar-block w3-border-right" id="BatePapoPc">
								<a onclick="document.getElementById('BatePapoPc').style.display='none'" class="w3-large w3-button">&times;</a>
								<h3 class="w3-center w3-text-white">BATE PAPO</h3>
								<div id="PessoasBatepapoPc">
															
								</div>
						</div>
   					<?php
   					}else{ 
   					?>
							<a href="#Cadastro" id="ForPcCadastro" class="w3-center w3-bar-item w3-btn w3-round"><i class="fa fa-user"></i> CADASTRO</a>
							<a href="#Login" id="ForPcLogin" class="w3-bar-item w3-btn w3-right w3-round" onclick="document.getElementById('Login').style.display='block'"><i class="fa fa-user"></i> ACESSO</a>
    				<?php
    				}
    				?>
    			</div>
			</div>
			<!-- mbile-->
			<div class="w3-sidebar w3-border w3-text-white w3-top w3-bar-block w3-card w3-animate-zoom" id="MMenu">
			  <button onclick="ClMenu()" class="w3-button w3-large w3-left"><i class="fa fa-bars"></i></button>
			  <!-- links -->
			  	<div class="w3-row">
			  			<div class="w3-col s12 w3-hide-medium w3-hide-large" >
					  		<img class="w3-center imgLogo w3-block" src="../img/Logo3.png">
						</div>
						<div class="w3-col m8 w3-hide-small" >
							<img class="w3-center imgLogoM" src="../img/Logo3.png">
						</div>
						<div class="w3-col s12 m12">
						<?php if (isset($_SESSION['matricula_usuario']) AND isset($_SESSION['nome_usuario'])){ ?>
								<a href="#usuario" id="UsuarioMob" class="w3-center w3-bar-item w3-btn w3-round"><i class="fa fa-user"></i> <?php echo $_SESSION['nome_usuario']; ?></a>
								<div style="overflow:auto;" class="w3-top w3-sidebar w3-card-4 w3-animate-top w3-bar-block w3-border-right" id="MenuUserMob">
									<a id="FecharMenuContaM" class="w3-large w3-button">&times;</a>
									<div id="menuUserM">
										<?php if (empty($_SESSION['confimg'])) { ?>
											<img class="w3-circle img" id="imgusermud" src="../img/papel.jpg">
										<?php }else{?>
											<img class="w3-circle img" id="imgusermud" src="../processos/Perfil.php">
										<?php } ?>
										<a href="#Usuario" class="w3-center w3-bar-item w3-btn"><?php echo $_SESSION['nome_usuario']; ?></a>
									</div>
									<a href="#Conta" id="ContaMob" class="w3-bar-item w3-btn"><i class="fa fa-user-circle"></i> Conta</a>
									<a href="#Editar Conta" id="EditarContaM"  class="w3-bar-item w3-btn"><i class="fa fa-user-edit"></i> Editar Conta</a>
									<a href="#batepapo" id="BatePapoMobLink" class="w3-bar-item w3-btn"><i class="fa fa-user"></i> Bate Papo</a>
									<a href="#sair" id="SairM" class="w3-bar-item w3-btn"><i class="fa fa-sign-out-alt"></i> Sair</a>
									<div id="LogoutM"></div>
								</div>
								<div class="w3-top w3-sidebar w3-card-4 w3-animate-top w3-bar-block w3-border-right" id="BatePapoMob">
									<a onclick="document.getElementById('BatePapoMob').style.display='none'" class="w3-large w3-button">&times;</a>
									<div id="PessoasBatepapoMob">
									
									</div>
								</div>
							<?php } ?>
								<a href="#Inicio" id="HomeMob" class="w3-center w3-bar-item w3-btn"><i class="fa fa-home"></i> HOME</a>
								<a href="#fotos" id="FotosMob" class="w3-center w3-bar-item w3-btn"><i class="fa fa-th"></i> FOTOS</a>
								<a href="#postagens" id="PostagensMob" class="w3-center w3-bar-item w3-btn"><i class="fa fa-user"></i> POSTAGENS</a>
								<a href="#contato" onclick="ClMenu()" class="w3-center w3-bar-item w3-btn"><i class="fa fa-envelope"></i> CONTATO</a>
								<?php if (!isset($_SESSION['matricula_usuario']) AND !isset($_SESSION['nome_usuario'])) {
								?>
								<a href="#" id="ForCadastro" class="w3-center w3-bar-item w3-btn"><i class="fa fa-user"></i> CADASTRO</a>
								<a href="#" id="ForLogin" onclick="document.getElementById('Login').style.display='block'" class="w3-center w3-bar-item w3-btn"><i class="fa fa-user"></i> ACESSO</a>
								<?php 
								}
								?>
						</div>
					</div>
				</div>
			<!-- mbile -->
		</div>
	</nav>
	<div class=" w3-bottom">
		<a href="#toppo" id="topo" class="w3-btn w3-right w3-green w3-circle"><i class="fa fa-arrow-up"></i></a>
	</div> 
	<!-- papel -->
	<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
	  <div class="w3-display-middle" style="white-space:nowrap;">
	    <span class="w3-center w3-padding-large w3-xlarge w3-wide w3-animate-opacity w3-text-white" style="background:#559E54;">3º <span class="w3-hide-small w3-text-white">Informática</span> 2018</span>
	  </div>
	</div>
	<!-- /papel -->

<!-- <Login> -->
  <div id="Login" class="w3-modal">
    <div class="w3-modal-content w3-animate-bottom w3-card-4" style="max-width: 500px;">
      <header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
        <span onclick="document.getElementById('Login').style.display='none'" 
       class="w3-button w3-text-white w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide w3-text-white"><i class="fa fa-suitcase w3-margin-right"></i>ACESSO</h2>
      </header>
      <div class="w3-container">
      	<form action="#" method="post" name="formlogin">
	        <p><label><i class="fa fa-user"></i> Email</label></p>
	        <input class="w3-input w3-border w3-hover-border-green" name="email" type="email" placeholder="Dígite seu Email">
	        <p><label><i class="fa fa-user"></i>Senha</label></p>
	        <input class="w3-input w3-border w3-hover-border-green" required name="senha" type="password" placeholder="Dígite sua Senha">
	        <span id="retlog"></span>
	        <button type="submit" name="envio" style="background-color: #d77600;" class="w3-btn w3-block w3-padding-16 w3-text-white w3-section w3-right">Entrar <i class="fa fa-check"></i></button>
	        <!-- <p class="w3-right">Porque ter Conta <a href="#" class="w3-text-blue">Ajuda?</a></p> -->
	    </form>
      </div>
    </div>
  </div>
  <!-- <Cadastro> -->
  <div id="Cadastro" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4" style="max-width: 600px;">
      <header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
        <span onclick="document.getElementById('Cadastro').style.display='none'" 
       class="w3-button w3-text-white  w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide w3-text-white"><i class="fa fa-suitcase w3-margin-right"></i>Cadastro</h2>
      </header>
      <div class="w3-container">
      	<div class="w3-card w3-padding w3-margin-top">
      		<span class="w3-text-red">Obs:esse cadastro só será aceito para alunos!</span>
      	</div>
      	<form action="#" name="formcadastro" method="post">
      		<div class="w3-row">
      			<div class="w3-col s12 m6 l6" style="padding-left: 4px">
		        	<p><label><i class="fa fa-user"></i> Nome</label></p>
		        	<input class="w3-input w3-border w3-hover-border-green"  autocomplete="off" id="myname" required name="nome" type="text" placeholder="Seu Nome">
		        </div>
		        <div class="w3-col s12 m6 l6" style="padding-left: 4px">
		        	<p><label><i class="fa fa-user"></i> Matricula</label></p>
		        	<input class="w3-input w3-border w3-hover-border-green"  autocomplete="off" name="matricula" required type="text" placeholder="Número da Matricula">
		        	<span id="retmat"></span>
		        </div>
		        <div class="w3-col s12 m12 l12" style="padding-left: 4px">
		        	<p><label><i class="fa fa-user"></i> E-mail</label></p>
		        	<input class="w3-input w3-border w3-hover-border-green" autocomplete="off" name="email" required type="email" placeholder="Enter email">
		        	<span id="retemail"></span>
		        </div>
		        <div class="w3-col s12 m6 l6" style="padding-left: 4px">
		        	<p><label><i class="fa fa-user"></i> Senha</label></p>
		        	<input class="w3-input w3-border w3-hover-border-green" name="senha" required type="password" placeholder="Criar Senha">
		        </div>
		        <div class="w3-col s12 m6 l6" style="padding-left: 4px">
		        	<p><label><i class="fa fa-user"></i> Confirmar Senha</label></p>
		        	<input class="w3-input w3-border w3-hover-border-green" name="csenha" required type="password" placeholder="Confirmar Senha">
		        </div>
		        <div class="w3-col s12">
		        	<span id="valid"></span>
		        </div>
		        <button type="submit" name="envio" style="background-color: #d77600;" class="w3-text-white w3-btn w3-block w3-padding-16 w3-section w3-right">Cadastrar <i class="fa fa-check"></i></button>
	        </div>
	    </form>
      </div>
    </div>
  </div>

  
<!--</ Cadastro >-->
<!--< visita >-->
<?php 
if (isset($_SESSION['nome_usuario']) AND isset($_SESSION['matricula_usuario'])) {
?>
<div id="BataPapoModal" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 400px;margin-top:2%;">
		<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
			<span id="FecharBatepapo" onclick="clearInterval(intervaloBatePapo); document.getElementById('BataPapoModal').style.display = 'none';" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
			<h3 id="ColocarColega" class="w3-center w3-text-white">Bate Papo</h3>
		</header>
		<div class="w3-container">
			<div class="w3-light-grey w3-padding">
				<div class="w3-center">
					<div class="w3-row">
						<div  class="w3-center w3-col s12 m12 l12 w3-margin-bottom">
							<div id="divform">
										<!-- bate papo -->
									<div class='cell small-12'>
										<div id='ConversaBatePapo'>
											
										</div>
									</div>
									<div id="formb"></div>
							</div>
							<form action="#" method="post" name="FormularioDeBatepapo">
								<div class="w3-row">
									<div class="w3-col s9 m9 l10">
										<input type="hidden" id="mudarMatricula" name='matricula'>
										<input type="text" maxlength="200" autocomplete="off" class="inputcoment w3-input w3-border w3-round" placeholder="Comentário" name="mensagem">
									</div>
									<div class=" w3-col s3 m3 l2">
										<button type="submit" name="enviarC" class="w3-orange w3-right w3-text-white w3-btn w3-circle"><i class="fa fa-arrow-right"></i></button>
									</div>
								</div>
							</form>
							<div id="enviarMensagem"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<article>
	<div id="pvisittrue"></div>
</article>
<?php
}
?>
<div id="AvisoComunicacao" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-4" style="max-width: 400px;margin-top:2%;">
		<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
			<span onclick="document.getElementById('AvisoComunicacao').style.display = 'none';" class="w3-btn w3-text-white w3-xlarge w3-display-topright">×</span>
			<h3 id="ColocarColega" class="w3-center w3-text-white">Aviso!</h3>
		</header>
		<div class="w3-container">
			<div class="w3-light-grey w3-padding">
				<div class="w3-center">
					<div class="w3-row">
						<div  class="w3-center w3-col s12 m12 l12 w3-margin-bottom">
							<h3 class="w3-center">Verifique sua conexão com a internet!</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>