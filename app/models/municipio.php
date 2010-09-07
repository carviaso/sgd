<?php

class Municipio {

	/**
	 * Retorna todos os municipios
	 *
	 * @return array
	 */
	function getAll() {
		$municipios = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT * FROM municipio m ORDER by m.nome";
		$query = mysqli_query( $conexao, join( '', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$municipio = new stdClass();
			$municipio->idMunicipio = $row['id_municipio'];
			$municipio->idUf = $row['id_uf'];
			$municipio->nome = utf8_encode( $row['nome'] );
			$municipios[] = $municipio;
		}
		return $municipios;
	}

	/**
	 * Realiza o cadastro de um novo municipio
	 *
	 * @return stdClass
	 */
	public function cadastrarMunicipio( $nome, $idUf ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$nome = utf8_decode( $nome );

		$sql[] = "INSERT INTO municipio ( id_uf, nome )";
		$sql[] = "VALUES (";
		$sql[] = "'{$idUf}', '{$nome}'";
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