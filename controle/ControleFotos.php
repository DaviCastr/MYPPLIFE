<?php
require_once("Conexao.php");
    class ControleFotos{
        public function InserirFoto($foto){
            $retorno = false;
            try{
                $con = new Conexao();
                $sql = "INSERT INTO fotos(foto,matricula) VALUES(:foto,:matricula);";
                $img = $foto->getFoto();
                $matricula = $foto->getMatricula();
                $InsereF = $con->getCon()->prepare($sql);
                $InsereF->bindParam("foto",$img,PDO::PARAM_LOB);
                $InsereF->bindParam("matricula",$matricula);
                if ($InsereF->execute()) {
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
        public function SelecionarFotos(){
            $retorno = null;
            try{
                $con = new Conexao();
                $sql = "SELECT fotos.id,nome,fotos.matricula FROM fotos INNER JOIN usuarios ON usuarios.matricula = fotos.matricula ORDER BY fotos.id DESC;";
                $SelecionaF = $con->getCon()->query($sql, PDO::FETCH_OBJ);
                    $retorno = $SelecionaF;
            }catch(PDOException $p){
			$arq = fopen("console.log","w");
			fwrite($arq,$p->getMessage());
            }catch(Exception $e){
                $arq = fopen("console.log","w");
                fwrite($arq,$e->getMessage());
            }
		return $retorno;
        }
        public function SelecionarFotosHome(){
            $retorno = null;
            try{
                $con = new Conexao();
                $sql = "SELECT fotos.id,nome,fotos.matricula FROM fotos INNER JOIN usuarios ON usuarios.matricula = fotos.matricula ORDER BY fotos.id DESC LIMIT 10;";
                $SelecionaF = $con->getCon()->query($sql, PDO::FETCH_OBJ);
                    $retorno = $SelecionaF;
            }catch(PDOException $p){
			$arq = fopen("console.log","w");
			fwrite($arq,$p->getMessage());
            }catch(Exception $e){
                $arq = fopen("console.log","w");
                fwrite($arq,$e->getMessage());
            }
		return $retorno;
        }
        public function Foto($foto){
            $retorno = null;
                try{
                    $con = new Conexao();
                    $idF = $foto->getId();
                    $sql="SELECT foto FROM fotos WHERE id=:id;";
                    $preparar= $con->getCon()->prepare($sql);
                    $preparar->bindParam("id",$idF);
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
        public function ExcluirFoto($foto){
            $retorno = false;
            try{
                $con = new Conexao();
                $sql = "DELETE FROM fotos WHERE id=:id";
                $id = $foto->getId();
                $ExcluirF = $con->getCon()->prepare($sql);
                $ExcluirF->bindParam("id",$id);
                if ($ExcluirF->execute()) {
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

    }
?>