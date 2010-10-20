<?php

class RegimeTrabalhoC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function RegimeTrabalhoC() {
		$this->model = new RegimeTrabalhoM();
		$this->view = new RegimeTrabalhoV();
	}

	/**
	 * Realiza o cadastro de um novo regime de trabalho
	 *
	 * @return json
	 */
	public function cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva ) {
		$erro = array();
		if ( empty( $descricao) ) $erro[] = 'Descricao';
		if ( empty( $quantidadeHoras) ) $erro[] = 'Quantidade de Horas';
		if ( empty( $dedicacaoExclusiva) ) $erro[] = 'Dedicacao Exclusiva';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva );
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
	public function getAllRegimesTrabalho( $filtro ) {
		return $this->model->getAllregimesTrabalho( $filtro );
	}

}
?>