<?php
session_start(); 
if (isset($_SESSION['nome_usuario']) AND isset($_SESSION['matricula_usuario'])) {
	session_destroy();
	echo "<span id='logUt'></span>";
}
?>