<?php

	require "../../app_lista_funcionarias/model/profissao.model.php";
	
	require "../../app_lista_funcionarias/service/profissao.service.php";
	
	require "../../app_lista_funcionarias/serve/conexao.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'recuperar') {
		
		$profissao = new Profissao();
		$conexao = new Conexao();

		$profissaoService = new ProfissaoService($conexao, $profissao);
		$profissoes = $profissaoService->recuperar();
	} 
?>