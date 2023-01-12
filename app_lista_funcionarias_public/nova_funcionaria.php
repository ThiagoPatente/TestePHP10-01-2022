<?php

	$acao = 'recuperar';
	require '../../app_lista_funcionarias/controller/profissao_controller.php';

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
		<title>App Lista funcionárias</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script type="text/javascript"> 
		$(function(){
			$("#cpf").inputmask({
				mask: "999.999.999-99"
			});

			$("#rg").inputmask({
				mask: "99.999.999-9"
			});
			$("#celular").inputmask({
				mask: "(99) 99999-9999"
			});

			$("#telefone").inputmask({
				mask: "(99) 9999-9999"
			});
			});
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

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Funcionária inserida com sucesso!</h5>
			</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Nova funcionária</a></li>
						<li class="list-group-item"><a href="todas_funcionarias.php">Todas funcionárias</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova funcionária</h4>
								<hr />

								<form method="post" action="funcionaria_controller.php?acao=inserir">
									<div class="form-group">
										<label>Nome:</label>
										<input type="text" class="form-control" name="nome" required>
										<label>CPF:</label>
										<input  id ="cpf" type="text" class="form-control" name="cpf">
										<label>RG:</label> 
										<input id ="rg" type="text" class="form-control" name="rg">
										<label>Sexo:</label>
										<select id ="sexo" name ="sexo" class="form-select" aria-label="Default select example">
											<option selected>Selecionar</option>
											<option value="Masculino">Masculino</option>
											<option value="Feminino">Feminino</option>
										</select>
										<label>Data nascimento:</label>
										<input id ="nascimento" type="date" class="form-control" name="nascimento">
										<label>Celular:</label>
										<input id = "celular" type="text" class="form-control" name="celular">
										<label>Telefone:</label>
										<input id="telefone" type="text" class="form-control" name="telefone">
										<label>Email:</label>
										<input id ="email" name="email" type="email" class="form-control">
										<label>Profissão:</label>
										<select id ="profissao_id" name ="profissao_id" class="form-select" aria-label="Default select example">
										<option value ="" selected>Selecionar</option>
										<?php foreach($profissoes as $indice => $profissao) { ?>
											<option value="<?= $profissao->id ?>"><?= $profissao->nome ?></option>
										<?php } ?>
										</select>
									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>