<?php
 	// session_start();
?>

<?php if($_SESSION['log'] == "logado"){?>
    <!-- MODAL'S PRODUTO -->

    <!-- Inicio Modal CADASTRO PRODUTO-->
    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/Estock-master/produto_create.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome do produto :</label>   	<!-- NOME DO PRODUTO -->
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Código de barras :</label>  	<!-- CÓDIGO DE BARRAS -->
                            <input name="codigo_barras" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Descrição :</label> 			<!-- DESCRIÇÃO -->
                            <textarea name="detalhes" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Valor :</label>   			<!-- VALOR -->
                            <input name="valor" type="text" class="form-control" id = "valor1" >
                        </div>
                        <div class="form-group">
                            <label for="id11123" class="control-label">Quantidade :</label> <br>			<!-- DESCRIÇÃO -->
                            <input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>"> <!-- QUANTIDADE -->
                            <input type="number" id="quantity" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade">   
                        </div>
                        <div class="form-group">
                            Categoria do Produto:
                            <select name="categoria" class="form-control" id="exampleFormControlSelect1">
                            <option>Selecione</option>
                                <?php
                                    $result_categoria = "SELECT * FROM categoria";
                                    $resultado_categoria = mysqli_query($conn, $result_categoria);
                                    while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                        <option value="<?php echo $row_categoria['id']; ?>"><?php echo $row_categoria['nome']; ?></option> <?php
                                    }
                                ?>
                        </select><br><br>
                        </div>
                        
                        <input type="file" name="imagem" id="imagem" onchange="previewImagem()"><br><br>
                        <img style="width: 150px; height: 150px;"><br><br> 									<!-- FOTO -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL CADASTRO PRODUTO -->

    <!-- MODAL CATEGORIA -->

    <!-- Inicio Modal CADASTRO  Categoria-->
    <div class="modal fade" id="myModalcadCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Categoria</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/Estock-master/categoria_create.php" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome da categoria :</label>   	<!-- NOME DO CATEGORIA -->
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal CADASTRO Categoria -->










    <!-- INICIO MODAL CADASTRO FUNCIONARIO-->
    <div class="modal fade" id="myModalCadFunc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Funcionário</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/Estock-master/funcionario_create.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome :</label>   	<!-- NOME DO FUNCIONARIO -->
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">CPF :</label>  	<!-- CPF -->
                            <input name="cpf" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">E-mail :</label>  	<!-- Email -->
                            <input name="email" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Senha :</label>   			<!-- SENHA -->
                            <input name="senha" type="password" class="form-control" id = "valor1" >
                        </div>
                        <div class="form-group">
                            Cargo :
                            <select name="cargo" class="form-control" id="exampleFormControlSelect1">
                            <option>Selecione</option>
                                <?php
                                    $result_cargo = "SELECT * FROM cargo";                                //CARGO 
                                    $resultado_cargo = mysqli_query($conn, $result_cargo);
                                    while($row_cargo = mysqli_fetch_assoc($resultado_cargo)){ ?>
                                        <option value="<?php echo $row_cargo['id']; ?>"><?php echo $row_cargo['nome']; ?></option> <?php
                                    }
                                ?>
                        </select><br><br>
                        </div>
                        
                        <input type="file" name="imagem" id="imagem1" onchange="previewImagem()"><br><br>
                        <img style="width: 150px; height: 150px;"><br><br> 									<!-- FOTO -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL CADASTRO FUNCIONARIO -->
<?php }else{
	header("Location: index.php");
}?>



