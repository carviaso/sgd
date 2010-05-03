<?php

include_once '../../include/conexao.php';

class Departamento {
	
	private $idDepartamento = 0;
	private $idCentro = 0;
	private $nome = '';
	private $sigla = '';
	
	public function Departamento() {}
	
	public function setIdDepartamento( $idDepartamento ) {
		$this->idDepartamento = $idDepartamento;
	}
	
	public function getIdDepartamento() {
		return $this->idDepartamento;
	}
	
	public function setIdCentro( $idCentro ) {
		$this->idCentro = $idCentro;
	}
	
	public function getIdCentro() {
		return $this->idCentro;
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
	
	/**
	 * Retorna todos os departamentos
	 *
	 * @return array
	 */
	function getDepartamentos() {
		
		$departamentos = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, c.sigla AS centro_sigla ";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro ORDER by d.nome, centro_sigla, d.sigla ";
		
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$departamento = array();
			$departamento['id_departamento'] = $row['id_departamento'];
			$departamento['nome'] = $row['nome'];
			$departamento['departamento_sigla'] = $row['departamento_sigla'];
			$departamento['centro_sigla'] = $row['centro_sigla'];
			$departamentos[] = $departamento;
		}
		return $departamentos;
	}
	
	/**
	 * Retorna todos os departamentos por centro
	 *
	 * @param int $idCentro
	 * @return array
	 */
	function getDepartamentosPorCentro( $idCentro ) {
		
		$departamentos = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, c.sigla AS centro_sigla ";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro ";
		$sql[] = "where d.id_centro = {$idCentro} ORDER by d.nome, centro_sigla, d.sigla ";
		
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$departamento = array();
			$departamento['id_departamento'] = $row['id_departamento'];
			$departamento['nome'] = $row['nome'];
			$departamento['departamento_sigla'] = $row['departamento_sigla'];
			$departamento['centro_sigla'] = $row['centro_sigla'];
			$departamentos[] = $departamento;
		}
		return $departamentos;
	}

}
?>