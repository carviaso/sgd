<?php

class RegimeTrabalhoM {

	/**
	 * Realiza o cadastro de um novo Regime de Trabalho
	 *
	 * @return stdClass
	 */
	public function cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$descricao = utf8_decode( $descricao );

		$sql[] = "INSERT INTO regime_trabalho ( descricao, quantidade_horas, dedicacao_exclusiva )";
		$sql[] = "VALUES (";
		$sql[] = "'{$descricao}', '{$quantidadeHoras}', '{$dedicacaoExclusiva}'";
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