<?php

include_once '../../include/conexao.php';

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
	
	/**
	 * Retorna um array com todos os objetos Centro
	 *
	 * @return array
	 */
	function getCentros() {
		
		$conexao = Conexao::con();
		$centros = array();
		
		$sql = "SELECT * FROM centro ORDER BY nome";
		$query = mysqli_query( $conexao, $sql );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$centro = new Centro();
			$centro->setIdCentro( $row['id_centro'] );
			$centro->setIdInstituicao( $row['id_instituicao'] );
			$centro->setNome( $row['nome'] );
			$centro->setSigla( $row['sigla'] );
			$centros[] = $centro;
		}
		return $centros;
	}

}
?>