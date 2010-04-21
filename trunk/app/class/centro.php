<?php
	
include '../include/conexao.php';

class Centro {
	
	function getCentros() {
		
		$centros = array();
		$conexao = Conexao::con();
		$sql = "SELECT * FROM centro ORDER BY nome";
		$query = mysqli_query( $conexao, $sql );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$centro = array();
			$centro[] = $row['id_centro'];
			$centro[] = $row['nome'];
			$centro[] = $row['sigla'];
			$centros[] = $centro;
		}
		return $centros;
	}
}

?>