<?php

class TipoAfastamentoController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function TipoAfastamentoController() {}

	/**
	 * Retorna um array com todos os objetos Tipo Controller
	 *
	 * @return array
	 */
	public function getAll() {
		$tipoAfastamentoDAO = new TipoAfastamento();
		return $tipoAfastamentoDAO->getAll();
	}

	/**
	 * Realiza o cadastro de um novo tipo de afastamento
	 *
	 * @return json
	 */
	public function cadastrar( $descricao ) {
		$tipoAfastamentoDAO = new TipoAfastamento();

		$erro = array();
		if ( empty( $descricao) ) $erro[] = 'Descricao';

		if ( count( $erro ) == 0 ) {
			$return = $tipoAfastamentoDAO->cadastrar( $descricao );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}
}
?>