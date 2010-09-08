<?php

class RegimeTrabalhoController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function RegimeTrabalhoController() {}

	/**
	 * Realiza o cadastro de um novo regime de trabalho
	 *
	 * @return json
	 */
	public function cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva ) {
		$regimeTrabalhoDAO = new RegimeTrabalho();

		$erro = array();
		if ( empty( $descricao) ) $erro[] = 'Descricao';
		if ( empty( $quantidadeHoras) ) $erro[] = 'Quantidade de Horas';
		if ( empty( $dedicacaoExclusiva) ) $erro[] = 'Dedicacao Exclusiva';

		if ( count( $erro ) == 0 ) {
			$return = $regimeTrabalhoDAO->cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Retorna um array com todos os objetos Situacao
	 *
	 * @return array
	 */
	public function getAllRegimesTrabalho() {
		$regimeTrabalhoDAO = new RegimeTrabalho();
		return $regimeTrabalhoDAO->getAllregimesTrabalho();
	}

}
?>