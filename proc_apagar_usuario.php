<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET, 'id');
    
    if(!empty($id)){
        $result_produtos = "DELETE FROM produto WHERE id='$id'";
        $resultado_produtos = mysqli_query($conn, $result_produtos);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Produto deletado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Produto não foi deletado com sucesso</p>";
            header("Location: index.php");
        }
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Produto</p>";
        header("Location: index.php");
    }

    





?>

