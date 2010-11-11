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

	/**
	 * Retorna um array com todos os objetos processo
	 *
	 * @return array
	 */
	function getAllPortarias( $filtro ) {
		$conexao = Conexao::con();
		$portarias = array();
		$where = array();

		if ( !empty( $filtro ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'byIdProfessor':
					$where[] = 'WHERE p.id_professor = ' . $filtro->params->idProfessor;
				break;
			}
		}

		$sql[] = "SELECT * FROM portaria p";
		$sql[] = join( ' ', $where );
		$sql[] = "ORDER BY p.id_portaria";

		$query = mysqli_query( $conexao, join( ' ', $sql ) );
		while ( $row = mysqli_fetch_array( $query ) ) {
			$portaria = new stdClass;
			$portaria->idPortaria = $row['id_portaria'];
			$portaria->idProfessor = $row['id_professor'];
			$portaria->portaria = utf8_encode( $row['portaria'] );
			$portaria->descricao = utf8_encode( $row['descricao'] );
			$portarias[] = $portaria;
		}
		return $portarias;
	}
}

?>