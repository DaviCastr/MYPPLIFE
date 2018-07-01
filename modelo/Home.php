<?php
class Home{
    private $id;
    private $nome;
    private $imagem;
    private $posicao;
    private $descricao;

    public function getId(){
        return $this->id;
    }
    public function setId($idnov){
        $this->id = $idnov;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nnovo){
        $this->nome = $nnovo;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imgnov){
        $this->imagem = $imgnov;
    }
    public function getPosicao(){
        return $this->posicao;
    }
    public function setPosicao($posinov){
        $this->posicao = $posinov;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descnov){
        $this->descricao = $descnov;
    }
} 
?>