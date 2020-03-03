<?php
	
    include_once("conexao.php");
    $id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);
	$codigo_barras = mysqli_real_escape_string($conn, $_POST['codigo_barras']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	echo "$id - $nome - $detalhes";
    
    $result_produtos = "UPDATE produto SET nome = '$nome', detalhe = '$detalhes', valor = '$valor', codigo_barras = '$codigo_barras' WHERE id = '$id'";
    $resultado_produtos = mysqli_query($conn, $result_produtos);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/estock1/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/estock1/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>