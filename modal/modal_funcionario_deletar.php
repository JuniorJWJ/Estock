<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_funcionario['nome']; ?></h4>
        </div>
        <div class="modal-body">
            <p>Tem certeza que deseja apagar o <?php echo "  ".$rows_funcionario['nome']; ?> ?</p>
            <form method="POST" action="http://localhost/estock1/funcionario_delete.php" enctype="multipart/form-data">
                    <input name="id" type="hidden" class="form-control" id="id-curso" value="">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <a href="<?php echo "funcionario_delete.php?id=".$rows_funcionario['id'] ."";?>"><button type="button" class="btn btn-danger" >Apagar</button></a>
            </form>
        </div>
    </div>
</div>