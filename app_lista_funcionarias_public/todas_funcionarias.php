<?php

	$acao = 'recuperar';
	require '../../app_lista_funcionarias/controller/funcionaria_controller.php';

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Funcionárias</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function remover(id) {
				location.href = 'todas_funcionarias.php?acao=remover&id='+id;
			}
			function editar(id) {
				location.href = 'editar_funcionaria.php?acao=pesquisar&id='+id;
			}
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista funcionárias
				</a>
			</div>
		</nav>

		<div class="app" style="margin-left: 25px;
   								margin-right: 25px;">
			<div>
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="nova_funcionaria.php">Nova funcionária</a></li>
						<li class="list-group-item active"><a href="#">Todas funcionárias</a></li>
					</ul>
				</div>

				<div>
					<div>
						<div>
							<div>
								<h4>Todas as funcionária</h4>
								<hr />
								<table class="table table-striped">
								<thead>
									<tr>
									<th scope="col"></th>
									<th scope="col">Nome</th>
									<th scope="col">Sexo</th>
									<th scope="col">CPF</th>
									<th scope="col">Data nascimento</th>
									<th scope="col">Email</th>
									<th scope="col">Celular</th>
									<th scope="col">Profissão</th>
									<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
										<?php foreach($pessoas as $indice => $pessoa) { ?>
												<tr>
												<th scope="row"  id="pessoa<?= $pessoa->id ?>"></th>
												<th><?=  mb_convert_encoding($pessoa->nome,'UTF-8', 'ISO-8859-1') ?> </th>
												<th><?= $pessoa->sexo ?>
												<th><?= $pessoa->cpf ?> 
												<th><?= $pessoa->nascimento ?> 
												<th><?= $pessoa->email ?>
												<th><?= $pessoa->celular ?>
												<th><?= $pessoa->profissao ?>
												<th>
													<div class="col-sm-3 mt-2 d-flex justify-content-between">
															<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $pessoa->id ?>)"></i>
															<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $pessoa->id ?>)"></i>
														</div>
										</tr>			
										<?php } ?>	
								</tbody>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

