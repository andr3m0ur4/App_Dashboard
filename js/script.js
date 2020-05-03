$(document).ready(() => {
	
	$('#documentacao').on('click', () => {
		//$('#pagina').load('./documentacao.html')

		/*
		$.get('./documentacao.html', response => {
			$('#pagina').html(response)
		})
		*/

		$.post('./documentacao.html', response => {
			$('#pagina').html(response)
		})
	})

	$('#suporte').on('click', () => {
		//$('#pagina').load('./suporte.html')

		/*
		$.get('./suporte.html', response => {
			$('#pagina').html(response)
		})
		*/

		$.post('./suporte.html', response => {
			$('#pagina').html(response)
		})
	})

	// ajax
	$('#competencia').on('change', e => {

		let competencia = $(e.target).val()

		$.ajax({
			type: 'GET',
			url: './app.php',
			data: `competencia=${competencia}`,	// x-www-form-urlencoded
			dataType: 'json',
			success: dados => {
				$('#numero_vendas').html(dados.numero_vendas)
				$('#total_vendas').html(dados.total_vendas)
				$('#clientes_ativos').html(dados.clientes_ativos)
				$('#clientes_inativos').html(dados.clientes_inativos)
				$('#total_reclamacoes').html(dados.total_reclamacoes)
				$('#total_elogios').html(dados.total_elogios)
				$('#total_sugestoes').html(dados.total_sugestoes)
				$('#total_despesas').html(dados.total_despesas)
			},
			error: erro => {
				console.log(erro)
			}
		})
	})
})