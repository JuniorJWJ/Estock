<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome']; ?></h4>
        </div>
        <div class="modal-body">
            <p><?php echo "ID : ".$rows_produto['id']; ?></p><hr>
            <p><?php echo "Nome : ".$rows_produto['nome']; ?></p><hr>
            <p><?php echo "Descrição : ".$rows_produto['detalhe']; ?></p><hr>
            <p><?php echo "Código de Barras : ".$rows_produto['codigo_barras']; ?></p><hr>
            <p><?php echo "Preço : ".$rows_produto['valor'	]; ?></p><hr>
            <p><?php $teste = $rows_produto['fk_categoria']; 
                $teste1 = "SELECT nome FROM categoria WHERE id='$teste'";
                $result = mysqli_query($conn, $teste1);
                $row_categoria1 = mysqli_fetch_assoc($result);
                echo "Categoria : ".$row_categoria1['nome'];
            ?></p><hr>
            

            <p><?php //echo "Categoria : ".$rows_produto['fk_categoria']; ?></p>
            <img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 150px; height: 150px;"><br><br>
        </div>
    </div>
</div>