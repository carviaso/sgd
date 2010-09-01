<?php

class RegimeTrabalhoController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function RegimeTrabalhoController() {}

	/**
	 * Retorna um array com todos os objetos Situacao
	 *
	 * @return array
	 */
	public function getAllRegimesTrabalho() {
		$regimeTrabalhoDAO = new RegimeTrabalho();
		return $regimeTrabalhoDAO->getAllregimesTrabalho();
	}

}
?>