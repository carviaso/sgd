<?php
	
class Conexao {
	
    public static $con;
    
    public static function con() {
        if ( !isset( self::$con ) ) {
	        self::$con = mysqli_connect( 'localhost', 'cppd', 'xlop9cvi', 'docente' );
	    }
		return self::$con;
    }

}

?>