<?php
	session_start();
	include_once("conexao.php");
    $_SESSION['log'] = "deslogado";
    $email = mysqli_real_escape_string($conn, $_POST['emailrecupera']);

	$login=mysqli_query($conn,"SELECT * FROM usuario WHERE email='$email'"); 
    $dado = mysqli_fetch_array($login);
	$senha = $dado['senha'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
	
	
	<script src = "https://smtpjs.com/v3/smtp.js"></script>

	<script src="js/main.js"></script>
	
		

	<script>
		// function enviaremail() { 
			Email.send({
			SecureToken: '0b57ced8-9987-4c8c-b4a5-08c07b644997',
			To:'<?php echo($email)?>',
			From:'contatoestock@gmail.com',
			Subject:'Estock: Recuperação de senha',
			Body:'Olá, sua senha é:<?php echo($senha)?>'
			}).then(
			message=> alert('Olá, sua senha é:<?php echo($senha)?>, e email : <?php echo ($email)?>')
			);
		// }
</script>
</body>
</html>
