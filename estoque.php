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
	<body 	>
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Estoque</h1>
		</div>
		
		<div class="pull-right">
			<a href="http://localhost/estock-master/index.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Produto</button></a>
		</div>
		<div class="pull-right">
			<a href="http://localhost/estock-master/sair.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Sair</button></a>
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
								<th>Quantidade/Ação</th>
								
							</tr>
						</thead>
						<tbody> <!-- EXIBIR ESTOQUE-->
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
												<input type="number" id="quantity" min="0" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade">
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
	<?php
		$result_cursos_1 = "SELECT * FROM `produto` WHERE quantidade = 0";
		$resultado_cursos_1 = mysqli_query($conn, $result_cursos_1);

		if($rows_produto = mysqli_fetch_assoc($resultado_cursos_1)){?>
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
									<th>Quantidade/Ação</th>
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
													<input type="number" id="quantity" min="0" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade">
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
		<?php }else{?>
			<h2> Não há produtos esgotados <h2>
		<?php } ?>	
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