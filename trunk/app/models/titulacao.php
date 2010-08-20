<?php

class Titulacao {

	/**
	 * Retorna um array com todos os objetos Titulacao
	 *
	 * @return array
	 */
	function getTitulacao() {
		$conexao = Conexao::con();
		$titulacoes = array();
		
		$sql = "SELECT * FROM tipo_titulacao ORDER BY id_tipo_titulacao";
		$query = mysqli_query( $conexao, $sql );
		
		while ( $row = mysqli_fetch_array( $query ) ) {
			$titulacao = new stdClass;
			$titulacao->id_tipo_titulacao = utf8_encode( $row['id_tipo_titulacao'] );
			$titulacao->descricao = utf8_encode( $row['descricao'] );
			$titulacoes[] = $titulacao;
		}
		return $titulacoes;
	}

}

?>