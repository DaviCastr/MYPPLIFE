<?php 
require_once("Conexao.php");
class ControlePostagem
{
	public function InserirPostagem($postagem){
		$retorno = false;
		try{
			$con = new Conexao();
			$matricula = $postagem->getMatricula();
			$data = $postagem->getData();
			$hora = $postagem->getHora();	
			$descricao = $postagem->getDescricao();
			$arquivo = $postagem->getArquivo();
			$curtidas = $postagem->getCurtidas();
			$sql = "INSERT INTO postagens(matricula,datas,hora,descricao,arquivo,curtidas,confarc) VALUES(:matricula,:datas,:hora,:descricao,:arquivo,:curtidas,:confarc);";
			$inserir = $con->getCon()->prepare($sql);
			$inserir->bindParam("matricula",$matricula);
			$inserir->bindParam("datas",$data);
			$inserir->bindParam("hora",$hora);
			$inserir->bindParam("descricao",$descricao);
			$inserir->bindParam("arquivo",$arquivo,PDO::PARAM_LOB);
			$inserir->bindParam("curtidas",$curtidas);
			if(empty($arquivo)){
				$confarc = "";
				$inserir->bindParam("confarc",$confarc);
			}else{
				$confarc = "true";
				$inserir->bindParam("confarc",$confarc);
			}
			if($inserir->execute()){
				$retorno = true;
			}
		}catch(PDOException $p){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $p->getMessage());
		}catch(Exception $e){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $e->getMessage());
		}
		return $retorno;
	}
	public function ControlaCurtidas($postagem){
		$retorno = null;
			try{
				$con = new Conexao();
				$sql = "SELECT idpostagem,matricula FROM curtidas WHERE idpostagem =:idpostagem AND matricula =:matricula;";
				$idpostagem = $postagem->getId();
				$matricula = $postagem->getMatricula();
				$recebe = $con->getCon()->prepare($sql);
				$recebe->bindParam("idpostagem",$idpostagem);
				$recebe->bindParam("matricula",$matricula);
				if($recebe->execute()){
					if($recebe->rowCount() >0){
						$curt = 1;
						$deletaSql = "DELETE FROM curtidas WHERE matricula=:matricula AND idpostagem=:idpostagem;";
						$deleta = $con->getCon()->prepare($deletaSql);
						$deleta->bindParam("matricula",$matricula);
						$deleta->bindParam("idpostagem",$idpostagem);
						if ($deleta->execute()) {
							
							$selecionarC = "SELECT curtidas FROM postagens WHERE id=:id;";
							$receberC = $con->getCon()->prepare($selecionarC);
							$receberC->bindParam("id",$idpostagem);
							if($receberC->execute()){
								$VCurtidas = $receberC->fetch(PDO::FETCH_OBJ);
								
									$valorCurtidas = $VCurtidas->curtidas;
									$ValorNovo = ($valorCurtidas-$curt);
									$AtualizaCurtidaSql = "UPDATE postagens SET curtidas =:curtidas WHERE id=:id;";
									$AtualizaCurtidas = $con->getCon()->prepare($AtualizaCurtidaSql);
									$AtualizaCurtidas->bindParam("curtidas",$ValorNovo);
									$AtualizaCurtidas->bindParam("id",$idpostagem);
									if($AtualizaCurtidas->execute()){
										$retorno = $ValorNovo;
									}
								
							}
						}
					}else{
						$InserirCurtidasSql = "INSERT INTO curtidas(matricula,idpostagem) VALUES(:matricula,:idpostagem);";
						$InserirCurtidas = $con->getCon()->prepare($InserirCurtidasSql);
						$InserirCurtidas->bindParam("matricula",$matricula);
						$InserirCurtidas->bindParam("idpostagem",$idpostagem);
						if($InserirCurtidas->execute()){
							$curt = 1;
							$selecionarC = "SELECT curtidas FROM postagens WHERE id=:id;";
							$receberC = $con->getCon()->prepare($selecionarC);
							$receberC->bindParam("id",$idpostagem);
							if($receberC->execute()){
								$VCurtidas = $receberC->fetch(PDO::FETCH_OBJ);
									$valorCurtidas = $VCurtidas->curtidas;
									$ValorNovo = $valorCurtidas+$curt;
									$AtualizaCurtidaSql = "UPDATE postagens SET curtidas =:curtidas WHERE id=:id;";
									$AtualizaCurtidas = $con->getCon()->prepare($AtualizaCurtidaSql);
									$AtualizaCurtidas->bindParam("curtidas",$ValorNovo);
									$AtualizaCurtidas->bindParam("id",$idpostagem);
									if($AtualizaCurtidas->execute()){
										$retorno = $ValorNovo;
									}
							}
						}
					}
				}
			}catch(PDOException $p){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $p->getMessage());
			}catch(Exception $e){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $e->getMessage());
			}
		return $retorno;
	}
	public function VerCurtidas($postagem){
		$retorno = null;
		try{
			$idpostagem = $postagem->getId();
			$selecionarC = "SELECT curtidas FROM postagens WHERE id=:id;";
			$receberC = $con->getCon()->prepare($selecionarC);
			$receberC->bindParam("id",$idpostagem);
			if($receberC->execute()){
				$retorno = $receberC->fetch(PDO::FETCH_OBJ);
			}
		}catch(PDOException $p){
		$arquivo = fopen("console.log", "w");
		fwrite($arquivo, $p->getMessage());
		}catch(Exception $e){
		$arquivo = fopen("console.log", "w");
		fwrite($arquivo, $e->getMessage());
		}
		return $retorno;
	}
	public function AtualizaPostagem($postagem){
		$retorno = false;
		try{
			$con = new Conexao();
			$matricula = $postagem->getMatricula();
			$data = $postagem->getData();
			$hora = $postagem->getHora();	
			$descricao = $postagem->getDescricao();
			$arquivo = $postagem->getArquivo();
			$curtidas = $postagem->getCurtidas();
			$sql = "INSERT INTO postagens(matricula,datas,hora,descricao,arquivo,curtidas) VALUES(:matricula,:datas,:hora,:descricao,:arquivo,:curtidas);";
			$inserir = $con->getCon()->prepare($sql);
			$inserir->bindParam("matricula",$matricula);
			$inserir->bindParam("datas",$data);
			$inserir->bindParam("hora",$hora);
			$inserir->bindParam("descricao",$descricao);
			$inserir->bindParam("arquivo",$arquivo);
			$inserir->bindParam("curtidas",$curtidas);
			if($inserir->execute()){
				$retorno = true;
			}
		}catch(PDOException $p){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $p->getMessage());
		}catch(Exception $e){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $e->getMessage());
		}
		return $retorno;
	}
	public function SelecionarPostagens(){
		$retorno = null;
			try{
				$con = new Conexao();
				$sql = "SELECT postagens.id,nome,confimg,confarc,usuarios.matricula,descricao,datas,hora,curtidas FROM postagens INNER JOIN usuarios ON usuarios.matricula = postagens.matricula ORDER BY postagens.id DESC;";
				$seleciona = $con->getCon()->query($sql, PDO::FETCH_OBJ);
				if($seleciona){
					$retorno = $seleciona;
				}
			}catch(PDOException $p){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $p->getMessage());
		}catch(Exception $e){
			$arquivo = fopen("console.log", "w");
			fwrite($arquivo, $e->getMessage());
		}
		return $retorno;
	}
	public function Arquivo($post){
		$retorno = null;
			try{
				$con = new Conexao();
				$id = $post->getId();
				$sql="SELECT arquivo FROM postagens WHERE id=:id;";
				$preparar= $con->getCon()->prepare($sql);
				$preparar->bindParam("id",$id);
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
	public function InserirComentario($comentario){
		$retorno = false;
		try{
			$con = new Conexao();
			$matricula = $comentario->getMatricula();
			$idpostagem = $comentario->getId();
			$coment = $comentario->getComentario();
			$sql = "INSERT INTO comentarios(matricula,idpostagem,comentario) VALUES(:matricula,:idpostagem,:comentario);";
			$InserirC = $con->getCon()->prepare($sql); 
			$InserirC->bindParam("matricula",$matricula);
			$InserirC->bindParam("idpostagem",$idpostagem);
			$InserirC->bindParam("comentario",$coment);
			if ($InserirC->execute()) {
				echo "<span id='suscoment'></span>";
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
	public function SelecionarComentario($comentario){
		$retorno = null;
		try{
			$con = new Conexao();
			$idpostagem = $comentario->getId();
			$sql = "SELECT nome,comentarios.matricula,comentario,confimg,idpostagem FROM comentarios INNER JOIN usuarios ON usuarios.matricula = comentarios.matricula WHERE idpostagem=$idpostagem";
			$SelecionarC = $con->getCon()->query($sql, PDO::FETCH_OBJ); 
				echo "<span id='suscoment'></span>";
				$retorno = $SelecionarC;
		}catch(PDOException $p){
			$arq = fopen("console.log","w");
			fwrite($arq,$p->getMessage());
		}catch(Exception $e){
			$arq = fopen("console.log","w");
			fwrite($arq,$e->getMessage());
		}
		return $retorno;
	}
	public function ExcluirComentarios($post){
		$retorno = false;
		try{
			$con = new Conexao();
			$id = $post->getId();
			$sql = "DELETE FROM  comentario WHERE idpostagem=:idpostagem;";
			$ExcluirC = $con->getCon()->prepare($sql);
			$ExcluirC->bindParam("idpostagem",$id);
			if($ExcluirC->execute()){
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
	public function ExcluirPostagem($post) {
		$retorno = false;
		try{
			if(ExcluirComentarios($post)){
					$id = $post->getId();
					$con = new Conexao();
					$sqlCt = "DELETE FROM curtidas WHERE idpostagem=:idpostagem;";
					$ExcluirCt = $con->getCon()->prepare($sqlCt);
					$ExcluirCt->bindParam("idpostagem",$id);
					if($ExcluirCt->execute()){
						$sql ="DELETE FROM postagens WHERE id=:id";
						$ExcluiP = $con->getCon()->prepare($sql);
						$ExcluiP->bindParam("id",$id);
						if($ExcluiP->execute()){
							$retorno = true;
						}
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
	public function AtualizarPostagem($post) {
		$retorno = false;
		try{
			$id = $post->getId();
			$descricao = $post->getDescricao();
			$arquivo = $post->getArquivo();
			$confarc = $post->getConfarc();
			$sql ="UPDATE postagens SET descricao=:descricao,arquivo=:arquivo,confarc=:confarc WHERE id=:id;";
			$con = new Conexao();
			$AtualizaP = $con->getCon()->prepare($sql);
			$AtualizaP->bindParam("descricao",$descricao);
			$AtualizaP->bindParam("arquivo",$arquivo);
			$AtualizaP->bindParam("confarc",$confarc);
			$AtualizaP->bindParam("id",$id);
			if($AtualizaP->execute()){
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
	public function SelecionarPostagensAtualizar($post){
	$retorno = null;
	try{
	$id = $post->getId();
	$con = new Conexao();
	$sql = "SELECT confarc,descricao FROM postagens WHERE id=:id;";
		$seleciona = $con->getCon()->prepare ($sql);
		$seleciona->bindParam("id",$id);
		if($seleciona->execute()){
			$Valor = $seleciona->fetch(PDO::FETCH_OBJ);
			$post->setDescricao($Valor->descricao);
			$post->setConfArc($Valor->confarc);
			$retorno = $post;
		}
	}catch(PDOException $p){
	$arquivo = fopen("console.log", "w");
	fwrite($arquivo, $p->getMessage());
	}catch(Exception $e){
	$arquivo = fopen("console.log", "w");
	fwrite($arquivo, $e->getMessage());
	}
	return $retorno;
	}
}
?>