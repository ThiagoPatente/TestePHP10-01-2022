<?php


//CRUD
class PessoaService {

	private $conexao;
	private $pessoa;

	public function __construct(Conexao $conexao, Pessoa $pessoa) {
		$this->conexao = $conexao->conectar();
		$this->pessoa =  $pessoa;
	}
	/**
	 * Função para inserção na tabela pessoas
	 *
	 * 
	 * @author Thiago Patente <teste@email.com>
	 * @return status   
 */ 
	public function inserir() { 
		$query = 'INSERT INTO pessoas(nome, nascimento, sexo, cpf, rg, email, telefone, celular, profissao_id)VALUES(?,
																													 ?,
																													 ?,
																													 ?,
																													 ?,
																													 ?,
																													 ?,
																													 ?,
																													 ?)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, mb_convert_encoding($this->pessoa->__get('nome'), 'ISO-8859-1', 'UTF-8'));
		$stmt->bindValue(2, $this->pessoa->__get('nascimento'));
		$stmt->bindValue(3, $this->pessoa->__get('sexo'));
		$stmt->bindValue(4, $this->pessoa->__get('cpf'));
		$stmt->bindValue(5, $this->pessoa->__get('rg'));
		$stmt->bindValue(6, $this->pessoa->__get('email'));
		$stmt->bindValue(7, $this->pessoa->__get('telefone'));
		$stmt->bindValue(8, $this->pessoa->__get('celular'));
		$stmt->bindValue(9, $this->pessoa->__get('profissao_id'));
		$stmt->execute();
	}

	/**
	 * Função para listagem da tabela pessoas listando mulheres com mais de 20 anos
	 *
	 * 
	 * @author Thiago Patente <teste@email.com>
	 * @return Array Resultado da busca no servidor   
 */ 
	public function recuperar() {
		$query = "
		SELECT P.id 'id',
			   P.nome 'nome',
			   P.sexo 'sexo',
			   P.cpf 'cpf',
			   P.nascimento 'nascimento',
			   P.email 'email',
			   P.celular 'celular',
			   Pf.nome 'profissao'
			   FROM pessoas P
			   JOIN profissoes AS Pf ON P.profissao_id = Pf.id
			   WHERE TIMESTAMPDIFF(YEAR,P.nascimento, NOW()) > 20 and P.sexo = 'Feminino';
		";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Função para atualizar  na tabela pessoas
	 *
	 * 
	 * @author Thiago Patente <teste@email.com>
	 * @return status   
 */ 
	public function atualizar() {
		$query = "UPDATE pessoas SET nome= ?, 
							         nascimento=?, 
									 sexo=?, 
									 cpf=?, 
									 rg=?, 
									 email=?,
									 telefone=?, 
									 celular=?, 
									 profissao_id=? 
		WHERE id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, mb_convert_encoding($this->pessoa->__get('nome'), 'ISO-8859-1', 'UTF-8'));
		$stmt->bindValue(2, $this->pessoa->__get('nascimento'));
		$stmt->bindValue(3, $this->pessoa->__get('sexo'));
		$stmt->bindValue(4, $this->pessoa->__get('cpf'));
		$stmt->bindValue(5, $this->pessoa->__get('rg'));
		$stmt->bindValue(6, $this->pessoa->__get('email'));
		$stmt->bindValue(7, $this->pessoa->__get('telefone'));
		$stmt->bindValue(8, $this->pessoa->__get('celular'));
		$stmt->bindValue(9, $this->pessoa->__get('profissao_id'));
		$stmt->bindValue(10, $this->pessoa->__get('id'));
		return $stmt->execute(); 
	}

	/**
	 * Função para buscar  na tabela pessoas uma coluna com base no id
	 *
	 * 
	 * @author Thiago Patente <teste@email.com>
	 * @return Array Resultado da busca no servidor   
 */ 
	public function pesquisar() { 

		$query = '
		SELECT P.id,
			   P.nome,
			   P.sexo,
			   P.cpf,
			   P.rg,
			   P.telefone,
			   P.nascimento,
			   P.email,
			   P.celular,
			   P.profissao_id 
			   FROM pessoas P
			   WHERE P.id = ?;
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->pessoa->__get('id'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Função para remoção de uma coluna  na tabela pessoas com base no id
	 *
	 * 
	 * @author Thiago Patente <teste@email.com>
	 * @return status   
 */ 
	public function remover() { 

		$query = 'DELETE FROM pessoas WHERE id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->pessoa->__get('id'));
		$stmt->execute();
	}
}

?>