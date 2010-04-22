<?php
	
include '../include/conexao.php';

class Professor {
	
	function getProfessores() {
		
		$professores = array();
		$conexao = Conexao::con();
		
		$sql[] = "SELECT p.nome, p.sobrenome FROM professor AS p";
		$query = mysqli_query( $conexao, join( '', $sql ) );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = array();
			$professor['nome'] = $row['nome'];
			$professor['sobrenome'] = $row['sobrenome'];
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
			$professor = array();
			$professor['nome'] = $row['nome'];
			$professor['sobrenome'] = $row['sobrenome'];
			$professores[] = $professor;
		}
		return $professores;
	}
}

?>