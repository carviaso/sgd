<?php

class Pais {

	/**
	 * Retorna todos os paises
	 *
	 * @return array
	 */
	function getAll() {

		$paises = array();
		$conexao = Conexao::con();

		$sql[] = "SELECT * FROM pais p ORDER by p.nome";
		$query = mysqli_query( $conexao, join( '', $sql ) );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$pais = new stdClass();
			$pais->idPais = $row['id_pais'];
			$pais->nome = utf8_encode( $row['nome'] );
			$pais->sigla = utf8_encode( $row['sigla'] );
			$paises[] = $pais;
		}
		return $paises;
	}

	/**
	 * Realiza o cadastro de um novo pais
	 *
	 * @return stdClass
	 */
	public function cadastrarPais( $nome, $sigla ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$nome = utf8_decode( $nome );
		$sigla = utf8_decode( $sigla );

		$sql[] = "INSERT INTO pais ( nome, sigla )";
		$sql[] = "VALUES (";
		$sql[] = "'{$nome}', '{$sigla}'";
		$sql[] = ")";

		if ( mysqli_query( $conexao, join( ' ', $sql ) ) ) {
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

}

?>