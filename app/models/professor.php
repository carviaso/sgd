<?php

include '../../include/conexao.php';

class Professor {
	
	private $idProfessor = '';
	private $situacaoIdSituacao = 0;
	private $departamentoIdDepartamento = 0;
	private $tipoTitulacaoIdTipoTitulacao = 0;
	private $categoriaFuncionalIdCategoriaFuncional = 0;
	private $cargoIdCargo = 0;
	private $nome = '';
	private $sobrenome = '';
	private $matricula = '';
	private $siape = '';
	private $dataAdmissao = '';
	private $dataAdmissaoUfsc = '';
	private $dataNascimento = '';
	private $aposentado = '';
	private $dataPrevisaoAposentadoria = '';
	private $dataAposentadoria = '';
	
	public function Professor() {}
	
	public function setIdProfessor( $idProfessor ) {
		$this->idProfessor = $idProfessor;
	}
	
	public function getIdProfessor() {
		return $this->idProfessor;
	}
	
	public function setSituacaoIdSituacao( $situacaoIdSituacao ) {
		$this->situacaoIdSituacao = $situacaoIdSituacao;
	}
	
	public function getSituacaoIdSituacao() {
		return $this->situacaoIdSituacao;
	}
	
	public function setDepartamentoIdDepartamento( $departamentoIdDepartamento ) {
		$this->departamentoIdDepartamento = $departamentoIdDepartamento;
	}
	
	public function getDepartamentoIdDepartamento() {
		return $this->departamentoIdDepartamento;
	}
	
	public function setTipoTitulacaoIdTipoTitulacao( $tipoTitulacaoIdTipoTitulacao ) {
		$this->tipoTitulacaoIdTipoTitulacao = $tipoTitulacaoIdTipoTitulacao;
	}
	
	public function getTipoTitulacaoIdTipoTitulacao() {
		return $this->tipoTitulacaoIdTipoTitulacao;
	}
	
	public function setCategoriaFuncionalIdCategoriaFuncional( $categoriaFuncionalIdCategoriaFuncional ) {
		$this->categoriaFuncionalIdCategoriaFuncional = $categoriaFuncionalIdCategoriaFuncional;
	}
	
	public function getCategoriaFuncionalIdCategoriaFuncional() {
		return $this->categoriaFuncionalIdCategoriaFuncional;
	}
	
	public function setCargoIdCargo( $cargoIdCargo ) {
		$this->cargoIdCargo = $cargoIdCargo;
	}
	
	public function getCargoIdCargo() {
		return $this->cargoIdCargo;
	}
	
	public function setNome( $nome ) {
		$this->nome = $nome;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setSobrenome( $sobrenome ) {
		$this->sobrenome = $sobrenome;
	}
	
	public function getSobrenome() {
		return $this->sobrenome;
	}
	
	public function setMatricula( $matricula ) {
		$this->matricula = $matricula;
	}
	
	public function getMatricula() {
		return $this->matricula;
	}
	
	public function setSiape( $siape ) {
		$this->siape = $siape;
	}
	
	public function getSiape() {
		return $this->siape;
	}
	
	public function setDataAdmissao( $dataAdmissao ) {
		$this->dataAdmissao = $dataAdmissao;
	}
	
	public function getDataAdmissao() {
		return $this->dataAdmissao;
	}
	
	public function setDataAdmissaoUfsc( $dataAdmissaoUfsc ) {
		$this->dataAdmissaoUfsc = $dataAdmissaoUfsc;
	}
	
	public function getDataAdmissaoUfsc() {
		return $this->dataAdmissaoUfsc;
	}
	
	public function setDataNascimento( $dataNascimento ) {
		$this->dataNascimento = $dataNascimento;
	}
	
	public function getDataNascimento() {
		return $this->dataNascimento;
	}
	
	public function setAposentado( $aposentado ) {
		$this->aposentado = $aposentado;
	}
	
	public function getAposentado() {
		return $this->aposentado;
	}
	
	public function setDataPrevisaoAposentadoria( $dataPrevisaoAposentadoria ) {
		$this->dataPrevisaoAposentadoria = $dataPrevisaoAposentadoria;
	}
	
	public function getDataPrevisaoAposentadoria() {
		return $this->dataPrevisaoAposentadoria;
	}
	
	public function setDataAposentadoria( $dataAposentadoria ) {
		$this->dataAposentadoria = $dataAposentadoria;
	}
	
	public function getDataAposentadoria() {
		return $this->dataAposentadoria;
	}
	
	function getProfessores() {
		
		$professores = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT * FROM professor p ORDER by p.nome";
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new Professor();
			$professor->setNome( $row['nome'] );
			$professor->setAposentado( $row['nome'] );			
			$professor->setSobrenome( $row['sobrenome'] );
			$professores[] = $professor;
		}
		return $professores;
	}
	
	function getProfessoresPorDepartamento( $idDepartamento ) {
		
		$professores = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT p.nome, p.sobrenome FROM professor AS p ";
		$sql[] = "LEFT JOIN departamento AS d ON p.id_departamento = d.id_departamento ";
		$sql[] = "WHERE d.id_departamento ='{$idDepartamento}' ORDER by p.nome";
		
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new Professor();
			$professor->setNome( $row['nome'] );
			$professor->setSobrenome( $row['sobrenome'] );
			$professores[] = $professor;
		}
		return $professores;
	}

}

?>