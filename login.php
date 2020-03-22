<?php
    session_start();  
    include_once("conexao.php");    
    echo "
				<script type=\"text/javascript\">
					alert(\"Chegou aqui.\");
				</script>
            ";	
            
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        //var_dump($email);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        //var_dump($senha);
        	
        //Buscar na tabela 
        $result_usuario = "SELECT * FROM usuario WHERE email = '$email' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        //var_dump($resultado);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){ 
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['permissao'] = $resultado['fk_cargo'];
            $_SESSION['usuarioEmail'] = $resultado['email'];

            $processo = $_SESSION['usuarioNome']." entrou no sistema";
			$result_processo = "INSERT INTO log (processo, horario) VALUES ('$processo', NOW())";	
            $resultado_processos = mysqli_query($conn, $result_processo);
            
            if($_SESSION['permissao'] == "1"){
                $_SESSION['log'] = "logado";
                header("Location: produto.php");
            }elseif($_SESSION['permissao'] == "0"){
                $_SESSION['log'] = "logado";
                header("Location: estoque.php");
            }
        }else{   
            header("Location: index.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
         echo "
	 			<script type=\"text/javascript\">
 				alert(\"dados errados .\");
	 			</script>
	 		";
         header("Location: index.php");
     }
?>