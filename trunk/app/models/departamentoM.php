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
			}
		}

		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, d.fone,";
		$sql[] = "c.sigla AS centro_sigla";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro";
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
					$where[] = join( ',', $filtro->params->idCargo );
					$where[] = ')';
				break;
			}
		}

		$sql[] = "SELECT * FROM professor p";
		$sql[] = join( ' ', $where );
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