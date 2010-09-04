<?php

class PaisController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function PaisController() {}

	/**
	 * Retorna todos os paises
	 *
	 * @return array
	 */
	public function getAll() {
		$paisDAO = new Pais();
		return $paisDAO->getAll();
	}

	/**
	 * Realiza o cadastro de um novo pais
	 *
	 * @return json
	 */
	public function cadastrarPais( $nome, $sigla ) {
		$paisDAO = new Pais();

		$erro = array();
		if ( empty( $nome) ) $erro[] = 'Nome';
		if ( empty( $sigla) ) $erro[] = 'Sigla';

		if ( count( $erro ) == 0 ) {
			$return = $paisDAO->cadastrarPais( $nome, $sigla );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

}
?>