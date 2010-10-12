<?php

class PortariaC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function PortariaC() {
		$this->model = new PortariaM();
		$this->view = new PortariaV();
	}

	/**
	 * Imprime o formulario de cadastro de portaria
	 *
	 * @return void
	 */
	public function printFormCadPortaria() {
		return $this->view->printFormCadPortaria();
	}

	/**
	 * Cadastra a portaria
	 *
	 * @return void
	 */
	public function cadPortaria( $idProfessor, $portaria, $descricao ) {
		echo json_encode( $this->model->cadPortaria( $idProfessor, $portaria, $descricao ) );
	}

}
?>