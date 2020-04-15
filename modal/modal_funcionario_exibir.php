<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_funcionario['nome']; ?></h4>
        </div>
        <div class="modal-body">
            <img src="<?php echo "upload/".$rows_funcionario['foto'] ?>" style="width: 150px; height: 150px;"><br><br>
            <p><?php echo "ID : ".$rows_funcionario['id']; ?></p><hr>
            <p><?php echo "Nome : ".$rows_funcionario['nome']; ?></p><hr>
            <p><?php echo "CPF : ".$rows_funcionario['cpf']; ?></p><hr>
            <p><?php echo "E-mail : ".$rows_funcionario['email']; ?></p><hr>
            <p><?php echo "Senha : ".$rows_funcionario['senha']; ?></p><hr>
            <p><?php $teste = $rows_funcionario['fk_cargo']; 
                $teste1 = "SELECT nome FROM cargo WHERE id='$teste'";
                $result = mysqli_query($conn, $teste1);
                $row_cargo1 = mysqli_fetch_assoc($result);
                echo "Cargo : ".$row_cargo1['nome'];
            ?></p><hr>
        </div>
    </div>
</div>