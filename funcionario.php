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
								</div>
								<!-- FIM MODAL EXIBIR FUNCIONARIO -->

								<!-- INICIO MODAL ALTERAR PRODUTO -->
								<div class="modal fade" id="editFunc<?php echo $rows_funcionario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
								</div>
								<!-- FIM MODAL ALTERAR PRODUTO  -->
								<!-- MODAL APAGAR PRODUTO -->
								<div class="modal fade" id="ModalDelFunc<?php echo $rows_funcionario['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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