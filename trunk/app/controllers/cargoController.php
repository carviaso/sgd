<?php

class CentroController {
	
	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function CentroController() {}
	
	/**
	 * Retorna um array com todos os objetos Centro
	 *
	 * @return array
	 */
	public function getCentros() {
		$centroDAO = new Centro();
		return $centroDAO->getCentros();
	}
	
	public function viewDiretoresPorCentros( $idCentro ) {
		$centroDAO = new Centro();
		return $centroDAO->viewDiretoresPorCentros( $idCentro );
	}
}
?>