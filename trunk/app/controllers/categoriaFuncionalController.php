<?php

class CategoriaFuncionalController {
	
	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function CategoriaFuncionalController() {}
	
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