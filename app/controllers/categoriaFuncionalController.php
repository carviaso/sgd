<?php

class CategoriaFuncionalController {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function CategoriaFuncionalController() {}

	/**
	 * Realiza o cadastro de uma nova categoria funcional
	 *
	 * @return json
	 */
	public function cadastrar( $descricao ) {
		$categoriaFuncionalDAO = new CategoriaFuncional();

		$erro = array();
		if ( empty( $descricao) ) $erro[] = 'Descricao';

		if ( count( $erro ) == 0 ) {
			$return = $categoriaFuncionalDAO->cadastrar( $descricao );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Retorna um array com todos os objetos Categoria Funcional
	 *
	 * @return array
	 */
	public function getCategoriaFuncional() {
		$categoriaFuncionalDAO = new CategoriaFuncional();
		return $categoriaFuncionalDAO->getCategoriaFuncional();
	}

}
?>