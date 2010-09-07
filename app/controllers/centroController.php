<?php

class CentroController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function CentroController() {}

	/**
	 * Retorna um array com todos os objetos Centro
	 *
	 * @return array
	 */
	public function getCentros() {
		$centroDAO = new Centro();
		return $centroDAO->getCentros();
	}

	/**
	 * Realiza o cadastro de um novo centro
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $sigla, $idInstituicao ) {
		$centroDAO = new Centro();

		$erro = array();
		if ( empty( $nome) ) $erro[] = 'Nome';
		if ( empty( $sigla) ) $erro[] = 'Sigla';
		if ( empty( $idInstituicao) ) $erro[] = 'Id da Instituicao';

		if ( count( $erro ) == 0 ) {
			$return = $centroDAO->cadastrar( $nome, $sigla, $idInstituicao );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	public function viewDiretoresPorCentros( $idCentro ) {
		$centroDAO = new Centro();
		return $centroDAO->viewDiretoresPorCentros( $idCentro );
	}
}
?>