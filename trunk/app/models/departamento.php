<?php

class Departamento {

	/**
	 * Retorna todos os departamentos
	 *
	 * @return array
	 */
	function getDepartamentos() {

		$departamentos = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT d.id_departamento, d.nome, d.sigla AS departamento_sigla, c.sigla AS centro_sigla ";
		$sql[] = "FROM centro c INNER JOIN departamento d ON c.id_centro = d.id_centro ORDER by d.nome, centro_sigla, d.sigla ";

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
	 * Realiza o cadastro de um novo departamento
	 *
	 * @return stdClass
	 */
	public function cadastrar( $nome, $sigla, $idCentro ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$nome = utf8_decode( $nome );

		$sql[] = "INSERT INTO departamento ( id_centro, nome, sigla )";
		$sql[] = "VALUES (";
		$sql[] = "'{$idCentro}', '{$nome}', '{$sigla}'";
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
	function getProfessoresPorDepartamento( $idDepartamento ) {

		$professores = array();
		$conexao = Conexao::con();

		$sql[] = "select * from professor where id_departamento = {$idDepartamento}";
		$query = mysqli_query( $conexao, join( '', $sql ) );

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