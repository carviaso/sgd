<?php

class RegimeTrabalho {

	/**
	 * Retorna um array com todos os objetos regimes de trabalho
	 *
	 * @return array
	 */
	function getAllregimesTrabalho() {
		$conexao = Conexao::con();
		$regimesTrabalho = array();

		$sql = "SELECT * FROM regime_trabalho ORDER BY id_regime_trabalho";
		$query = mysqli_query( $conexao, $sql );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$regimeTrabalho = new stdClass;
			$regimeTrabalho->idRegimeTrabalho = utf8_encode( $row['id_regime_trabalho'] );
			$regimeTrabalho->descricao = utf8_encode( $row['descricao'] );
			$regimeTrabalho->quantidadeHoras = utf8_encode( $row['quantidade_horas'] );
			$regimeTrabalho->dedicacaoExclusiva = utf8_encode( $row['dedicacao_exclusiva'] );
			$regimesTrabalho[] = $regimeTrabalho;
		}
		return $regimesTrabalho;
	}
}

?>