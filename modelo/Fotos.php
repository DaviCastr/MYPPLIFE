<?php
    class Fotos{
        private $matricula;
        private $foto;
        private $id;

        public function getMatricula(){
            return $this->matricula;
        }
        public function setMatricula($matr){
            $this->matricula = $matr;
        }
        public function getFoto(){
            return $this->foto;
        }
        public function setFoto($fot){
            $this->foto = $fot;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($idt){
            $this->id = $idt;
        }
    }
?>