<?php 

if (isset($_POST["id"]) && isset($_POST["quantidade"])){
	session_start();
    include_once("conexao.php");
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);
    
    $result_produtos = "UPDATE produto SET quantidade = '$quantidade' WHERE id = '$id'";
    $resultado_produtos = mysqli_query($conn, $result_produtos);
    echo "ok";
}else{
    echo "falhou";
}
?>
