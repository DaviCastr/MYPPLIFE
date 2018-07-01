<?php 
session_start();
if (!isset($_SESSION['nome_usuario']) OR !isset($_SESSION['matricula_usuario'])) {
	header("Location: ../");	
}else{
	require_once("../modelo/Usuario.php");
	require_once("../controle/ControleUsuario.php");
	$Usuario = new Usuario();
	$controle = new ControleUsuario();
	$Usuario->setMatricula($_SESSION['matricula_usuario']);
	$resultado = $controle->SelecionarUsuario($Usuario);
	$_SESSION['email_usuario'] = $resultado->getEmail();
}

?>
<section  style="margin-top: 5%;margin-bottom: 5%;">
	<div class="w3-container">
	<div class="w3-row">
		<div style="position:relative;background:#008000;" class="w3-hide-small w3-col s12 m2 l2 w3-card-4 w3-left w3-padding">
			<div class="" style="margin-bottom:5px;height:740px" id="contposts">
				<div class="w3-card w3-orange w3-round">
					
				</div>
			</div>
		</div>
		<div class="w3-col s12 m8 l8" >
			<article style="max-width: 700px;margin-left: auto;margin-right: auto;" class="w3-center w3-card-4 w3-light-grey">
				<header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
					<h2 class="w3-wide w3-text-white">Editar Conta</h2>
				</header>
				<div class="w3-center">
					<img src="../img/FotoMais.jpg" id="ImgPErfilMUd" class="w3-circle w3-border" style="margin-top:7px;width:200px;height:200px;" alt="">
				</div>  
				<div id="EditarPerfil"></div>
				<form action="#editarCont" id="" name="editarConta" method="post" class="w3-container w3-text-grey w3-margin">
					<div class="w3-row w3-center w3-section">
						<label class="w3-center w3-btn w3-text-white" style="background-color: #d77600;" for="Perfilnovo"><i class="fa fa-image"></i> Foto do Perfil</label>
						<input id="Perfilnovo" style="color: green;display:none" name="Mperfil" type="file">
					</div> 
					<div class="w3-row w3-section">
						<label class="w3-left"><i class="fa fa-user"></i> Nome</label>
						<input class="w3-input w3-border" value="<?php echo $resultado->getNome(); ?>" name="nome" type="text" placeholder="Seu Nome">
					</div>
					<div class="w3-row w3-section">
						<label class="w3-left"><i class="fa fa-envelope"></i> E-mail</label>
						<input class="w3-input w3-border" value="<?php echo $resultado->getEmail(); ?>" name="email" type="email" placeholder="Email">
						<span class="w3-left w3-margin-left" id="retEmail"></span>
					</div >
					<div class="w3-row w3-section">
						<label class="w3-left"><i class="fa fa-lock "></i> Senha</label> 
						<input class="w3-input w3-border" value="<?php echo $resultado->getSenha(); ?>" name="senha" type="password" placeholder="Sua Senha">
					</div>
					<div id="execEditarconta"></div>
					<button type="submit" name="envio" class="w3-btn w3-block w3-section w3-text-white w3-ripple w3-padding" style="background-color: #d77600;">Salvar <i class="fa fa-check"></i></button>
				</form>
			</article>
		</div>
		<div style="background:#d77600;" class="w3-hide-small w3-col s12 m2 l2 w3-card-4 w3-right w3-padding">
			<div class="" style="margin-bottom:5px;min-height:740px;">
				
			</div>
		</div>
	</div>
</div>
</section>
<div id="ediscript"></div>