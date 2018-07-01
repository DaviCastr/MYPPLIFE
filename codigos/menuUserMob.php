<?php session_start(); if (empty($_SESSION['confimg'])) { ?>
    <img class="w3-circle img" src="../img/papel.jpg">
	<?php }else{?>
		<img class="w3-circle img" id="imgusermud" src="../processos/Perfil.php">
	<?php } ?>
    <a href="#Usuario" class="w3-center w3-bar-item w3-btn"><?php echo $_SESSION['nome_usuario']; ?></a>