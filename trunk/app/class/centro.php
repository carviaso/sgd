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
			$centro['id_centro'] = utf8_decode( $row['id_centro'] );
			$centro['nome'] = $row['nome'];
			$centro['sigla'] = $row['sigla'];
			$centros[] = $centro;
		}
		return $centros;
	}
}

?>