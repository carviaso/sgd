<?php

class Professor {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function Professor() {}

	/**
	 * Retorna todos os professores
	 *
	 * @return array
	 */
	function getAllProfessores() {

		$professores = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT * FROM professor p ORDER by p.nome";
		$query = mysqli_query( $conexao, join( '', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new stdClass();
			$professor->id_professor = $row['id_professor'];
			$professor->nome = utf8_encode( $row['nome'] );
			$professor->sobrenome = utf8_encode( $row['sobrenome'] );
			$professor->matricula = utf8_encode( $row['matricula'] );
			$professor->siape = utf8_encode( $row['siape'] );
			$professor->dataAdmissao = $row['data_admissao'];
			$professor->dataAdmissaoUfsc = $row['data_admissao_ufsc'];
			$professor->dataNascimento = $row['data_nascimento'];
			$professor->aposentado = utf8_encode( $row['aposentado'] );
			$professor->dataPrevistaAposentadoria = $row['data_previsao_aposentadoria'];
			$professor->dataEfetivaAposentadoria = $row['data_aposentadoria'];
			$professor->idDepartamento = $row['id_departamento'];
			$professor->idCategoriaFuncionalInicial = $row['id_categoria_funcional_inicial'];
			$professor->idCategoriaFuncionalAtual = $row['id_categoria_funcional_atual'];
			$professor->idTipoTitulacao = $row['id_tipo_titulacao'];
			$professor->idCategoriaFuncionalReferencia = $row['id_categoria_funcional_referencia'];
			$professor->idCargo = $row['id_cargo'];
			$professor->idSituacao = $row['id_situacao'];
			$professores[] = $professor;
		}
		return $professores;
	}

	/**
	 * Total de professores
	 *
	 * @return array
	 */
	function countTotalProfessores( $wh ) {
		$conexao = Conexao::con();

		$sql[] = "SELECT COUNT(*) AS count FROM professor {$wh}";
		$query = mysqli_query( $conexao, join( '', $sql ) );

		$count = mysqli_fetch_array( $query, MYSQL_ASSOC );
		return $count['count'];
	}

	/**
	 * Retorna um array com todos os professores no formato json para preenchimento de datatable
	 *
	 * @return json
	 */
	function getAllProfessoresJson( $start, $limit, $sidx, $sord, $count, $total_pages, $page, $wh ) {

		$professores = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT * FROM professor {$wh} ORDER BY $sidx $sord LIMIT $start, $limit";
		//echo join( '', $sql );
		$query = mysqli_query( $conexao, join( '', $sql ) );
		$return->page = $page;
		$return->total = $total_pages;
		$return->records = $count;
		$i = 0;
		while ( $row = mysqli_fetch_array( $query ) ) {
			$return->rows[$i]['id'] = $row['id_professor'];

			$idProfessor = $row['id_professor'];
			$nomeCompleto = utf8_encode( $row['nome'] . ' ' . $row['sobrenome'] );

			$return->rows[$i]['cell'] = array(
												"<div class='detalhesProfessor' title='Detalhes' id='{$idProfessor}'>&nbsp;</div><div class='detalhesProgressaoFuncional' title='Progressao Funcional' id='{$idProfessor}'>&nbsp;</div>",
												$idProfessor,
												$nomeCompleto,
												$row['matricula'],
												$row['siape']
											);
			$i++;
		}
		return $return;
	}

	/**
	 * Retorna todos os professores por departamento
	 *
	 * @param int $idDepartamento
	 * @return array
	 */
	function getProfessoresPorDepartamento( $idDepartamento ) {

		$professores = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT p.nome, p.sobrenome FROM professor AS p ";
		$sql[] = "LEFT JOIN departamento AS d ON p.id_departamento = d.id_departamento ";
		$sql[] = "WHERE d.id_departamento ='{$idDepartamento}' ORDER by p.nome";
		$query = mysqli_query( $conexao, join( '', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new stdClass();
			$professor->setNome = utf8_encode( $row['nome'] );
			$professor->setSobrenome = utf8_encode( $row['sobrenome'] );
			$professores[] = $professor;
		}
		return $professores;
	}

	/**
	 * Realiza o cadastro de um novo professor
	 *
	 * @return stdClass
	 */
	public function cadastrarProfessor( $nome, $sobrenome,$dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$dataNascimento = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataNascimento ) ) );
		$dataAdmissao = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataAdmissao ) ) );
		$dataAdmissaoUfsc = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataAdmissaoUfsc ) ) );
		$dataPrevistaAposentadoria = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataPrevistaAposentadoria ) ) );
		$dataEfetivaAposentadoria = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataEfetivaAposentadoria ) ) );

		$nome = utf8_decode( $nome );
		$sobrenome = utf8_decode( $sobrenome );
		$matricula = utf8_decode( $matricula );
		$siape = utf8_decode( $siape );
		$aposentado = utf8_decode( $aposentado );

		$sql[] = "INSERT INTO professor( nome, sobrenome, matricula, siape,";
		$sql[] = "data_admissao, data_admissao_ufsc, data_nascimento, aposentado,";
		$sql[] = "data_previsao_aposentadoria, data_aposentadoria, id_departamento,";
		$sql[] = "id_categoria_funcional_inicial, id_categoria_funcional_atual,";
		$sql[] = "id_tipo_titulacao, id_categoria_funcional_referencia, id_cargo, id_situacao )";
		$sql[] = "VALUES (";
		$sql[] = "'$nome', '$sobrenome', '$matricula', '$siape',";
		$sql[] = "'$dataAdmissao', '$dataAdmissaoUfsc', '$dataNascimento', '$aposentado',";
		$sql[] = "'$dataPrevistaAposentadoria', '$dataEfetivaAposentadoria', '$idDepartamento',";
		$sql[] = "'$idCategoriaFuncionalInicial', '$idCategoriaFuncionalAtual',";
		$sql[] = "'$idTipoTitulacao', '$idCategoriaFuncionalReferencia', '$idCargo', '$idSituacao' )";

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

	/**
	 * Realiza o cadastro de um regime de trabalho de professor
	 *
	 * @return stdClass
	 */
	public function cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$dataInicio = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataInicio ) ) );

		$processo = utf8_decode( $processo );
		$deliberacao = utf8_decode( $deliberacao );
		$portaria = utf8_decode( $portaria );

		$sql[] = "INSERT INTO regime_trabalho_professor (";
		$sql[] = "id_professor, id_regime_trabalho, processo, deliberacao, portaria, data_inicio )";
		$sql[] = "VALUES (";
		$sql[] = "'$idProfessor', '$idRegimeTrabalho', '$processo', '$deliberacao', '$portaria', '$dataInicio')";

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

	/**
	 * Realiza o cadastro de um afastamento de professor
	 *
	 * @return stdClass
	 */
	public function cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$dataInicio = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataInicio ) ) );
		$dataPrevisaoTermino = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataPrevisaoTermino ) ) );

		$processo = utf8_decode( $processo );
		$prorrogacao = utf8_decode( $prorrogacao );
		$observacao = utf8_decode( $observacao );

		$sql[] = "INSERT INTO afastamento (";
		$sql[] = "id_professor, id_instituicao, id_tipo_afastamento,";
		$sql[] = "id_tipo_titulacao, data_inicio, data_previsao_termino,";
		$sql[] = "meses_duracao,";
		$sql[] = "processo, flag_prorrogacao, observacao )";
		$sql[] = "VALUES (";
		$sql[] = "'$idProfessor', '$idInstituicao', '$idTipoAfastamento',";
		$sql[] = "'$idTipoTitulacao', '$dataInicio', '$dataPrevisaoTermino',";
		$sql[] = "period_diff(date_format('$dataPrevisaoTermino', '%Y%m'), date_format('$dataInicio', '%Y%m')),";
		$sql[] = "'$processo', '$prorrogacao', '$observacao')";

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

	/**
	 * Realiza o cadastro de um afastamento de professor
	 *
	 * @return stdClass
	 */
	public function cadastrarProgressaoFuncionalProfessor( $idProfessor, $idCategoriaFuncional, $processo, $dataAvaliacao, $notaAvaliacao, $dataInicio, $portaria ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$dataAvaliacao = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataAvaliacao ) ) );
		$dataInicio = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataInicio ) ) );

		$processo = utf8_decode( $processo );
		$portaria = utf8_decode( $portaria );

		$sql[] = "INSERT INTO progressao_funcional (";
		$sql[] = "id_professor, id_categoria_funcional,";
		$sql[] = "processo, data_avaliacao, nota_avaliacao,";
		$sql[] = "data_inicio, portaria )";
		$sql[] = "VALUES (";
		$sql[] = "'$idProfessor', '$idCategoriaFuncional',";
		$sql[] = "'$processo', '$dataAvaliacao', '$notaAvaliacao',";
		$sql[] = "'$dataInicio', '$portaria')";

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