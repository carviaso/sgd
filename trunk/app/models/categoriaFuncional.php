<?php

class CategoriaFuncional {

	/**
	 * Realiza o cadastro de uma nova Categoria Funcional
	 *
	 * @return stdClass
	 */
	public function cadastrar( $descricao ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$descricao = utf8_decode( $descricao );

		$sql[] = "INSERT INTO categoria_funcional ( descricao )";
		$sql[] = "VALUES (";
		$sql[] = "'{$descricao}'";
		$sql[] = ")";

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

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