<?php

class Centro {
	
	private $idCentro = 0;
	private $idInstituicao = 0;
	private $nome = '';
	private $sigla = '';
	
	public function Centro() {}
	
	public function setIdCentro( $idCentro ) {
		$this->idCentro = $idCentro;
	}
	
	public function getIdCentro() {
		return $this->idCentro;
	}
	
	public function setIdInstituicao( $idInstituicao ) {
		$this->idInstituicao = $idInstituicao;
	}
	
	public function getIdInstituicao() {
		return $this->idInstituicao;
	}
	
	public function setNome( $nome ) {
		$this->nome = $nome;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setSigla( $sigla ) {
		$this->sigla = $sigla;
	}
	
	public function getSigla() {
		return $this->sigla;
	}

}
?>