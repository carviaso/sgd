<?php
	
include '../include/conexao.php';

class Departamento {
	
	function getDepartamentos() {
		
		$departamentos = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, c.sigla AS centro_sigla ";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro ORDER by centro_sigla, d.nome, d.sigla ";
		
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
	
	function getDepartamentosPorCentro( $idCentro ) {
		
		$departamentos = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, c.sigla AS centro_sigla ";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro ";
		$sql[] = "where d.id_centro = {$idCentro} ORDER by centro_sigla, d.nome, d.sigla ";
		
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