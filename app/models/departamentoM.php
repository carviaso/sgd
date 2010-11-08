<?php

class DepartamentoM {

	/**
	 * Retorna todos os departamentos
	 *
	 * @return array
	 */
	function getDepartamentos( $filtro ) {

		$conexao = Conexao::con();
		$departamentos = array();
		$f = new FormataHelper();
		$where = array();

		if ( !empty( $filtro ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'byIdCentro':
					$where[] = 'WHERE c.id_centro = ' . $filtro->params->idCentro;
				break;
				case 'byIdProfessor':
					// Inner join separado, pois so deve ser utilizado junto com seletor de professor por id
					$where[] = "INNER JOIN professor p ON d.id_departamento = p.id_departamento";
					$where[] = 'WHERE p.id_professor = ' . $filtro->params->idProfessor;
				break;
			}
		}

		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, d.fone,";
		$sql[] = "c.sigla AS centro_sigla FROM centro c";
		$sql[] = "INNER JOIN departamento d ON c.id_centro = d.id_centro";
		$sql[] = join( ' ', $where );
		$sql[] = "ORDER by d.nome, centro_sigla, d.sigla ";

		$query = mysqli_query( $conexao, join( ' ', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$departamento = new stdClass;
			$departamento->idDepartamento = utf8_encode( $row['id_departamento'] );
			$departamento->nome = utf8_encode( $row['nome'] );
			$departamento->departamentoSigla = utf8_encode( $row['departamento_sigla'] );
			$departamento->centroSigla = utf8_encode( $row['centro_sigla'] );
			$departamento->fone = $f->foneFormato( $row['fone'] );
			$departamentos[] = $departamento;
		}
		return $departamentos;
	}

	/**
	 * Realiza o cadastro de um novo departamento
	 *
	 * @return stdClass
	 */
	public function cadastrar( $nome, $sigla, $idCentro, $fone ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$nome = utf8_decode( $nome );

		$sql[] = "INSERT INTO departamento ( id_centro, nome, sigla, fone )";
		$sql[] = "VALUES (";
		$sql[] = "'{$idCentro}', '{$nome}', '{$sigla}', '{$fone}'";
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
	 * Retorna o professor com cargo comissionado e departamento passado por parametro
	 *
	 * @param int $idCentro
	 * @param int $idCargoComissionado
	 * @param int $idProfessor
	 * @return array
	 */
	function getDepartamentoCargoComissionado( $idDepartamento, $idCargoComissionado, $idProfessor ) {
		$conexao = Conexao::con();
		$professores = array();
		$where[] = "where d.id_departamento = {$idDepartamento} and";
		$where[] = "dc.id_cargocomissionado = '$idCargoComissionado'";

		if ( !empty( $idProfessor ) ) {
			$where[] = "and dc.id_professor = '$idProfessor'";
		}

		$sql[] = "select p.id_professor, p.nome from departamento d";
		$sql[] = "inner join deptocargocomissionado dc";
		$sql[] = "on d.id_departamento = dc.id_departamento";
		$sql[] = "inner join professor p";
		$sql[] = "on dc.id_professor = p.id_professor";
		$sql[] = join( ' ', $where );

		$query = mysqli_query( $conexao, join( ' ', $sql ) );
		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new stdClass;
			$professor->idDiretor = $row['id_professor'];
			$professor->nome = utf8_encode( $row['nome'] );
			$professores[] = $professor;
		}
		return $professores;
	}

	/**
	 * Define o professor para o departamento e cargo passados como parametro
	 *
	 * @param int $idDepartamento
	 * @param int $idCargoComissionado
	 * @param int $idProfessor
	 * @return array
	 */
	function setDepartamentoCargoComissionado( $idDepartamento, $idCargoComissionado, $idProfessor ) {
		$conexao = Conexao::con();

		$sql[] = "SELECT COUNT(*) AS count FROM deptocargocomissionado d";
		$sql[] = "WHERE d.id_cargocomissionado = {$idCargoComissionado}";
		$sql[] = "AND d.id_departamento = {$idDepartamento}";
		$query = mysqli_query( $conexao, join( ' ', $sql ) );
		unset( $sql );

		$count = mysqli_fetch_array( $query, MYSQL_ASSOC );
		if ( $count['count'] == 1 ) {
			$sql[] = "UPDATE deptocargocomissionado";
			$sql[] = "SET id_professor = '{$idProfessor}'";
			$sql[] = "WHERE id_cargocomissionado = {$idCargoComissionado}";
			$sql[] = "AND id_departamento = {$idDepartamento}";
			$sql[] = "LIMIT 1";
		} else {
			$sql[] = "INSERT INTO deptocargocomissionado";
			$sql[] = "(id_cargocomissionado, id_professor, id_departamento)";
			$sql[] = "VALUES";
			$sql[] = "('{$idCargoComissionado}', '{$idProfessor}', '{$idDepartamento}')";
		}

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
			$return->msg = 'Atualizacao realizada com sucesso';
		} else {
			$return->result = 0;
			$return->msg = 'Erro ao realizar atualizacao';
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

	/**
	 * Retorna todos os departamentos por centro
	 *
	 * @param int $idCentro
	 * @return array
	 */
	function getDepartamentosPorCentro( $idCentro ) {

		$departamentos = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, c.sigla AS centro_sigla ";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro ";
		$sql[] = "where d.id_centro = {$idCentro} ORDER by d.nome, centro_sigla, d.sigla ";

		$query = mysqli_query( $conexao, join( '', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$departamento = new stdClass;
			$departamento->idDepartamento = utf8_encode( $row['id_departamento'] );
			$departamento->nome = utf8_encode( $row['nome'] );
			$departamento->departamentoSigla = utf8_encode( $row['departamento_sigla'] );
			$departamento->centroSigla = utf8_encode( $row['centro_sigla'] );
			$departamentos[] = $departamento;
		}
		return $departamentos;
	}

	/**
	 * Retorna todos os professores por departamento
	 *
	 * @param int $idDepartamento
	 * @return array
	 */
	function getProfessoresPorDepartamento( $idDepartamento, $filtro ) {

		$conexao = Conexao::con();
		$professores = array();
		$where = array( "WHERE p.id_departamento = {$idDepartamento}" );

		if ( !empty( $filtro ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'cargo':
					$where[] = 'AND p.id_cargo in (';
					$where[] = join( ',', $filtro->params->idCargo);
					$where[] = ')';
				break;
			}
		}

		$sql[] = "SELECT * FROM professor p";
		$sql[] = join( ' ', $where );
		$sql[] = "ORDER BY p.nome";
		$query = mysqli_query( $conexao, join( ' ', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$professor = new stdClass;
			$professor->idProfessor = utf8_encode( $row['id_professor'] );
			$professor->nome = utf8_encode( $row['nome'] );
			$professor->matricula = utf8_encode( $row['matricula'] );
			$professores[] = $professor;
		}
		return $professores;
	}

}
?>