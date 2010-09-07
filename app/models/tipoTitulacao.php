<?php

class TipoTitulacao {

	/**
	 * Realiza o cadastro de um novo Tipo Afastamento
	 *
	 * @return stdClass
	 */
	public function cadastrar( $descricao ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$descricao = utf8_decode( $descricao );

		$sql[] = "INSERT INTO tipo_titulacao ( descricao )";
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

	/**
	 * Retorna um array com todos os objetos Titulacao
	 *
	 * @return array
	 */
	function getAll() {
		$conexao = Conexao::con();
		$titulacoes = array();

		$sql = "SELECT * FROM tipo_titulacao ORDER BY id_tipo_titulacao";
		$query = mysqli_query( $conexao, $sql );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$titulacao = new stdClass;
			$titulacao->idTipoTitulacao = utf8_encode( $row['id_tipo_titulacao'] );
			$titulacao->descricao = utf8_encode( $row['descricao'] );
			$titulacoes[] = $titulacao;
		}
		return $titulacoes;
	}

}

?>