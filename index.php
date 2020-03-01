<?php
 	session_start();
	include_once("conexao.php");
	$result_cursos = "SELECT * FROM produto";
	$resultado_cursos = mysqli_query($conn, $result_cursos);

	

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Modal</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
	</head>
	<body>
	<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Listar Produtos</h1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div>
			<!-- Inicio Modal CADASTRO -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="http://localhost/Estock1/processa_cad.php" enctype="multipart/form-data">
								<!-- <input type="hidden" name="nome_foto"  value ="<?php echo '22'?>"><br><br> -->
								<div class="form-group">
									<label for="recipient-name" class="control-label">Nome do produto :</label>
									<input name="nome" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-name" class="control-label">Código de barras :</label>
									<input name="codigo_barras" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="message-text" class="control-label">Descrição :</label>
									<textarea name="detalhes" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="recipient-name" class="control-label">Valor :</label>
									<input name="valor" type="text" class="form-control">
								</div>
								<input type="file" name="imagem" id="imagem" onchange="previewImagem()"><br><br>
								<img style="width: 150px; height: 150px;"><br><br>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal CADASTRO -->
			
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome do Produto</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
								<tr>
									<td><?php echo $rows_produto['id']; ?></td>
									<td><?php echo $rows_produto['nome']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_produto['id']; ?>">Visualizar</button>
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_produto['id']; ?>" data-whatevernome="<?php echo $rows_produto['nome']; ?>"data-whateverdetalhes="<?php echo $rows_produto['detalhe']; ?>">Editar</button>
										<button type="button" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#myModalDel<?php echo $rows_produto['id']; ?>" data-whatever="<?php echo $rows_produto['id']; ?>">Apagar</button>
									</td>
								</tr>
								<!-- Inicio Modal EXIBIR -->
								<div class="modal fade" id="myModal<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
												<p><?php echo "Preço : ".$rows_produto['valor']; ?></p><hr>
												<img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 150px; height: 150px;"><br><br>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->

                                <!-- MODAL APAGAR-->
								<div class="modal fade" id="myModalDel<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<p>Tem certeza que deseja apagar o <?php echo "  ".$rows_produto['nome']; ?> ?</p>
												<form method="POST" action="http://localhost/estock1/proc_apagar_usuario.php" enctype="multipart/form-data">
														<input name="id" type="hidden" class="form-control" id="id-curso" value="">
														<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
														<button type="submit" class="btn btn-danger">Apagar</button>
														<?php echo "<a href='proc_apagar_usuario.php?id=".$rows_produto['id'] ."'>   Apagar</a><br><hr>";?>
												
												</form>
											</div>
										</div>
									</div>
								</div>

								<!-- fim modal apagar  -->
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		
		
		

		<!-- inicio modal ALTERAR  -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Curso</h4>
			  </div>

			  <div class="modal-body">
				<form method="POST" action="http://localhost/estock1/processa.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome:</label>
					<input name="nome" type="text" class="form-control" id="recipient-name">
				  </div>

				  <div class="form-group">
					<label for="message-text" class="control-label">Detalhes:</label>
					<textarea name="detalhes" class="form-control" id="detalhes"></textarea>
				  </div>

					<input name="id" type="hidden" class="form-control" id="id-curso" value="">
					
					<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Alterar</button>
			 
				</form>
			  </div>
			  
			</div>

		  </div>
		</div>
		<!-- fim modal alterar  -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  var recipientnome = button.data('whatevernome')
		  var recipientdetalhes = button.data('whateverdetalhes')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('ID do curso : 	' + recipient)
		  modal.find('#id-curso').val(recipient)
		  modal.find('#recipient-name').val(recipientnome)
		  modal.find('#detalhes').val(recipientdetalhes)
		  
		})
		function previewImagem(){
				var imagem = document.querySelector('input[name=imagem]').files[0];
				var preview = document.querySelector('img');
				
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
			}
	</script>
  </body>
</html>