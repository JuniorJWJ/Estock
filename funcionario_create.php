<?php
 	session_start();
	include_once("conexao.php");
	include('index.php');
	
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	$nome_foto = $_FILES['imagem']['name'];
	$cargo = $_POST['cargo'];	
	
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

	$result_funcionarios = "INSERT INTO usuario (nome, cpf, email, senha, Foto, fk_cargo) 
						            VALUES ('$nome', '$cpf', '$email', '$senha', '$novo_nome', '$cargo')";	
	$resultado_funcionarios = mysqli_query($conn, $result_funcionarios);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			$processo = $_SESSION['usuarioNome']." cadastrou um novo funcionário no sistema (".$nome.")  ";
			$result_processo = "INSERT INTO log (processo, horario) VALUES ('$processo', NOW())";	
            $resultado_processos = mysqli_query($conn, $result_processo);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/funcionario.php'>
				<script type=\"text/javascript\">
					alert(\"Funcionário Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/funcionario.php'>
				<script type=\"text/javascript\">
					alert(\"Funcionário não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>