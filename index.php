<?php
 	session_start();
	include_once("conexao.php");
	include_once("modal.php");
	$result_cursos = "SELECT * FROM produto";
	$resultado_cursos = mysqli_query($conn, $result_cursos);

	

?>
<!DOCTYPE html>
<?php if($_SESSION['log'] == "logado"){?>
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
				<a href="http://localhost/estock-master/sair.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Sair</button></a>
			</div>
			<div class="pull-left">
					<a href="http://localhost/estock-master/Estoque.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Estoque</button></a>
			</div>
			<?php 	
			if($_SESSION['permissao']=="1"){?>
				<div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar Produto</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalCadFunc">Cadastrar Funcionário</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcadCat">Cadastrar Categoria</button>
				</div>
			<?php } ?>
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
											<?php if($_SESSION['permissao']=="1"){?>
											<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $rows_produto['id']; ?>" >Editar</button>
											<button type="button" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#myModalDel<?php echo $rows_produto['id']; ?>" data-whatever="<?php echo $rows_produto['id']; ?>">Apagar</button>
											<?php } ?>	
										</td>
									</tr>
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
	<?php }else{
		header("Location: form_login.php");
	}?>