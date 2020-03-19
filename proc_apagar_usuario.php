<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET, 'id');
    
    if(!empty($id)){
        $result_produto_procurado = "SELECT nome FROM produto WHERE id='$id'";
        $resultado_produto_procurado = mysqli_query($conn, $result_produto_procurado);
        $row_produto_procurado = mysqli_fetch_assoc($resultado_produto_procurado);
        // die(var_dump($row_funcionario_procurado['nome']));

        
        $result_produtos = "DELETE FROM produto WHERE id='$id'";
        $resultado_produtos = mysqli_query($conn, $result_produtos);


        
        if(mysqli_affected_rows($conn)){
            $processo = $_SESSION['usuarioNome']." apagou ".$row_produto_procurado['nome']. " no sistema";
			$result_processo = "INSERT INTO log (processo, horario) VALUES ('$processo', NOW())";	
            $resultado_processos = mysqli_query($conn, $result_processo);

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

