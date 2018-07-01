<?php
require_once("../processos/Conexao.php");
class ControleHome
{
    public function InserirLinha($linha){
        $retorno = false;
        try{
            $con = new Conexao();
            $selecionaPosition ="SELECT posicao FROM linhadotempo ORDER BY id DESC LIMIT 1;";
            $verPosition = $con->getCon()->query($selecionaPosition, PDO::FETCH_OBJ);
            if($verPosition->rowCount() >0){
                foreach ($verPosition as $PosicaoBanco) {
                    if($PosicaoBanco->posicao == $linha->getPosicao()){
                        $posicao = "right";
                    }else{
                        $posicao = $linha->getPosicao();
                    }
                }
            }else{
                $posicao = $linha->getPosicao();
            }
            $sql = "INSERT INTO linhadotempo(imagem,nome,descricao,posicao) VALUES(:imagem,:nome,:descricao,:posicao);";
            $img = $linha->getImagem();
            $nome = $linha->getNome();
            $descricao = $linha->getDescricao();
            $InserirL = $con->getCon()->prepare($sql);
            $InserirL->bindParam("imagem",$img,PDO::PARAM_LOB);
            $InserirL->bindParam("nome",$nome);
            $InserirL->bindParam("descricao",$descricao);
            $InserirL->bindParam("posicao",$posicao);
            if($InserirL->execute()){
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
    public function SelecionarLinha(){
        $retorno = null;
        try{
            $con = new Conexao();
            $sql = "SELECT id,nome,posicao,descricao FROM linhadotempo;";
            $SelecionarL = $con->getCon()->query($sql, PDO::FETCH_OBJ);
            $retorno = $SelecionarL;
        }catch(PDOException $p){
            $arq = fopen("console.log","w");
            fwrite($arq,$p->getMessage());
        }catch(Exception $e){
            $arq = fopen("console.log","w");
            fwrite($arq,$e->getMessage());
        }
		return $retorno;
    }
    public function LinhaImagem($linha){
        $retorno = null;
            try{
                $con = new Conexao();
                $idF = $linha->getId();
                $sql="SELECT imagem FROM linhadotempo WHERE id=:id;";
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
    public function ExcluirLinha($linha) {
    $retorno = false;
    try{
    $id = $linha->getId();
    $sql ="DELETE FROM linhadotempo WHERE id=:id";
    $con = new Conexao();
    $ExcluiL = $con->getCon()->prepare($sql);
    $ExcluiL->bindParam("id",$id);
    if($ExcluiL->execute()){
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
    public function AtualizarLinha($linha) {
    $retorno = false;
    try{
    $id = $linha->getId();
    $nome = $linha->getNome();
    $descricao = $linha->getDescricao();
    $imagem = $linha->getImagem();
    $posicao = $linha->getPosicao();
    $sql ="UPDATE linhadotempo SET nomd=:nome,descricao=:descricao,imagem=:imagem,posicao=:posicao WHERE id=:id;";
    $con = new Conexao();
    $AtualizaL = $con->getCon()->prepare($sql);
    $AtualizaL->bindParam("nome",$nome);
    $AtualizaL->bindParam("descricao",$descricao);
    $AtualizaL->bindParam("imagem",$imagem);
    $AtualizaL->bindParam("position",$position);
    $AtualizaL->bindParam("id",$id);
    if($AtualizaL->execute()){
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
    public function SelecionarLinhaAtualizar($linha){
    $retorno = null;
    try{
    $id = $linha->getId();
    $con = new Conexao();
    $sql = "SELECT nome,posicao,descricao FROM linhadotempo WHERE id=:id;";
    $SelecionarL = $con->getCon()->prepare($sql);
    $SelecionarL->bindParam("id",$id);
    	if($SelecionarL->execute()){
    		$Valor = $SelecionarL->fetch(PDO::FETCH_OBJ);
    		$linha->setNome($Valor->nome);
    		$linha->setDescricao($Valor->descricao);
    		$linha->setPosicao($Valor->posicao);
    		$retorno = $linha;
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