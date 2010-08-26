<?php

class CargoController {
	
	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function CargoController() {}
	
	/**
	 * Retorna um array com todos os objetos Cargo
	 *
	 * @return array
	 */
	public function getCargos() {
		$cargoDAO = new Cargo();
		return $cargoDAO->getCargos();
	}

}
?>