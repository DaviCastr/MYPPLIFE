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
<section style="margin-top: 5%;margin-bottom: 5%;">
    <div class="w3-container">
    <div class="w3-row">
		<div style="position:relative;background:#008000;" class="w3-hide-small w3-col s12 m2 l2 w3-card-4 w3-left w3-padding">
			<div class="" style="margin-bottom:5px;height:450px" id="contposts">
				<div class="w3-card w3-orange w3-round">
					
				</div>
			</div>
		</div>
		<div class="w3-col s12 m8 l8" >
        <article style="max-width: 700px;margin-left: auto;margin-right: auto;" class="w3-center w3-card-4 w3-light-grey">
            <div class="w3-car">
                <header class="w3-container w3-center w3-padding-32" style="background-color: #008000;"> 
                    <h2 class="w3-wide w3-text-white">Informações</h2>
                </header>
                <aside>
                    <div class="w3-row  w3-center">
                        <div class="w3-margin-bottom">   
                            <div class="w3-container w3-center">
                            <h3 class="w3-col s12 m12 l12"><?php echo $_SESSION['nome_usuario']; ?>  </h3>
                            <div class="w3-col s12 m6 l6 w3-center">
                            <?php if (empty ($_SESSION ['confimg'])){ ?>
                                <img src="../img/papel.jpg" class="w3-round w3-circle  w3-padding" style="width:250px;height:250px;margin-left:auto;margin-right:auto;">
                            <?php }else { ?>
                            	<img src="../processos/Perfil.php" class=" w3-round w3-padding" style="min-width:200px;max-width:250px;height:250px;border-radius:50%;margin-left:auto;margin-right:auto;">
                            <?php } ?>
                            </div>
                            <div class="w3-col s12 m6 l6 w3-center" style="margin-top:10%;">
                                <div class="">
                                    <h5>Matricula:</h5>
                                    <h4> <?php echo $resultado->getMatricula(); ?></h4>
                                    <h5>Email:</h5>
                                    <h4><?php echo $resultado->getEmail(); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </article>
        </div>
		<div style="background:#d77600;" class="w3-hide-small w3-col s12 m2 l2 w3-card-4 w3-right w3-padding">
			<div class="" style="margin-bottom:5px;min-height:450px;">
				
			</div>
		</div>
	</div>
</div>
</section>