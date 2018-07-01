<?php
class Conexao{
	private $con;
	public function setCon($data){
		$this->con = $data;
	}
	public function getCon(){
		return $this->con;
	}
	public function __construct(){
		try{
			// Endereco da Conexao
			// Por IP ou localhost
			// Porta 3306 do protocolo TCP
			// $servidor = "ntectreinamentos.com.br";
			// $user = "ntect391_davi";
			// $bd = "ntect391_davi";
			// $pwd = "davi2017";
			$servidor = "localhost";
			$user = "root";
			$bd ="infor";
			$pwd="";
			// $servidor = "fdb19.awardspace.net";
			// $user = "2595116_mypplife";
			// $bd = "2595116_mypplife";
			// $pwd = "[9mypplife0]";
			// Executa o construtor do PDO
			// Recebe 3 Argumentos
			// new PDO(OndeConectar,QuemConectar,Senha)
			$this->setCon(new PDO("mysql:host=$servidor;dbname=$bd",$user,$pwd));
			$this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);// Erros em exceções
			echo "";
		}catch(PDOException $ex){
			echo "{$ex->getMessage()}";
		}
	}
}
?>