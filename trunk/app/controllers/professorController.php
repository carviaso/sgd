<?php
	
include '../../models/professor.php';

class ProfessorController {
	
	/**
	 * Contrutor
	 *
	 * @return void
	 */
	public function ProfessorController() {}
	
	/**
	 * Retorna um array com todos os objetos Professores por centro
	 *
	 * @return array
	 */
	public function getProfessoresPorDepartamento( $idDepartamento ) {
		$professorDAO = new Professor();
		return $professorDAO->getProfessoresPorDepartamento( $idDepartamento );
	}
    
}
?>

