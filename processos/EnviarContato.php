<?php
if(isset($_POST['nome']) AND isset($_POST['mensagem']) AND isset($_POST['email'])){
    
    ini_set('display_errors', 1);
    
    error_reporting(E_ALL);
    
    // $From = "Davi Site Informática";
    
    $to = "davifgeo@gmail.com";
    
    $subject = "Novo Contato Davi";
    
    $message ="<h3>".$_POST['nome']."</h3><br /><h4>".$_POST['email']."</h4><br /> <p>".$_POST['mensagem']."</p> ";
    $email="davi@ntectreinamentos.com.br";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "From:  <$email>"; 
    if(mail($to, $subject, $message, $headers)){
        echo "<div class='w3-text-green w3-white w3-center'>Mensagem Enviada</div>";
    }else{
        echo "<div class='w3-text-red w3-white w3-center'>Erro ao Enviar Mensagem</div>";
    }
}
?>