<?php

class ProcessoC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function ProcessoC() {
		$this->model = new ProcessoM();
	}

	/**
	 * Retorna um array com todos os processos do professor
	 *
	 * @return array
	 */
	public function getAllProcessos( $filtro ) {
		return $this->model->getAllProcessos( $filtro );
	}
}
?>