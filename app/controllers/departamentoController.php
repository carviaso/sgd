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