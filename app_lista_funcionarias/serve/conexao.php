<?php

class Conexao {

	private $host = '107.180.57.185';
	private $dbname = 'dz_dev_test';
	private $user = 'dz_dev';
	private $pass = 'p?%3DY?#*LBW';
	//private $port = '3306';
	public function conectar() {
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"				
			);

			return $conexao;


		} catch (PDOException $e) {
			echo '<p>'.$e->getMessege().'</p>';
		}
	}
}

?>