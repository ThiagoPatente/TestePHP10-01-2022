<?php

	$acao = 'recuperar';
	require '../../app_lista_funcionarias/controller/funcionaria_controller.php';

	$pessoaEditar = $PessoaAchada[0]


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

			/**
			 * Função para atualizar value nos inputs
			 * 
			 * @param string  {value} valor que esta sendo digitado 
			 * @param string {input} id do input 
			 * @returns {void}
			*/
			function atualizarValue(value,input) {
				$(""+input).attr('value',value)
			}
			
			/**
			 * Função para atualizar selected 
			 * 
			 * @param string  {value} valor da option que será colocado o selected
			 * @param string  {select} id do select 
			 * @returns {void}
			*/
			function atualizarSelect(value,select) {
				$(''+select+' option').each(function(){
						$(this).removeAttr("selected");
					});
								
				$(''+select+' option[value='+value+']').attr('selected','selected');


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
								<h4>Editar funcionária</h4>
								<hr />

								<form method="post" action="funcionaria_controller.php?acao=atualizar">
									<div class="form-group">
									<input id ="id" type="hidden" name="id" value = "<?= $pessoaEditar->id ?>">
										<label>Nome:</label>
										<input id ="nome"type="text" class="form-control" name="nome" required value = "<?= mb_convert_encoding($pessoaEditar->nome,'UTF-8', 'ISO-8859-1') ?>" onblur = "atualizarValue (this.value,'#nome')">
										<label>CPF:</label>
										<input  id ="cpf" type="text" class="form-control" name="cpf" value = "<?= $pessoaEditar->cpf ?>" onblur = "atualizarValue (this.value,'#cpf')">
										<label>RG:</label> 
										<input id ="rg" type="text" class="form-control" name="rg" value = "<?= $pessoaEditar->rg ?>" onblur = "atualizarValue (this.value,'#rg')">
										<label>Sexo:</label>
										<select id ="sexo" name ="sexo" class="form-select" aria-label="Default select example" onblur = "atualizarSelect (this.value,'#sexo')">
											<option>Selecionar</option>
											<option <?php echo $pessoaEditar->sexo == 'Masculino' ?  "selected" :'' ?> value="Masculino" >Masculino</option>
											<option <?php echo $pessoaEditar->sexo == 'Feminino' ?  "selected" :'' ?> value="Feminino">Feminino</option>
										</select>
										<label>Data nascimento:</label>
										<input id ="nascimento" type="date" class="form-control" name="nascimento" value = "<?= $pessoaEditar->nascimento ?>" onblur = "atualizarValue (this.value,'#nascimento')">
										<label>Celular:</label>
										<input id = "celular" type="text" class="form-control" name="celular" value = "<?= $pessoaEditar->celular ?>" onblur = "atualizarValue (this.value,'#celular')">
										<label>Telefone:</label>
										<input id="telefone" type="text" class="form-control" name="telefone" value = "<?= $pessoaEditar->telefone ?>" onblur = "atualizarValue (this.value,'#telefone')">
										<label>Email:</label>
										<input id ="email" name="email" type="email" class="form-control" value = "<?= $pessoaEditar->email ?>" onblur = "atualizarValue (this.value,'#email')">
										<label>Profissão:</label>
										<select id ="profissao_id" name ="profissao_id" class="form-select" aria-label="Default select example" onblur = "atualizarSelect (this.value,'#profissao_id')">
										<option value ="" >Selecionar</option>
										<?php foreach($profissoes as $indice => $profissao) { ?>
											<option  <?php echo $pessoaEditar->profissao_id == $profissao->id ?  "selected" :'' ?> value="<?= $profissao->id ?>"><?= $profissao->nome ?></option>
										<?php } ?>
										</select>
									</div>
									

									<button class="btn btn-success">Editar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>