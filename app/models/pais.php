<?php

class Pais {

	/**
	 * Realiza o cadastro de um novo pais
	 *
	 * @return stdClass
	 */
	public function cadastrarPais( $nome, $sigla ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$sql[] = "INSERT INTO pais ( nome, sigla )";
		$sql[] = "VALUES (";
		$sql[] = "'{$nome}', '{$sigla}'";
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