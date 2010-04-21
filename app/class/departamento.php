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
			$departamento[] = $row['id_departamento'];
			$departamento[] = $row['nome'];
			$departamento[] = $row['departamento_sigla'];
			$departamento[] = $row['centro_sigla'];
			$departamentos[] = $departamento;
		}
		return $departamentos;
	}
}

?>