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
			
		</head>
		<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Listar Funcionário</h1>
			</div>
			<div class="pull-right">
				<a href="http://localhost/estock-master/sair.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Sair</button></a>
			</div>
			<div class="pull-left">
					<a href="http://localhost/estock-master/Estoque.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Estoque</button></a>
			</div>
			<?php 	
            if($_SESSION['permissao']=="1"){?>
                <div class="pull-left">
					<a href="http://localhost/estock-master/index.php"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" >Produto</button></a>
			    </div>
				<div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalCadFunc">Cadastrar Funcionário</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalReadFunc">Exibir Funcionário</button>
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
									<th>Nome do Funcionário</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php while($rows_funcionario = mysqli_fetch_assoc($resultado_funcionario)){ ?>
									<tr>
										<td><?php echo $rows_funcionario['id']; ?></td>
										<td><?php echo $rows_funcionario['nome']; ?></td>
										<td>
											<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalShowFunc<?php echo $rows_funcionario['id']; ?>">Visualizar</button>
											<?php if($_SESSION['permissao']=="1"){?>
											<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModalFunc<?php echo $rows_funcionario['id']; ?>" >Editar</button>
											<button type="button" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#myModalDelFunc<?php echo $rows_funcionario['id']; ?>" data-whatever="<?php echo $rows_produto['id']; ?>">Apagar</button>
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