<?php 

	// classe dashboard
	class Dashboard
	{
		public $data_inicio;
		public $data_fim;
		public $numero_vendas;
		public $total_vendas;
		public $clientes_ativos;
		public $clientes_inativos;
		public $total_reclamacoes;
		public $total_elogios;
		public $total_sugestoes;
		public $total_despesas;

		public function __get($atributo)
		{
			return $this->$atributo;
		}

		public function __set($atributo, $valor)
		{
			$this->$atributo = $valor;
			return $this;
		}
	}
	