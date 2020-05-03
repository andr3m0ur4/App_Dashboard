<?php 

	require_once './class/Dashboard.php';
	require_once './class/Conexao.php';
	require_once './class/Bd.php';

	// lógica do script
	$dashboard = new Dashboard();

	$conexao = new Conexao();

	$competencia = explode('-', $_GET['competencia']);
	$ano = $competencia[0];
	$mes = $competencia[1];

	$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

	$dashboard->__set('data_inicio', $ano . '-' . $mes . '-' . '01');
	$dashboard->__set('data_fim', $ano . '-' . $mes . '-' . $dias_do_mes);

	$bd = new Bd($conexao, $dashboard);

	$dashboard->__set('numero_vendas', $bd->getNumeroVendas());
	$dashboard->__set('total_vendas', $bd->getTotalVendas());
	$dashboard->__set('clientes_ativos', $bd->getClientesAtivos());
	$dashboard->__set('clientes_inativos', $bd->getClientesInativos());
	$dashboard->__set('total_reclamacoes', $bd->getTotalReclamacoes());
	$dashboard->__set('total_elogios', $bd->getTotalElogios());
	$dashboard->__set('total_sugestoes', $bd->getTotalSugestoes());
	$dashboard->__set('total_despesas', $bd->getTotalDespesas());
	
	echo json_encode($dashboard);
