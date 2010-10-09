<?php

class DepartamentoC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function DepartamentoController() {
		$this->model = new DepartamentoM();
		$this->view = new DepartamentoV();
	}

	/**
	 * Retorna um array com todos os objetos Departamentos
	 *
	 * @return array
	 */
	public function getDepartamentos() {
		return $this->model->getDepartamentos();
	}

	/**
	 * Retorna um array com todos os objetos Departamentos
	 *
	 * @return array
	 */
	public function getDepartamentoJson() {
		return $this->model->getDepartamentoJson();
	}

	/**
	 * Realiza o cadastro de um novo departamento
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $sigla, $idCentro ) {
		$erro = array();
		if ( empty( $nome ) ) $erro[] = 'Nome';
		if ( empty( $sigla ) ) $erro[] = 'Sigla';
		if ( empty( $idCentro ) ) $erro[] = 'Id do Centro';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrar( $nome, $sigla, $idCentro );
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
		return $this->model->getDepartamentosPorCentro( $idCentro );
	}

	/**
	 * Retorna todos os professores por departamento
	 *
	 * @param int $idCentro
	 * @return array
	 */
	public function getProfessoresPorDepartamento( $idDepartamento ) {
		return $this->model->getProfessoresPorDepartamento( $idDepartamento );
	}
}
?>