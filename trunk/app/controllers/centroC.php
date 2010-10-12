<?php

class CentroC {

	private $model;
	private $view;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function CentroC() {
		$this->model = new CentroM();
		$this->view = new CentroV();
	}

	/**
	 * Retorna um array com todos os objetos Centro
	 *
	 * @return array
	 */
	public function getCentros() {
		return $this->model->getCentros();
	}

	/**
	 * Retorna um json com todos os objetos Centro
	 *
	 * @return json
	 */
	public function getCentrosJson() {
		echo json_encode( $this->model->getCentros() );
	}


	/**
	 * Realiza o cadastro de um novo centro
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $sigla, $idInstituicao, $fone ) {
		$erro = array();
		if ( empty( $nome) ) $erro[] = 'Nome';
		if ( empty( $sigla) ) $erro[] = 'Sigla';
		if ( empty( $idInstituicao) ) $erro[] = 'Id da Instituicao';
		if ( empty( $fone) ) $erro[] = 'Telefone';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrar( $nome, $sigla, $idInstituicao, $fone );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Exibe todos os centros cadastrados
	 *
	 * @return void
	 */
	public function relCentros() {
		$centros = $this->model->getCentros();
		return $this->view->relCentros( $centros );
	}

	/**
	 * Exibe o select para escolha do centro
	 *
	 * @return void
	 */
	public function relDiretoresCentros() {
		$centros = $this->getCentros();
		$this->view->relDiretoresCentros( $centros );
	}

	/**
	 * Exibe o diretor e vice-diretor do centro
	 *
	 * @param int $idCentro
	 * @return void
	 */
	public function relDiretorPorCentro( $idCentro ) {
		$diretores = $this->model->getCentroCargoComissionado( $idCentro, DIRETORDOCENTRO, '' );
		$viceDiretores = $this->model->getCentroCargoComissionado( $idCentro, VICEDIRETORDOCENTRO, '' );
		$this->view->relDiretorPorCentro( $diretores, $viceDiretores );
	}

	/**
	 * Exibe os departamentos por centro
	 *
	 * @param int $idCentro
	 * @return array
	 */
	public function relDepartamentoPorCentro( $idCentro ) {
		return $this->model->relDepartamentoPorCentro( $idCentro );
	}
}
?>