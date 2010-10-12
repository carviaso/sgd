<?php

class SituacaoC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function SituacaoC() {
		$this->model = new SituacaoM();
	}

	/**
	 * Retorna um array com todos os objetos Situacao
	 *
	 * @return array
	 */
	public function getSituacoes() {
		return $this->model->getSituacoes();
	}

	/**
	 * Retorna os status por situacao
	 *
	 * @return array || json
	 */
	public function getStatusBySituacao( $returnType, $filtro ) {
		$return = $this->model->getStatusBySituacao( $filtro );
		if ( $returnType == 'json' ) {
			echo json_encode( $return );
		} else {
			return $return;
		}
	}


}
?>