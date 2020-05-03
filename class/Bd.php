<?php 

	// classe (model)
	class Bd
	{
		private $conexao;
		private $dashboard;

		public function __construct(Conexao $conexao, Dashboard $dashboard)
		{
			$this->conexao = $conexao->conectar();
			$this->dashboard = $dashboard;
		}

		public function getNumeroVendas()
		{
			$query = '
				SELECT COUNT(*) AS numero_vendas FROM tb_vendas 
				WHERE data_venda BETWEEN :data_inicio AND :data_fim
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
		}

		public function getTotalVendas()
		{
			$query = '
				SELECT SUM(total) AS total_vendas FROM tb_vendas 
				WHERE data_venda BETWEEN :data_inicio AND :data_fim
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		public function getClientesAtivos()
		{
			$query = '
				SELECT COUNT(*) AS clientes_ativos FROM tb_clientes 
				WHERE cliente_ativo = 1
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;
		}

		public function getClientesInativos()
		{
			$query = '
				SELECT COUNT(*) AS clientes_inativos FROM tb_clientes 
				WHERE cliente_ativo = 0
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->clientes_inativos;
		}

		public function getTotalReclamacoes()
		{
			$query = '
				SELECT COUNT(*) AS total_reclamacoes FROM tb_contatos
				WHERE tipo_contato = 1
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
		}

		public function getTotalElogios()
		{
			$query = '
				SELECT COUNT(*) AS total_elogios FROM tb_contatos
				WHERE tipo_contato = 2
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_elogios;
		}

		public function getTotalSugestoes()
		{
			$query = '
				SELECT COUNT(*) AS total_sugestoes FROM tb_contatos
				WHERE tipo_contato = 3
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_sugestoes;
		}

		public function getTotalDespesas()
		{
			$query = '
				SELECT SUM(total) AS total_despesas FROM tb_despesas 
				WHERE data_despesa BETWEEN :data_inicio AND :data_fim
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}
	}
	