<?php

class Conexao {

	public static $con;

	public static function con() {
		if ( !isset( self::$con ) ) {
			self::$con = mysqli_connect( 'localhost', 'root', '', 'docente' );
		}
		return self::$con;
	}

}

?>