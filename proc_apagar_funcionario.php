<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET, 'id');
    
    if(!empty($id)){
        $result_funcionario_procurado = "SELECT nome FROM usuario WHERE id='$id'";
        $resultado_funcionario_procurado = mysqli_query($conn, $result_funcionario_procurado);
        $row_funcionario_procurado = mysqli_fetch_assoc($resultado_funcionario_procurado);
        // die(var_dump($row_funcionario_procurado['nome']));
        

        $result_funcionarios = "DELETE FROM usuario WHERE id='$id'";
        $resultado_funcionarios = mysqli_query($conn, $result_funcionarios);

        if(mysqli_affected_rows($conn)){
            $processo = $_SESSION['usuarioNome']." apagou ".$row_funcionario_procurado['nome']. " no sistema";
			$result_processo = "INSERT INTO log (processo, horario) VALUES ('$processo', NOW())";	
            $resultado_processos = mysqli_query($conn, $result_processo);
            
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

