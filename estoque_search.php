<?php
    session_start();
	include_once("conexao.php");
	include("modal.php");
	$result_cursos = "SELECT * FROM produto";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	$nome = mysqli_real_escape_string($conn, $_POST['nomeproduto']);
    $result_search = "SELECT * FROM produto WHERE nome LIKE '%$nome%'";
    $resultado_search = mysqli_query($conn, $result_search);
?>

<!DOCTYPE html>
<?php if($_SESSION['log'] == "logado"){?>
	<html lang="pt-br">
		<head>
        <meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Estoque</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
		   	<link rel="stylesheet" type="text/css" href="css/style.css">	
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
			
		</head>
		<body>
		<?php include_once("header_produto.php")?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">		
				<a href="http://localhost/estock-master/arquivo.php"><button type="button" class="quadrinhoarredondadoexemplo pull-right" >Gerar relatório</button></a>
				<button type="button" class="quadrinhoarredondadoexemplo pull-right" data-toggle="modal" data-target="#myModalcad">Cadastrar Produto</button>
				<button type="button" class="quadrinhoarredondadoexemplo pull-right" data-toggle="modal" data-target="#myModalcadCat">Cadastrar Categoria</button>
				<a href="http://localhost/estock-master/produto.php"><button type="button" class="quadrinhoarredondadoexemplo pull-right">Exibir produtos</button></a>
				<h1>Exibindo resultados de "<?php echo "$nome";?>" </h1>
			</div>
			
			
			<div class="container theme-showcase" role="main">
				<div class="page-header"> 
					<h1>Estoque</h1>
				</div>
				<div class="container theme-showcase" role="main">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome do Produto</th>
									<th>Foto</th>
									<th>Código de Barras</th>
									<th>Quantidade/Ação</th>
								</tr>
							</thead>
							<tbody>                         <!-- EXIBIR ESTOQUE-->
								<?php while($rows_produto = mysqli_fetch_assoc($resultado_search)){ ?>
									<?php $quantidade = $rows_produto['quantidade'] ?>
									<?php if($quantidade>0){ ?>
										<tr>
											<td><?php echo $rows_produto['id']; ?></td>
											<td><?php echo $rows_produto['nome']; ?></td>
											<td><img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 20px; height: 20px;"><br><br></td>
											<td><?php echo $rows_produto['codigo_barras']; ?></td>
											<td>
												<form method="POST" action="http://localhost/estock-master/estoque_update.php" enctype="multipart/form-data">
													<div class="form-group">
														<input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>">
														<!-- <input type="number" id="quantity" min="0" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade"> -->
														<span class="input-number-decrement">–</span>
														<input class="input-number" name="quantidade" type="text" value="<?php echo $rows_produto['quantidade']; ?>" min="0">
														<span class="input-number-increment">+</span>
														<!-- <input type="submit" value ="Alterar quantidade"></td> -->
														<button type="submit" id="btn-save"><i class="fa fa-save"></i></button>
													</div>
												</form>
											</td>
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