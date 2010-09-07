<?php

class TipoTitulacaoController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function TipoTitulacaoController() {}

	/**
	 * Realiza o cadastro de um novo tipo de titulacao
	 *
	 * @return json
	 */
	public function cadastrar( $descricao ) {
		$tipoTitulacaoDAO = new TipoTitulacao();

		$erro = array();
		if ( empty( $descricao) ) $erro[] = 'Descricao';

		if ( count( $erro ) == 0 ) {
			$return = $tipoTitulacaoDAO->cadastrar( $descricao );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Retorna um array com todos os objetos Titulos
	 *
	 * @return array
	 */
	public function getAll() {
		$tipoTitulacaoDAO = new TipoTitulacao();
		return $tipoTitulacaoDAO->getAll();
	}

}
?>