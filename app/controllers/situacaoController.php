<?php

class SituacaoController {
	
	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function SituacaoController() {}
	
	/**
	 * Retorna um array com todos os objetos Situacao
	 *
	 * @return array
	 */
	public function getSituacoes() {
		$situacaoDAO = new Situacao();
		return $situacaoDAO->getSituacoes();
	}

}
?>