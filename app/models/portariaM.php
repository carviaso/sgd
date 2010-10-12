<?php

class PortariaM {

	/**
	 * Cadastra uma nova portaria
	 *
	 * @return array
	 */
	function cadPortaria( $idProfessor, $portaria, $descricao ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$portaria = utf8_decode( $portaria );
		$descricao = utf8_decode( $descricao );

		$sql[] = "INSERT INTO portaria ( id_professor, portaria, descricao )";
		$sql[] = "VALUES (";
		$sql[] = "'$idProfessor', '$portaria', '$descricao'";
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