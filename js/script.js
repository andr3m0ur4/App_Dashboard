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
})