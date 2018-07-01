<?php 
	$json = file_get_contents("infor.json");
	$dados = json_decode($json,true);
	$resultado = $dados["pessoa"];
	$n = $_GET['n'];
	try{
?>
	<!-- 	<table border="1">
			<thead>
				<th>Nome</th>
				<th>Matricula</th>
				<th>Data de Nacimento</th>
			</thead>	
			<tbody> -->
<?php
				for ($i=0; $i < count($resultado); $i++) { 
					// echo "<tr>";
					// echo "<td>".$resultado[$i]["nome"]."</td>";
					// echo "<td>".$resultado[$i]["matricula"]."</td>";
					// echo "<td>".$resultado[$i]["nascimento"]."</td>";
					// echo "</tr>";
					if ($resultado[$i]["matricula"] == $n) {
					echo '
				
						<script type="text/javascript">
							try{
								addle("kd");
								ver(<?php $resultado[$i]["nome"] ?>);
						}catch(er){
							alert(er.message);
						}
						</script>
				
				';
					}

				}
?>
		<!-- 	</tbody>
		</table> -->
<?php
	}catch(Exception $e){
		echo "<script>  alert($e)</script>";


	}

?>