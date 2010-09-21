<?php

class LoginC {

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function LoginC() {
		$this->model = new LoginM();
	}

	/**
	 * Verifica se o usuario e senha sao validos
	 *
	 * @return json
	 */
	public function valida( $siape, $senha ) {
		// Escapar aspas, sql injection
		$siape = addslashes( trim( $siape ) );
		$senha = addslashes( trim( $senha ) );

		// Verifica o tamanho dos campos
		$siape = strlen( $siape ) > 11 ? substr( $siape, 0, 11 ) : $siape;
		$senha = strlen( $senha ) > 32 ? substr( $senha, 0, 32 ) : $senha;

		echo json_encode( $this->model->valida( $siape, $senha ) );
	}

	/**
	 * Efetua o logout do usuario
	 *
	 * @return json
	 */
	public function logout() {
		echo json_encode( $this->model->logout() );
	}
}
?>