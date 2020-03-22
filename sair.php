<?php
	session_start();
	include_once("conexao.php");
	    
	$processo = $_SESSION['usuarioNome']." deslogou do sistema";
	$result_processo = "INSERT INTO log (processo, horario) VALUES ('$processo', NOW())";	
	$resultado_processos = mysqli_query($conn, $result_processo);
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha']
	);
	$_SESSION['log'] = "deslogado";

	//redirecionar o usuario para a página de login
	header("Location: index.php");
?>