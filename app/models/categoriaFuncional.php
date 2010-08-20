<?php

class CategoriaFuncional {

	/**
	 * Retorna um array com todos os objetos Categoria Funcional
	 *
	 * @return array
	 */
	function getCategoriaFuncional() {
		$conexao = Conexao::con();
		$categoriasFuncionais = array();
		
		$sql = "SELECT * FROM categoria_funcional ORDER BY descricao";
		$query = mysqli_query( $conexao, $sql );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$categoriaFuncional = new stdClass;
			$categoriaFuncional->idCategoriaFuncional = utf8_encode( $row['id_categoria_funcional'] );
			$categoriaFuncional->descricao = utf8_encode( $row['descricao'] );
			$categoriasFuncionais[] = $categoriaFuncional;
		}
		return $categoriasFuncionais;
	}

}

?>