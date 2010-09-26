<?php

class LoginM {

	/**
	 * Valida o login do usuario
	 *
	 * @return array
	 */
	function valida( $siape, $senha ) {

		$conexao = Conexao::con();
		$return = new stdClass();

		$sql[] = "SELECT id_professor, nome FROM professor WHERE (siape = $siape AND senha = '$senha')";
		$query = mysqli_query( $conexao, join( '', $sql ) );

		// Conta o numero de registros do resultado
		$count = mysqli_num_rows( $query );

		// Obtem os dados do professor
		$data = mysqli_fetch_array( $query, MYSQL_ASSOC );

		if ( $count == 1 ) {
			// Setar as variaveis de sessao
			$_SESSION['idProfessor'] = $data['id_professor'];
			$_SESSION['nome'] = $data['nome'];
			$_SESSION['logado'] = true;
			$return->result = 1;
		} else {
			$return->result = 0;
			$return->error = mysqli_error( $conexao );
		}
		return $return;
	}

	/**
	 * Destroy a sessao
	 *
	 * @return void
	 */
	function logout() {
		session_unset();
		session_destroy();
		$return = new stdClass();
		$return->result = 1;
		return $return;
	}
}

?>