<?php

class InstituicaoController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function InstituicaoController() {}

	/**
	 * Retorna todos as instituicoes
	 *
	 * @return array
	 */
	public function getAll() {
		$instituicaoDAO = new instituicao();
		return $instituicaoDAO->getAll();
	}

	/**
	 * Realiza o cadastro de uma nova instituicao
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $sigla, $idMunicipio ) {
		$instituicaoDAO = new Instituicao();

		$erro = array();
		if ( empty( $nome) ) $erro[] = 'Nome';
		if ( empty( $sigla) ) $erro[] = 'Sigla';
		if ( empty( $idMunicipio) ) $erro[] = 'Id Municipio';

		if ( count( $erro ) == 0 ) {
			$return = $instituicaoDAO->cadastrar( $nome, $sigla, $idMunicipio );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

}
?>