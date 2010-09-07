<?php

class Instituicao {

	/**
	 * Retorna um array com todos os objetos Instituicao
	 *
	 * @return array
	 */
	function getAll() {
		$conexao = Conexao::con();
		$instituicoes = array();

		$sql = "SELECT * FROM instituicao i ORDER BY i.nome";
		$query = mysqli_query( $conexao, $sql );

		while ( $row = mysqli_fetch_array( $query ) ) {
			$instituicao = new stdClass;
			$instituicao->idInstituicao = $row['id_instituicao'];
			$instituicao->nome = utf8_encode( $row['nome'] );
			$instituicao->sigla = utf8_encode( $row['sigla'] );
			$instituicoes[] = $instituicao;
		}
		return $instituicoes;
	}

	/**
	 * Realiza o cadastro de uma nova instituicao
	 *
	 * @return stdClass
	 */
	public function cadastrar( $nome, $sigla, $idMunicipio ) {
		$conexao = Conexao::con();
		$return = new stdClass();

		$nome = utf8_decode( $nome );

		$sql[] = "INSERT INTO instituicao ( id_municipio, nome, sigla )";
		$sql[] = "VALUES (";
		$sql[] = "'{$idMunicipio}', '{$nome}', '{$sigla}'";
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