<?php

class Cargo {

	/**
	 * Retorna um array com todos os objetos Cargo
	 *
	 * @return array
	 */
	function getCargos() {
		$conexao = Conexao::con();
		$cargos = array();
		
		$sql = "SELECT * FROM cargo ORDER BY descricao_cargo";
		$query = mysqli_query( $conexao, $sql );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$cargo = new stdClass;
			$cargo->idCargo = utf8_encode( $row['id_cargo'] );
			$cargo->descricaoCargo = utf8_encode( $row['descricao_cargo'] );
			$cargos[] = $cargo;
		}
		return $cargos;
	}
}

?>