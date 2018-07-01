<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title><?php if(isset($_SESSION['nome_usuario'])){echo $_SESSION['nome_usuario'];}else{ ?>MYPPLIFE<?php } ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="icon" type="icon/jpg" href="../img/papel.jpg">
<link rel="stylesheet" type="text/css" href="../css/framework.css">
<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="../font/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="../css/appmenu.css">
<link rel="stylesheet" id='mud' type="text/css" href="../css/apphome.css">
<script type="text/javascript" src="../js/processos/ajax.js"></script>
<body>
<?php	
if (isset($_SESSION['nome_usuario']) AND isset($_SESSION['matricula_usuario'])) {
	$nome_usuario = $_SESSION['nome_usuario'];
	$matricula_usuario = $_SESSION['matricula_usuario'];
}
require_once("../codigos/menu.php");
?>
<div id="contaja">
</div>
<?php
require_once("../codigos/contato.php");
require_once("../codigos/footer.php");
?>
</body>
<script type="text/javascript" src="../js/processos/init.js"></script>
<?php if (!isset($_SESSION['nome_usuario']) AND !isset($_SESSION['matricula_usuario'])) {?>
<script type="text/javascript" src="../js/modelo/Infor.js"></script>
<script type="text/javascript" src="../js/controle/Controlinfor.js"></script>
<script type="text/javascript" src="../js/processos/appmenu.js"></script>
<?php }else{ ?>
<script type="text/javascript" src="../js/modelo/InforInnit.js"></script>
<script type="text/javascript" src="../js/controle/ControleInnit.js"></script>
<?php } ?>
<script type="text/javascript" src="../js/processos/appcontato.js"></script>
<script type="text/javascript" src="../js/processos/menu.js"></script>
</html> 