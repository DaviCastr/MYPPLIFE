<?php	
session_start();
	require_once("../controle/ControleUsuario.php");
	require_once("../modelo/Usuario.php");
	$visitante = new Usuario();
	$visitante->setMatricula($_SESSION['matricula_usuario']);
	$ControlV = new ControleUsuario();
	if ($ControlV->VerificarVisita($visitante)) {
		$visitante->setPvisit("false");
		if ($ControlV->AtualizaVisita($visitante)) {
	 	?>
		<div id="PVisitante" class="w3-modal">
    		<div class="w3-modal-content w3-animate-top w3-card-4" style="max-width: 600px;">
		      <header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
		        <span onclick="document.getElementById('PVisitante').style.display='none'" 
		       class="w3-button w3-text-white  w3-xlarge w3-display-topright">×</span>
		        <h2 class="w3-wide w3-text-white">Bem Vindo</h2>
		        <h3 class="w3-wide w3-text-white"><?php echo strtoupper($_SESSION['nome_usuario']); ?></h3>
		      </header>
		      <div class="w3-container">
		      	<p class="w3-text-black">
		      		"Compartilhe comigo suas experiências, Poste os melhores acontecimentos, e obrigado por estar presente na minha vida durante esses 3 anos!"
		      	</p>
		      </div>
		    </div>
		 </div>
	 	<?php
	 	}
	 } 
?>