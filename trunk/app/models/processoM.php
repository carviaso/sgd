<?php

class ProcessoM {

	/**
	 * Retorna um array com todos os objetos processo
	 *
	 * @return array
	 */
	function getAllProcessos( $filtro ) {
		$conexao = Conexao::con();
		$processos = array();
		$where = array();

		if ( !empty( $filtro ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'byIdProfessor':
					$where[] = 'WHERE p.id_professor = ' . $filtro->params->idProfessor;
				break;
			}
		}

		$sql[] = "SELECT * FROM processo p";
		$sql[] = join( ' ', $where );
		$sql[] = "ORDER BY p.id_processo";

		$query = mysqli_query( $conexao, join( ' ', $sql ) );
		while ( $row = mysqli_fetch_array( $query ) ) {
			$processo = new stdClass;
			$processo->idProcesso = $row['id_processo'];
			$processo->idProfessor = $row['id_professor'];
			$processo->processo = utf8_encode( $row['processo'] );
			$processo->descricao = utf8_encode( $row['descricao'] );
			$processos[] = $processo;
		}
		return $processos;
	}
}

?>