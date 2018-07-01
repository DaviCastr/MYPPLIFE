<?php 
class Usuario{
	private $id;
	private $nome;
	private $email;
	private $matricula;
	private $nascimento;
	private $senha;
	private $pvisit;
	private $descricao;
	private $perfil;
	private $confimg;

	public function getId(){
		return $this->id;
	}
	public function setId($ida){
		$this->id = $ida;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nom){
		$this->nome = $nom;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($em){
		$this->email = $em;
	}
	public function getMatricula(){
		return $this->matricula;
	}
	public function setMatricula($matri){
		$this->matricula = $matri;
	}
	public function getNascimento(){
		return $this->nascimento;
	}
	public function setNascimento($nasc){
		$this->nascimento = $nasc;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($sen){
		$this->senha = $sen;
	}
	public function getPvisit(){
		return $this->pvisit;
	}
	public function setPvisit($pvi){
		$this->pvisit = $pvi;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descr){
		$this->descricao = $descr;
	}
	public function getPerfil(){
		return $this->perfil;
	}
	public function setPerfil($fot){
		$this->perfil = $fot;
	}
	public function getConfImg(){
		return $this->confimg;
	}
	public function setConfimg($conf){
		$this->confimg = $conf;
	}
}
?>