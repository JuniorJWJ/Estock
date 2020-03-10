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
				<h1>Estoque</h1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar Produto</button>
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
			<!-- Fim Modal CADASTRO -->
			
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcadCat">Cadastrar Categoria</button>
			</div>
			<!-- Inicio Modal CADASTRO  Categoria-->
			<div class="modal fade" id="myModalcadCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Categoria</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="http://localhost/Estock1/processa_categoria_cadastro.php" enctype="multipart/form-data">
							
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
                                <th>Código de Barras</th>
								<th>Quantidade</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
								<?php $quantidade = $rows_produto['quantidade'] ?>
								<?php if($quantidade>0){ ?>
									<tr>
										<td><?php echo $rows_produto['id']; ?></td>
										<td><?php echo $rows_produto['nome']; ?></td>
										<td><?php echo $rows_produto['codigo_barras']; ?></td>
										<td>
										<form method="POST" action="http://localhost/estock-master/processa_quantidade.php" enctype="multipart/form-data">
											<div class="form-group">
												<input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>">
												<input type="number" id="quantity" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade">
												<input type="submit" value ="Alterar quantidade"></td>
											</div>
										</form>

									</tr>   
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
			</div>
		</div>		
	</div>
	<!-- ESGOTADOS  ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS-->
	<?php	
		$result_cursos = "SELECT * FROM produto";
		$resultado_cursos = mysqli_query($conn, $result_cursos);
	?>
	<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Esgotados : </h1>
			</div>
			<div class="container theme-showcase" role="main">
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome do Produto</th>
									<th>Código de Barras</th>
									<th>Quantidade</th>
								</tr>
							</thead>
							<tbody>
								<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
									<?php $quantidade = $rows_produto['quantidade'] ?>
									<?php if($quantidade<=0){ ?>
										<tr>
											<td><?php echo $rows_produto['id']; ?></td>
											<td><?php echo $rows_produto['nome']; ?></td>
											<td><?php echo $rows_produto['codigo_barras']; ?></td>
											<td>
											<form method="POST" action="http://localhost/estock-master/processa_quantidade.php" enctype="multipart/form-data">
												<div class="form-group">
													<input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>">
													<input type="number" id="quantity" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade">
													<input type="submit" value ="Alterar quantidade"></td>
												</div>
											</form>

										</tr>   
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
				</div>
			</div>		
	</div>
		
		
		

		



















    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
    <!-- Include plugins -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
    
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  var recipientnome = button.data('whatevernome')
		  var recipientdetalhes = button.data('whateverdetalhes')
		  var recipientfoto = button.data('whateverfoto')
		  var recipientvalor = button.data('whatevervalor')
		  var recipientcodigo_barras = button.data('whatevercodigo_barras')
		  var modal = $(this)
		  // Pegando dados do modal editar
		  modal.find('.modal-title').text('ID do curso : 	' + recipient)
		  modal.find('#id-curso').val(recipient)
		  modal.find('#recipient-name').val(recipientnome)
		  modal.find('#detalhes').val(recipientdetalhes)
		  modal.find('#codigo_barras').val(recipientcodigo_barras)
		  modal.find('#valor').val(recipientvalor)
		  
		//mask
		$('#valor').mask('#.##0,00', {reverse: true});
		$('#valor1').mask('#.##0,00', {reverse: true});
		
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