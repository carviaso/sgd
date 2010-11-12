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
		$this->view = new ProcessoV();
	}
/**
	 * Imprime o formulario de cadastro de portaria
	 *
	 * @return void
	 */
	public function printFormCadProcesso() {
		return $this->view->printFormCadProcesso();
	}

	/**
	 * Cadastra a portaria
	 *
	 * @return void
	 */
	public function cadProcesso( $idProfessor, $processo, $descricao ) {
		echo json_encode( $this->model->cadProcesso( $idProfessor, $processo, $descricao ) );
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