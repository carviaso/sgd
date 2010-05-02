<?php

class Professor {
	
	var $idProfessor = '';
	var $situacaoIdSituacao = 0;
	var $departamentoIdDepartamento = 0;
	var $tipoTitulacaoIdTipoTitulacao = 0;
	var $categoriaFuncionalIdCategoriaFuncional = 0;
	var $cargoIdCargo = 0;
	var $nome = '';
	var $sobrenome = '';
	var $matricula = '';
	var $siape = '';
	var $dataAdmissao = '';
	var $dataAdmissaoUfsc = '';
	var $dataNascimento = '';
	var $aposentado = '';
	var $dataPrevisaoAposentadoria = '';
	var $dataAposentadoria = '';
	
	public function Professor() {}
	
	private function setIdProfessor( $idProfessor ) {
		$this->idProfessor = $idProfessor;
	}
	
	private function getIdProfessor() {
		return $this->idProfessor;
	}
	
	private function setSituacaoIdSituacao( $situacaoIdSituacao ) {
		$this->situacaoIdSituacao = $situacaoIdSituacao;
	}
	
	private function getSituacaoIdSituacao() {
		return $this->situacaoIdSituacao;
	}
	
	private function setDepartamentoIdDepartamento( $departamentoIdDepartamento ) {
		$this->departamentoIdDepartamento = $departamentoIdDepartamento;
	}
	
	private function getDepartamentoIdDepartamento() {
		return $this->departamentoIdDepartamento;
	}
	
	private function setTipoTitulacaoIdTipoTitulacao( $tipoTitulacaoIdTipoTitulacao ) {
		$this->tipoTitulacaoIdTipoTitulacao = $tipoTitulacaoIdTipoTitulacao;
	}
	
	private function getTipoTitulacaoIdTipoTitulacao() {
		return $this->tipoTitulacaoIdTipoTitulacao;
	}
	
	private function setCategoriaFuncionalIdCategoriaFuncional( $categoriaFuncionalIdCategoriaFuncional ) {
		$this->categoriaFuncionalIdCategoriaFuncional = $categoriaFuncionalIdCategoriaFuncional;
	}
	
	private function getCategoriaFuncionalIdCategoriaFuncional() {
		return $this->categoriaFuncionalIdCategoriaFuncional;
	}
	
	private function setCargoIdCargo( $cargoIdCargo ) {
		$this->cargoIdCargo = $cargoIdCargo;
	}
	
	private function getCargoIdCargo() {
		return $this->cargoIdCargo;
	}
	
	private function setNome( $nome ) {
		$this->nome = $nome;
	}
	
	private function getNome() {
		return $this->nome;
	}
	
	private function setSobrenome( $sobrenome ) {
		$this->sobrenome = $sobrenome;
	}
	
	private function getSobrenome() {
		return $this->sobrenome;
	}
	
	private function setMatricula( $matricula ) {
		$this->matricula = $matricula;
	}
	
	private function getMatricula() {
		return $this->matricula;
	}
	
	private function setSiape( $siape ) {
		$this->siape = $siape;
	}
	
	private function getSiape() {
		return $this->siape;
	}
	
	private function setDataAdmissao( $dataAdmissao ) {
		$this->dataAdmissao = $dataAdmissao;
	}
	
	private function getDataAdmissao() {
		return $this->dataAdmissao;
	}
	
	private function setDataAdmissaoUfsc( $dataAdmissaoUfsc ) {
		$this->dataAdmissaoUfsc = $dataAdmissaoUfsc;
	}
	
	private function getDataAdmissaoUfsc() {
		return $this->dataAdmissaoUfsc;
	}
	
	private function setDataNascimento( $dataNascimento ) {
		$this->dataNascimento = $dataNascimento;
	}
	
	private function getDataNascimento() {
		return $this->dataNascimento;
	}
	
	private function setAposentado( $aposentado ) {
		$this->aposentado = $aposentado;
	}
	
	private function getAposentado() {
		return $this->aposentado;
	}
	
	private function setDataPrevisaoAposentadoria( $dataPrevisaoAposentadoria ) {
		$this->dataPrevisaoAposentadoria = $dataPrevisaoAposentadoria;
	}
	
	private function getDataPrevisaoAposentadoria() {
		return $this->dataPrevisaoAposentadoria;
	}
	
	private function setDataAposentadoria( $dataAposentadoria ) {
		$this->dataAposentadoria = $dataAposentadoria;
	}
	
	private function getDataAposentadoria() {
		return $this->dataAposentadoria;
	}

}

?>