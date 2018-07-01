<?php 
class Postagem{
	private $id;
	private $matricula;
	private $data;
	private $hora;
	private $descricao;
	private $arquivo;
	private $curtidas;
	private $comentario;
	
	public function getId (){
		return $this->id;
	}
	public function setId ($ide){
		$this->id = $ide;
	}
	public function getMatricula (){
		return $this->matricula;
	}
	public function setMatricula ($matri){
		$this->matricula = $matri;
	}
	public function getData (){
		return $this->data;
	}
	public function setData ($dat){
		$this->data = $dat;
	}
	public function getHora (){
		return $this->hora;
	}
	public function setHora ($hor){
		$this->hora = $hor;
	}
	public function getDescricao (){
		return $this->descricao;
	}
	public function setDescricao ($descri){
		$this->descricao = $descri;
	}
	public function getArquivo (){
		return $this->arquivo;
	}
	public function setArquivo ($arq){
		$this->arquivo = $arq;
	}
	public function getCurtidas (){
	    return $this->curtidas;
	}
	public function setCurtidas ($curtids){
	    $this->curtidas = $curtids;
	}
	public function getComentario (){
	    return $this->comentario;
	}
	public function setComentario ($com){
	    $this->comentario = $com;
	}
}
?>