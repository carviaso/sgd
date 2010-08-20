<?php

include '../../include/conexao.php';

class Professor {
	
	/**
	 * Retorna todos os professores
	 *
	 * @return array
	 */
	function getProfessores() {
		
		$professores = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT * FROM professor p ORDER by p.nome";
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new stdClass();
			$professor->setNome( $row['nome'] );
			$professor->setAposentado( $row['nome'] );			
			$professor->setSobrenome( $row['sobrenome'] );
			$professores[] = $professor;
		}
		return $professores;
	}
	
	/**
	 * Retorna todos os professores por departamento
	 *
	 * @param int $idDepartamento
	 * @return array
	 */
	function getProfessoresPorDepartamento( $idDepartamento ) {
		
		$professores = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT p.nome, p.sobrenome FROM professor AS p ";
		$sql[] = "LEFT JOIN departamento AS d ON p.id_departamento = d.id_departamento ";
		$sql[] = "WHERE d.id_departamento ='{$idDepartamento}' ORDER by p.nome";
		
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new stdClass();
			$professor->setNome( $row['nome'] );
			$professor->setSobrenome( $row['sobrenome'] );
			$professores[] = $professor;
		}
		return $professores;
	}

}

?>