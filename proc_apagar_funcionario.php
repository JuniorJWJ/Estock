<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET, 'id');
    
    if(!empty($id)){
        $result_produtos = "DELETE FROM usuario WHERE id='$id'";
        $resultado_produtos = mysqli_query($conn, $result_produtos);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Funcionário deletado com sucesso</p>";
            header("Location: funcionario.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Funcionário não foi deletado com sucesso</p>";
            header("Location: funcionario.php");
        }
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Funcionário</p>";
        header("Location: funcionario.php");
    }
?>

