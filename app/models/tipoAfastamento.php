<?php

class TipoAfastamento {

	/**
	 * Retorna um array com todos os objetos Tipo Afastamento
	 *
	 * @return array
	 */
	function getAll() {
		$conexao = Conexao::con();
		$tipoAfastamentos = array();

		$sql = "SELECT * FROM tipo_afastamento t ORDER BY t.descricao";
		$query = mysqli_query( $conexao, $sql );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$tipoAfastamento = new stdClass;
			$tipoAfastamento->idTipoAfastamento = utf8_encode( $row['id_tipo_afastamento'] );
			$tipoAfastamento->descricao = utf8_encode( $row['descricao'] );
			$tipoAfastamentos[] = $tipoAfastamento;
		}
		return $tipoAfastamentos;
	}

	/**
	 * Realiza o cadastro de um novo Tipo Afastamento
	 *
	 * @return stdClass
	 */
	public function cadastrar( $descricao ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$nome = utf8_decode( $descricao );

		$sql[] = "INSERT INTO tipo_afastamento ( descricao )";
		$sql[] = "VALUES (";
		$sql[] = "'{$descricao}'";
		$sql[] = ")";

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}
}

?>