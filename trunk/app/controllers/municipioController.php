<?php

class MunicipioController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function MunicipioController() {}

	/**
	 * Retorna todos os municipios
	 *
	 * @return array
	 */
	public function getAll() {
		$municipioDAO = new Municipio();
		return $municipioDAO->getAll();
	}

	/**
	 * Imprime o formulario para o cadastro de um novo municipio
	 *
	 * @return void
	 */
	public function printFormCadMunicipio() {
		$ufC = new UfController();
		$ufs = $ufC->getAll();
		$municipioV = new MunicipioV();
		$municipioV->printFormCadMunicipio( $ufs );
	}

	/**
	 * Realiza o cadastro de um novo municipio
	 *
	 * @return json
	 */
	public function cadastrar( $nome, $idUf ) {
		$municipioDAO = new Municipio();

		$erro = array();
		if ( empty( $nome) ) $erro[] = 'Nome';
		if ( empty( $idUf) ) $erro[] = 'Municipio';

		if ( count( $erro ) == 0 ) {
			$return = $municipioDAO->cadastrarMunicipio( $nome, $idUf );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

}
?>