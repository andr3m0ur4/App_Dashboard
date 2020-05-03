<?php 

	// classe de conexao com db
	class Conexao
	{
		private $host = 'localhost';
		private $dbname = 'dashboard';
		private $user = 'root';
		private $pass = '';

		public function conectar()
		{
			try {

				$conexao = new PDO(
					"mysql:host={$this->host};dbname={$this->dbname}",
					"{$this->user}",
					"{$this->pass}"
				);

				$conexao->exec('set charset set utf8');

				return $conexao;

			} catch (PDOException $e) {
				echo '<p>' . $e->getMessage() . '</p>';
			}
		}
	}
	