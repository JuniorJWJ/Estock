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
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = md5($senha);
        echo "
        <script type=\"text/javascript\">
            alert(\"Chegou aqui2.\");
        </script>
    ";	
        //Buscar na tabela 
        $result_usuario = "SELECT * FROM usuario WHERE email = '$email' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){ //se encontrou
            echo "
				<script type=\"text/javascript\">
					alert(\"Chegou aqui1.\");
				</script>
			";	
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['permissao'] = $resultado['permissao'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
             echo " 12312";	
           // if($_SESSION['permissao'] == "1"){
                header("Location: produto.php");
           // }elseif($_SESSION['permissao'] == "0"){
              //  header("Location: estoque.php");
            //}
        //Não foi encontrado um usuario correspondente
        //redireciona p/ login
        }else{    
            header("Location: form_login.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    // }else{
    //     echo "
	// 			<script type=\"text/javascript\">
	// 				alert(\"dados errados aqui.\");
	// 			</script>
	// 		";
    //     header("Location: form_login.php");
    }
?>