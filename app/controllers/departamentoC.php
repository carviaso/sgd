<?php

class DepartamentoC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function DepartamentoC() {
		$this->model = new DepartamentoM();
		$this->view = new DepartamentoV();
	}

	/**
	 * Retorna um array com todos os objetos Departamentos
	 *
	 * @return array
	 */
	public function getDepartamentos( $returnType, $filtro ) {
		$return = $this->model->getDepartamentos( $filtro );
		if ( $returnType == 'json' ) {
			echo json_encode( $return );
		} else {
			return $return;
		}
	}

	/**
	 * Realiza o cadastro de um novo departamento
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $sigla, $idCentro, $fone ) {
		$erro = array();
		if ( empty( $nome ) ) $erro[] = 'Nome';
		if ( empty( $sigla ) ) $erro[] = 'Sigla';
		if ( empty( $idCentro ) ) $erro[] = 'Id do Centro';
		if ( empty( $fone ) ) $erro[] = 'Teleone';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrar( $nome, $sigla, $idCentro, $fone );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}


	/**
	 * Exibe o select para escolha do centro
	 *
	 * @return void
	 */
	public function relChefesDepartamento() {
		$departamentos = $this->getDepartamentos( '', '' );
		$this->view->relChefesDepartamentos( $departamentos );
	}

	/**
	 * Exibe o diretor e vice-diretor do centro
	 *
	 * @param int $idCentro
	 * @return void
	 */
	public function relChefesPorDepartamento( $idDepartamento ) {
		$chefes = $this->model->getDepartamentoCargoComissionado( $idDepartamento, CHEFEDODEPARTAMENTO, '' );
		$subChefes = $this->model->getDepartamentoCargoComissionado( $idDepartamento, SUBCHEFEDODEPARTARTAMENTO, '' );
		$this->view->relChefesPorDepartamento( $chefes, $subChefes );
	}

	/**
	 * Retorna todos os professores por departamento
	 *
	 * @param int $idCentro
	 * @return array
	 */
	public function relProfessoresPorDepartamento( $idDepartamento, $filtro ) {
		$professores = $this->getProfessoresPorDepartamento( $idDepartamento, $filtro );
		return $this->view->relProfessoresPorDepartamento( $professores );
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
	public function getProfessoresPorDepartamento( $idDepartamento, $filtro ) {
		return $this->model->getProfessoresPorDepartamento( $idDepartamento,$filtro );
	}
}
?>