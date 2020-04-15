<?php
 	session_start();
	include_once("conexao.php");
	include_once("modal.php");
	$result_funcionarios = "SELECT * FROM usuario";
	$resultado_funcionario = mysqli_query($conn, $result_funcionarios);
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
			<link rel="stylesheet" type="text/css" href="css/style.css">
			
		</head>
		<body>
		<?php include_once("header_funcionario.php")?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">				
				<?php 	
				if($_SESSION['permissao']=="1"){?>
					<a href="http://localhost/estock-master/arquivo.php"><button type="button" class="quadrinhoarredondadoexemplo pull-right" >Gerar relatório</button></a>
					<button type="button" class="quadrinhoarredondadoexemplo pull-right" data-toggle="modal" data-target="#myModalCadFunc">Cadastrar Funcionário</button>
					<h1>Listar Funcionário</h1>
				<?php } ?>
			</div>
			
			<div class="container theme-showcase" role="main">
				<div class="col-md-12">
					<table >
						<thead>
							<tr>
								<th width="10%">#</th>
								<th width="60%">Nome do Funcionário</th>
								<th class="cabecalho" width="30%">Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_funcionario = mysqli_fetch_assoc($resultado_funcionario)){ ?>
								<tr>
									<td><?php echo $rows_funcionario['id']; ?></td>
									<td><?php echo $rows_funcionario['nome']; ?></td>
									<td>
										<button type="button" class="buttonacao" data-toggle="modal" data-target="#ModalShowFunc<?php echo $rows_funcionario['id']; ?>">Visualizar</button>
										<?php if($_SESSION['permissao']=="1"){?>
										<button type="button" class="buttonacao" data-toggle="modal" data-target="#editFunc<?php echo $rows_funcionario['id']; ?>" >Editar</button>
										<button type="button" class="buttonacao"  data-toggle="modal" data-target="#ModalDelFunc<?php echo $rows_funcionario['id']; ?>" data-whatever="<?php echo $rows_produto['id']; ?>">Apagar</button>
										<?php } ?>	
									</td>
								</tr>
								<!-- INICIO MODAL EXIBIR FUNCIONARIO -->
								<div class="modal fade" id="ModalShowFunc<?php echo $rows_funcionario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<?php include("modal/modal_funcionario_exibir.php"); ?>
								</div>
								<!-- FIM MODAL EXIBIR FUNCIONARIO -->

								<!-- INICIO MODAL ALTERAR PRODUTO -->
								<div class="modal fade" id="editFunc<?php echo $rows_funcionario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<?php include("modal/modal_funcionario_alterar.php"); ?>
								</div>
								<!-- FIM MODAL ALTERAR PRODUTO  -->

								<!-- MODAL APAGAR PRODUTO -->
								<div class="modal fade" id="ModalDelFunc<?php echo $rows_funcionario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<?php include("modal/modal_funcionario_deletar.php"); ?>
								</div>
								<!-- FIM MODAL APAGAR PRODUTO-->
							<?php } ?>
						</tbody>
					</table>
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
		header("Location: index.php");
	}?>