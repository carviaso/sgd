<?php

class Uf {

	/**
	 * Realiza o cadastro de uma nova Uf
	 *
	 * @return stdClass
	 */
	public function cadastrarUf( $idPais, $nome, $sigla ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$sql[] = "INSERT INTO uf ( id_pais, nome, sigla )";
		$sql[] = "VALUES (";
		$sql[] = "'{$idPais}', '{$nome}', '{$sigla}'";
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