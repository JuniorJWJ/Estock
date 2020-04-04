<?php
 	session_start();
	include_once("conexao.php");
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
			<title>Estoque</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
		   	<link rel="stylesheet" type="text/css" href="css/style.css">	
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

				
		</head>
		<body>
			<?php include_once("header_estoque.php")?>
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
								<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
									<?php $quantidade = $rows_produto['quantidade'] ?>
									<?php if($quantidade>0){ ?>
										<tr>
											<td><?php echo $rows_produto['id']; ?></td>
											<td><?php echo $rows_produto['nome']; ?></td>
											<td><img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 20px; height: 20px;"><br><br></td>
											<td><?php echo $rows_produto['codigo_barras']; ?></td>
											<td>
												
													<div class="form-group">
														<input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>">
														<!-- <input type="number" id="quantity" min="0" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade"> -->
														<input type="number" pattern="[0-9]*" id="spinner" name="quantidade_estoque" product-id="<?php echo $rows_produto['id']; ?>" 
															value="<?php echo $rows_produto['quantidade']; ?>"   min="0" max="200" step="0"  maxlength="3">
														<!-- <input type="submit" value ="Alterar quantidade"></td> -->
														<button type="submit" id="btn-save"><i class="fa fa-save"></i></button>
													</div>
												
											</td>
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
								<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
									<?php $quantidade = $rows_produto['quantidade'] ?>
									<?php if($quantidade<=0){ ?>
										<tr>
											<td><?php echo $rows_produto['id']; ?></td>
											<td><?php echo $rows_produto['nome']; ?></td>
											<td><img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 20px; height: 20px;"><br><br></td>
											<td><?php echo $rows_produto['codigo_barras']; ?></td>
											<td>
												
													<div class="form-group">
														<input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>">
														<!-- <input type="number" id="quantity" min="0" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade"> -->
														<input type="number" pattern="[0-9]*" id="spinner" name="quantidade_estoque" product-id="<?php echo $rows_produto['id']; ?>" 
															   value="<?php echo $rows_produto['quantidade']; ?>" min="0" max="200" step="0"  maxlength="3">														<button type="submit" id="btn-save"><i class="fa fa-save"></i></button>
													</div>
												
											</td>
										</tr>   
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
					</div>		
				</div>
			</div>
	
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>			
		<script src="js/bootstrap.min.js"></script>	
		<script>
			$(() =>{
				$("input[name='quantidade_estoque']").on('change', e =>{
					const campo = e.target;
					const id_produto = campo.getAttribute("product-id");
					const qte_digitada = campo.value;

					var requisicao = $.ajax("/estock-master/estoque_altera.php", {type: "POST", data: {id: id_produto, quantidade: qte_digitada}});
					// requisicao.done(function(mensagem){
					// 	alert(mensagem);
					// });
					// alert("iD é " + id_produto + ", Qte é " + qte_digitada);	
				});
			});
		</script>
	</body>
	</html>
<?php }else{
	header("Location: index.php");
}?>