<?php
	session_start();
    include_once("conexao.php");
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);
    
    $result_produtos = "UPDATE produto SET quantidade = '$quantidade' WHERE id = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/estock-master/estoque.php'>
				<script type=\"text/javascript\">
					alert(\"Curso alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/estock-master/estoque.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>