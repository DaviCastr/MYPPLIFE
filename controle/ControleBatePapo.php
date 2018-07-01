<?php 
/**
 * 
 */
require_once("Conexao.php");
class ControlBatePapo
{
	public function InserirMensagem($batepapo){

	$retorno = false;
	    try {
		    $con = new Conexao();
			$sql = "INSERT INTO batepapo(matriculaEnv,matriculaRec,mensagem,hora,data) VALUES(:matriculaEnv,:matriculaRec,:mensagem,:hora,:data);";
			$idEnv=$batepapo->getMatriculaUser();
			$idRec=$batepapo->getMatriculaAm();
			$mensagem =$batepapo->getMensagem();
			$hora=$batepapo->getHora();
			$data=$batepapo->getData();
			$gravar = $con->getCon()->prepare($sql);
			$gravar->bindParam("matriculaEnv",$idEnv);
			$gravar->bindParam("matriculaRec",$idRec);
			$gravar->bindParam("mensagem",$mensagem);
			$gravar->bindParam("hora",$hora);
			$gravar->bindParam("data",$data);
			$gravar->execute();
			$retorno = true;
		} catch (PDOException $e) {
	    	echo $e->getMessage();
	    	$retorno = false;
	    } catch (Exception $er) {
	    	echo $er->getMessage();
	    	$retorno = false;
	    }
	return $retorno;
	}

	public function SelecionarMensagens($batepapo){
		$retorno = null;
		try {
			$con = new Conexao();
			$matriculaUser = $batepapo->getMatriculaUser();
			$matriculaAm = $batepapo->getMatriculaAm(); 
			$sql ="SELECT mensagem,matriculaEnv,hora,matriculaRec,id FROM batepapo WHERE matriculaEnv = '{$matriculaUser}' AND matriculaRec = '{$matriculaAm}' OR matriculaEnv = '{$matriculaAm}' AND matriculaRec = '{$matriculaUser}' ORDER BY id ASC;"; 
			$retorno = $con->getCon()->query($sql, PDO::FETCH_OBJ);			
		}catch(PDOException $p){
			echo $p->getMessage();
			$retorno = null;
		} catch (Exception $e) {
			echo $e->getMessage();
			$retorno = null;
		}
	return $retorno;
	}
}
?>