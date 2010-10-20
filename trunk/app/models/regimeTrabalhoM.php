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
	function getAllregimesTrabalho( $filtro ) {
		$conexao = Conexao::con();
		$regimesTrabalho = array();
		$where = array();
		$d = new DataHelper();

		if ( !empty( $filtro ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'byIdProfessor':
					// Inner join separado, pois so deve ser utilizado junto com seletor de professor por id
					$where[] = "INNER JOIN regime_trabalho_professor rt ON r.id_regime_trabalho = rt.id_regime_trabalho";
					$where[] = 'WHERE rt.id_professor = ' . $filtro->params->idProfessor;
				break;
			}
		}

		$sql[] = "SELECT * FROM regime_trabalho r";
		$sql[] = join( ' ', $where );
		$sql[] = "ORDER BY r.id_regime_trabalho";

		$query = mysqli_query( $conexao, join( ' ', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$regimeTrabalho = new stdClass;
			$regimeTrabalho->idRegimeTrabalho = utf8_encode( $row['id_regime_trabalho'] );
			$regimeTrabalho->descricao = utf8_encode( $row['descricao'] );
			$regimeTrabalho->quantidadeHoras = utf8_encode( $row['quantidade_horas'] );
			$regimeTrabalho->dedicacaoExclusiva = utf8_encode( $row['dedicacao_exclusiva'] );
			$regimeTrabalho->idRegimeTrabalhoProfessor = $row['id_regime_trabalho_professor'];
			$regimeTrabalho->idProfessor = $row['id_professor'];
			$regimeTrabalho->idRegimeTrabalho = $row['id_regime_trabalho'];
			$regimeTrabalho->processo = utf8_encode( $row['processo'] );
			$regimeTrabalho->deliberacao = utf8_encode( $row['deliberacao'] );
			$regimeTrabalho->portaria = utf8_encode( $row['portaria'] );
			$regimeTrabalho->dataInicio = $d->validaData( $row['data_inicio'] );
			$regimesTrabalho[] = $regimeTrabalho;
		}
		return $regimesTrabalho;
	}
}

?>