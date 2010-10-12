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
}

?>