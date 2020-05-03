<?php 

	require_once './class/Dashboard.php';
	require_once './class/Conexao.php';
	require_once './class/Bd.php';

	// lógica do script
	$dashboard = new Dashboard();

	$conexao = new Conexao();

	$dashboard->__set('data_inicio', '2018-10-01');
	$dashboard->__set('data_fim', '2018-10-31');

	$bd = new Bd($conexao, $dashboard);

	$dashboard->__set('numero_vendas', $bd->getNumeroVendas());
	$dashboard->__set('total_vendas', $bd->getTotalVendas());
	$dashboard->__set('clientes_ativos', $bd->getClientesAtivos());
	$dashboard->__set('clientes_inativos', $bd->getClientesInativos());
	$dashboard->__set('total_reclamacoes', $bd->getTotalReclamacoes());
	$dashboard->__set('total_elogios', $bd->getTotalElogios());
	$dashboard->__set('total_sugestoes', $bd->getTotalSugestoes());
	$dashboard->__set('total_despesas', $bd->getTotalDespesas());
	print_r($dashboard);
