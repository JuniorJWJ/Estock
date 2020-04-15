<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">Alterar Funcionário</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="http://localhost/Estock-master/funcionario_update.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Nome :</label>   	<!-- NOME DO FUNCIONARIO -->
                    <input 	value="<?php echo $rows_funcionario['nome']; ?>" name="nome" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">CPF :</label>  	<!-- CPF -->
                    <input value="<?php echo $rows_funcionario['cpf']; ?>" name="cpf" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">E-mail :</label>  	<!-- Email -->
                    <input  value="<?php echo $rows_funcionario['email']; ?>" name="email" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Senha :</label>   			<!-- SENHA -->
                    <input  value="<?php echo $rows_funcionario['senha']; ?>" name="senha" type="text" class="form-control" id = "valor1" >
                </div>
                <div class="form-group">
                    Cargo :
                    <select name="cargo" class="form-control" id="exampleFormControlSelect1">
                    <option> <?php $teste = $rows_funcionario['fk_cargo']; 
                                $teste1 = "SELECT nome FROM cargo WHERE id='$teste'";
                                $result = mysqli_query($conn, $teste1);
                                $row_cargo1 = mysqli_fetch_assoc($result);
                                echo $row_cargo1['nome'];
                            ?> </option>
                        <?php
                            $result_cargo = "SELECT * FROM cargo";                                //CARGO 
                            $resultado_cargo = mysqli_query($conn, $result_cargo);
                            while($row_cargo = mysqli_fetch_assoc($resultado_cargo)){ ?>
                                <option value="<?php echo $row_cargo['id']; ?>"><?php echo $row_cargo['nome']; ?></option> <?php
                            }
                        ?>
                </select><br><br>
                </div>
                <input name="id" type="hidden" class="form-control" id="id-curso" value="<?php echo $rows_funcionario['id']; ?>">
                <input type="file" name="imagem" id="imagem1" onchange="previewImagem()"><br><br>
                <img src="<?php echo "upload/".$rows_funcionario['foto'] ?>" style="width: 150px; height: 150px;"><br><br>						<!-- FOTO -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>