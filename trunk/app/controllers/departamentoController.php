<?php
	
include '../../models/departamento.php';

class DepartamentoController {
	
	/**
	 * Contrutor
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
	
	public function getDepartamentosPorCentro( $idCentro ) {
		$departamentoDAO = new Departamento();
		return $departamentoDAO->getDepartamentosPorCentro( $idCentro );
	}
    
}
?>

