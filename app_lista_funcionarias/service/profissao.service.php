<?php


//CRUD
class ProfissaoService {

	private $conexao;
	private $profissao;

	public function __construct(Conexao $conexao, Profissao $profissao) {
		$this->conexao = $conexao->conectar();
		$this->profissao = $profissao;
	}

	public function recuperar() { //read
		$query = "
		SELECT P.id 'id',
			   P.nome 'nome'
			   FROM profissoes P;
		";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}

?>