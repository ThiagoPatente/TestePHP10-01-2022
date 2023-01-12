<?php
	require "../../app_lista_funcionarias/serve/conexao.php";
	
	require "../../app_lista_funcionarias/service/funcionaria.service.php";
	require "../../app_lista_funcionarias/service/profissao.service.php";
	
	require "../../app_lista_funcionarias/model/funcionaria.model.php";
	require "../../app_lista_funcionarias/model/profissao.model.php";
	
	
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' ) {
		$pessoa = new Pessoa();
		$pessoa->__set('nome', $_POST['nome']);
		$pessoa->__set('nascimento', $_POST['nascimento']);
		$pessoa->__set('sexo', $_POST['sexo']);
		$pessoa->__set('cpf', $_POST['cpf']);
		$pessoa->__set('rg', $_POST['rg']);
		$pessoa->__set('email', $_POST['email']);
		$pessoa->__set('telefone', $_POST['telefone']);
		$pessoa->__set('celular', $_POST['celular']);
		$pessoa->__set('profissao_id', $_POST['profissao_id']);

		$conexao = new Conexao();

		$pessoaService = new PessoaService($conexao, $pessoa);
		$pessoaService->inserir();

		header('Location: nova_funcionaria.php?inclusao=1');
	
	} else if($acao == 'recuperar') {

		$pessoa = new Pessoa();
		$conexao = new Conexao();

		$pessoaService = new PessoaService($conexao, $pessoa);
		$pessoas = $pessoaService->recuperar();

		
	
	} else if($acao == 'pesquisar') {

		$pessoa = new Pessoa();
		$pessoa->__set('id',$_GET['id']); 

		$conexao = new Conexao();

		$pessoaService = new PessoaService($conexao, $pessoa);
		$PessoaAchada = $pessoaService->pesquisar();

		$profissao = new Profissao();
		$profissaoService = new ProfissaoService($conexao, $profissao);
		$profissoes = $profissaoService->recuperar();

	}

	else if($acao == 'atualizar') {

		$pessoa = new Pessoa();
		$pessoa->__set('id', $_POST['id']);
		$pessoa->__set('nome', $_POST['nome']);
		$pessoa->__set('nascimento', $_POST['nascimento']);
		$pessoa->__set('sexo', $_POST['sexo']);
		$pessoa->__set('cpf', $_POST['cpf']);
		$pessoa->__set('rg', $_POST['rg']);
		$pessoa->__set('email', $_POST['email']);
		$pessoa->__set('telefone', $_POST['telefone']);
		$pessoa->__set('celular', $_POST['celular']);
		$pessoa->__set('profissao_id', $_POST['profissao_id']);
		
		$conexao = new Conexao();

		$pessoaService = new PessoaService($conexao, $pessoa);
		if($pessoaService->atualizar()) {
			header('location: todas_funcionarias.php');
		}


	} else if($acao == 'remover') {

		$pessoa = new Pessoa();
		$pessoa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$pessoaService = new PessoaService($conexao, $pessoa);
		$pessoaService->remover();

		header('location: todas_funcionarias.php');
	}

?>