<?php
session_start();
if(isset($_GET['matricula']) AND isset($_SESSION['matricula_usuario'])){
    require_once("../controle/ControleBatePapo.php");
    require_once("../modelo/BatePapo.php");
    $usuario = $_SESSION['matricula_usuario'];
	$amigo = $_GET['matricula'];
	$batepapo = new BatePapo();
	$batepapo->setMatriculaUser($usuario);
	$batepapo->setMatriculaAm($amigo);
    $controle = new ControlBatePapo();
    $mensagens = $controle->SelecionarMensagens($batepapo);
    foreach ($mensagens as $m) {
		if ($usuario == $m->matriculaEnv) {
		?>
			<div class='w3-col s12 m12 l12 w3-right'>
				<div id='balaoU' class='w3-col s12 m9 l7 w3-right'>
					<p class='w3-black-white mensagemU w3-right'>
						<?php echo chunk_split($m->mensagem, 23); ?>
					<span class="w3-right w3-text-grey hora"><?php echo $m->hora; ?></span>
					</p>
				</div>
			</div>
		<?php	
		}else{
		?>
			<div class='w3-col s12 m12 l12 w3-left'>
				<div id='balaoR' class='w3-col s12 m9 l7 w3-left'>
					<p class='w3-text-black mensagemR w3-left'>
						<?php echo chunk_split($m->mensagem, 23); ?>
					 <span class="w3-text-grey w3-right  hora"><?php echo $m->hora; ?></span>		
					</p>
				</div>
			</div>
		<?php
		}
	 } 
}
?>
    </div>
</div>