<?php
	
    include_once("conexao.php");
    $id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);
	$codigo_barras = mysqli_real_escape_string($conn, $_POST['codigo_barras']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$nome_foto = $_FILES['imagem']['name'];
	echo "$id - $nome - $detalhes";
    
	
		$formatosPermitidos = array("png","jpeg", "jpg");
			$extensao = pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION );
		
			if(in_array($extensao,$formatosPermitidos)){
				$pasta = "upload/";
				$temporario = $_FILES['imagem']['tmp_name'];
				$novo_nome = uniqid().".$extensao";
				var_dump($novo_nome);
				
				if(move_uploaded_file($temporario, $pasta.$novo_nome)){
					echo "upload done para $pasta.$novo_nome";
				}else{
					echo "erro, não foi possível upar o arquivo $temporario";
				}		
			}else{
				echo"formato inválido";
			} 



    $result_produtos = "UPDATE produto SET nome = '$nome', detalhe = '$detalhes', valor = '$valor', codigo_barras = '$codigo_barras',Foto = '$novo_nome' 
	 WHERE id = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/index.php'>
				<script type=\"text/javascript\">
					alert(\"Produto alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/index.php'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>