<?php 
/**
 * 
 */
class BatePapo
{
	private $matriculauser;
	private $matriculaam;
	private $hora;
	private $data;
	private $mensagem;

	public function getMatriculaUser(){
		return $this->matriculauser;
	}

	public function setMatriculaUser($iduser){
		$this->matriculauser = $iduser;
	}

	public function getMatriculaAm(){
		return $this->matriculaam;
	}

	public function setMatriculaAm($idam){
		$this->matriculaam = $idam;
	}

	public function getMensagem(){
		return $this->mensagem;
	}

	public function setMensagem($mensagem){
		$this->mensagem = $mensagem;
	}

	public function getHora(){
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}
}
?>