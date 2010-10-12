<?php

class SituacaoC {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function SituacaoC() {}

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