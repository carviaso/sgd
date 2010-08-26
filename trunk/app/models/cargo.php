<?php

class Centro {

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
			$centro = new stdClass;
			$centro->idCentro = utf8_encode( $row['id_centro'] );
			$centro->idInstituicao = utf8_encode( $row['id_instituicao'] );
			$centro->nome = utf8_encode( $row['nome'] );
			$centro->sigla = utf8_encode( $row['sigla'] );
			$centros[] = $centro;
		}
		return $centros;
	}
	
	function viewDiretoresPorCentros( $idCentro ) {
		$conexao = Conexao::con();
		$centros = array();
		
		$sql = "SELECT * FROM centro where id_centro = {$idCentro} ORDER BY nome";
		$query = mysqli_query( $conexao, $sql );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$centro = new stdClass;
			$centro->idCentro = utf8_encode( $row['id_centro'] );
			$centro->idInstituicao = utf8_encode( $row['id_instituicao'] );
			$centro->nome = utf8_encode( $row['nome'] );
			$centro->sigla = utf8_encode( $row['sigla'] );
			$centros[] = $centro;
		}
		return $centros;
	}
}

?>