<?php
/**
 * Classe Pessoas
 *
 *
 * @copyright  2006 teste Technologies
 * @license    http://www.zend.com/license/3_0.txt   PHP License 3.0
 * @version    Release: 1.0
 * @link       http://dev.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */ 

class Pessoa {
	private $id;
	private $nome;
	private $nascimento;
	private $sexo;
	private $cpf;
	private $rg;
	private $email;
	private $celular;
	private $profissao_id;
	private $profissao;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>