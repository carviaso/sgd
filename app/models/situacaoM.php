<?php

class SituacaoM {

	/**
	 * Retorna um array com todos os objetos Situacao
	 *
	 * @return array
	 */
	function getSituacoes() {
		$conexao = Conexao::con();
		$situacoes = array();

		$sql = "SELECT * FROM situacao ORDER BY descricao_situacao";
		$query = mysqli_query( $conexao, $sql );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$situacao = new stdClass;
			$situacao->idSituacao = utf8_encode( $row['id_situacao'] );
			$situacao->descricaoSituacao = utf8_encode( $row['descricao_situacao'] );
			$situacoes[] = $situacao;
		}
		return $situacoes;
	}


	/**
	 * Retorna os status por situacao
	 *
	 * @return array
	 */
	function getStatusBySituacao( $filtro ) {

		$conexao = Conexao::con();
		$status = array();
		$where = array();

		if ( !empty( $filtro ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'statusBySituacao':
					$where[] = 'WHERE s.id_situacao = ' . $filtro->params->idSituacao;
				break;
			}
		}
		$sql[] = "SELECT * FROM status_atual_professor s";
		$sql[] = "inner join situacao si on s.id_situacao = si.id_situacao";
		$sql[] = join( ' ', $where );
		$sql[] = "ORDER BY s.descricao";
		$query = mysqli_query( $conexao, join( ' ', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$s = new stdClass;
			$s->idStatus = utf8_encode( $row['id_status'] );
			$s->idSituacao = utf8_encode( $row['id_situacao'] );
			$s->descricao = utf8_encode( $row['descricao'] );
			$status[] = $s;
		}
		return $status;
	}
}

?>