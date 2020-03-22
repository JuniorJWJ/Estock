<?php
 	session_start();
	include_once("conexao.php");
	$result_processos = "SELECT * FROM log order by horario";
	$resultado_processo = mysqli_query($conn, $result_processos);
	// abre o arquivo colocando o ponteiro de escrita no final
	$arquivo = fopen('log/log.txt','a');
	if ($arquivo) {
		while($rows_produto = mysqli_fetch_assoc($resultado_processo)){
			$linha = $rows_produto['horario']." ".$rows_produto['processo']."\n";
			fwrite($arquivo, $linha);
		}
			fclose($arquivo);
	}
	echo "
		<script type=\"text/javascript\">
			alert(\"Relatório gerado com Sucesso.\");
		</script>";
	header("Location: funcionario.php");
?>

