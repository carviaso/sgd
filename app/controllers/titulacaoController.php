<?php

class TitulacaoController {
	
	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function TitulacaoController() {}
	
	/**
	 * Retorna um array com todos os objetos Titulos
	 *
	 * @return array
	 */
	public function getTitulacao() {
		$tituloDAO = new Titulacao();
		return $tituloDAO->getTitulacao();
	}
	
}
?>