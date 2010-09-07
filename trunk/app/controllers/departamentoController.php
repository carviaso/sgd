<?php

class DepartamentoController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function DepartamentoController() {}

	/**
	 * Retorna um array com todos os objetos Departamentos
	 *
	 * @return array
	 */
	public function getDepartamentos() {
		$departamentoDAO = new Departamento();
		return $departamentoDAO->getDepartamentos();
	}

	/**
	 * Realiza o cadastro de um novo departamento
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $sigla, $idCentro ) {
		$departamentoDAO = new Departamento();

		$erro = array();
		if ( empty( $nome ) ) $erro[] = 'Nome';
		if ( empty( $sigla ) ) $erro[] = 'Sigla';
		if ( empty( $idCentro ) ) $erro[] = 'Id do Centro';

		if ( count( $erro ) == 0 ) {
			$return = $departamentoDAO->cadastrar( $nome, $sigla, $idCentro );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Retorna todos os departamentos por centro
	 *
	 * @param int $idCentro
	 * @return array
	 */
	public function getDepartamentosPorCentro( $idCentro ) {
		$departamentoDAO = new Departamento();
		return $departamentoDAO->getDepartamentosPorCentro( $idCentro );
	}

	/**
	 * Retorna todos os professores por departamento
	 *
	 * @param int $idCentro
	 * @return array
	 */
	public function getProfessoresPorDepartamento( $idDepartamento ) {
		$departamentoDAO = new Departamento();
		return $departamentoDAO->getProfessoresPorDepartamento( $idDepartamento );
	}
}
?>