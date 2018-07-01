<?php 
require_once("Conexao.php");
class ControleUsuario{
	public function CadastrarUsuario($usuario){
		$retorno = false;
			try{
				$con = new Conexao();
				$sql = "INSERT INTO usuarios(nome,email,matricula,senha,pvisit) VALUES(:nome,:email,:matricula,:senha,:pvisit);";
				$nom = $usuario->getNome();
				$em = $usuario->getEmail();
				$matr = $usuario->getMatricula();
				$sen = $usuario->getSenha();
				$pvi = $usuario->getPvisit();
				$fas = $con->getCon()->prepare($sql);  
				$fas->bindParam("nome",$nom);
				$fas->bindParam("email",$em);
				$fas->bindParam("matricula",$matr);
				$fas->bindParam("senha",$sen);
				$fas->bindParam("pvisit",$pvi);
				if($fas->execute()){
					$retorno = true;
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno; 
	}

	public function AtualizarUsuario($usuario){
		$retorno = false;
			try{
				$con = new Conexao();
				$nome = $usuario->getNome();
				$email = $usuario->getEmail();
				$senha = $usuario->getSenha();
				$perfil = $usuario->getPerfil();
				$matricula = $usuario->getMatricula();
				$conf = "true";
				if ($usuario->getPerfil() != null) {
					$sql = "UPDATE usuarios SET nome=:nome,email=:email,senha=:senha,perfil=:perfil,confimg=:confimg WHERE matricula=:matricula;";
					$atua = $con->getCon()->prepare($sql);
					$atua->bindParam("nome",$nome);
					$atua->bindParam("email",$email);
					$atua->bindParam("senha",$senha);
					$atua->bindParam("perfil",$perfil,PDO::PARAM_LOB);
					$atua->bindParam("confimg",$conf);
					$atua->bindParam("matricula",$matricula);
					if ($atua->execute()) {
						$retorno = true;
					}
				}else{
					$sql = "UPDATE usuarios SET nome=:nome,email=:email,senha=:senha WHERE matricula=:matricula;";
					$atua = $con->getCon()->prepare($sql);
					$atua->bindParam("nome",$nome);
					$atua->bindParam("email",$email);
					$atua->bindParam("senha",$senha);
					$atua->bindParam("matricula",$matricula);
					if ($atua->execute()) {
						$retorno = true;
					}
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}

	public function SelecionarUsuario($usuario){
		$retorno = null;
			try{
				$con = new Conexao();
				$matri = $usuario->getMatricula();
				$sql = "SELECT nome,email,senha FROM usuarios WHERE matricula=:matricula";
				$selec = $con->getCon()->prepare($sql);
				$selec->bindParam("matricula",$matri);
				if($selec->execute()){
					$inf = $selec->fetch(PDO::FETCH_OBJ);
					$usuario->setNome($inf->nome);
					$usuario->setEmail($inf->email);
					$usuario->setSenha($inf->senha);
					$retorno = $usuario;
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno; 
	}

	public function VerificarEmail($email){
		session_start();
		$retorno = false;
			try{
				$sql = "SELECT email FROM usuarios WHERE email = :email;";
				$con = new Conexao();
				$verif = $con->getCon()->prepare($sql);
				$mail = $email->getEmail();
				$verif->bindParam("email",$mail);
				$verif->execute();
				if ($verif->rowCount() > 0) {
					if (isset($_SESSION['email_usuario'])) {
						if ($mail == $_SESSION['email_usuario']) {
							$retorno =false;
						}else{
							$retorno = true;
						}
					}else{
						$retorno = true;
					}

				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}

	public function VerificarMatricula($matricula){
		$retorno = false;
			try{
				$sql = "SELECT matricula FROM usuarios WHERE matricula = :matricula;";
				$con = new Conexao();
				$verif = $con->getCon()->prepare($sql);
				$matric = $matricula->getMatricula();
				$verif->bindParam("matricula",$matric);
				$verif->execute();
				if ($verif->rowCount() > 0) {
					$retorno = true;
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}

	public function Login($usuario){
		$retorno = null;
			try{
				$sql = "SELECT matricula,nome,confimg FROM usuarios WHERE email =:email AND senha =:senha;";
				$con = new Conexao();
				$log = $con->getCon()->prepare($sql);
				$logmail = $usuario->getEmail();
				$logsen = $usuario->getSenha();
				$log->bindParam("email",$logmail);
				$log->bindParam("senha",$logsen);
				if($log->execute()){
					if ($log->rowCount() > 0) {
						$inf = $log->fetch(PDO::FETCH_OBJ);
						if ($inf->matricula==3663706) {
							$_SESSION['admin_usuario'] ="true";
						}
						$usuario->setConfImg($inf->confimg);
						$usuario->setNome($inf->nome);
						$usuario->setMatricula($inf->matricula);
						$retorno = $usuario;
					}
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}

	public function VerificarVisita($visitante){
		$retorno = false;
			try{
				$con = new Conexao();
				$sql = "SELECT pvisit FROM usuarios WHERE matricula=:matricula;"; 
				$veps = $con->getCon()->prepare($sql);
				$matri = $visitante->getMatricula();
				$veps->bindParam("matricula",$matri);
				if($veps->execute()){
					$vep = $veps->fetch(PDO::FETCH_OBJ);
					if ($vep->pvisit == "true") {
						$retorno = true;
					}
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}
	public function AtualizaVisita($visitante){
		$retorno = false;
			try{
				$con = new Conexao();
				$sql = "UPDATE usuarios SET pvisit=:pvisit WHERE matricula=:matricula;";
				$atups = $con->getCon()->prepare($sql);
				$visit = $visitante->getPvisit();
				$matri = $visitante->getMatricula();
				$atups->bindParam("pvisit",$visit);
				$atups->bindParam("matricula",$matri);
				if($atups->execute()){
					$retorno = true;
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}

	public function InserirColega($colega){
		$retorno = false;
			try{
				$sql = "INSERT INTO colegas(matricula,descricao,foto) VALUES(:matricula,:descricao,:foto)";
				$con = new Conexao();
				$intC = $con->getCon()->prepare($sql);
				$intC->bindParam("matricula",$colega->getMatricula());
				$intC->bindParam("descricao",$colega->getDescricao());
				$intC->bindParam("foto",$colega->getFoto(),PDO::PARAM_LOB);
				if($intC->execute()){
					$retorno = true; 
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}

	public function SelecionarColega(){
		$retorno = null;
			try{
				$sql = "SELECT confimg,matricula,nome,id FROM usuarios;";
				$con = new Conexao();
				$seleC = $con->getCon()->query($sql,PDO::FETCH_OBJ);
				$retorno = $seleC;
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}
	public function Perfil($usuario){
		$retorno = null;
			try{
				$con = new Conexao();
				$matr = $usuario->getMatricula();
				$sql="SELECT perfil FROM usuarios WHERE matricula=:matricula;";
				$preparar= $con->getCon()->prepare($sql);
				$preparar->bindParam("matricula",$matr);
				$preparar->execute();
				$preparar->bindColumn(1,$img,PDO::PARAM_LOB);
				$arquivo= $preparar->fetch(PDO::FETCH_BOUND);
				$retorno = $img;
			}catch(PDOException $p){
					$arq = fopen("console.log","w");
					fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}
	public function SelecionarColegaMat($colega){
		$retorno = null;
			try{
				$sql = "SELECT confimg,matricula,nome,id FROM usuarios WHERE matricula=:matricula;";
				$con = new Conexao();
				$matricula = $colega->getMatricula();
				$seleC = $con->getCon()->prepare($sql);
				$seleC->bindParam("matricula",$matricula);
				if($seleC->execute()){
					$retorno = $seleC->fetch(PDO::FETCH_OBJ);
				}
			}catch(PDOException $p){
				$arq = fopen("console.log","w");
				fwrite($arq,$p->getMessage());
			}catch(Exception $e){
				$arq = fopen("console.log","w");
				fwrite($arq,$e->getMessage());
			}
		return $retorno;
	}
}
?>