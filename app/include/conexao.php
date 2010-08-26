<?php
	
class Conexao {
	
    public static $con;
    
    public static function con() {		
        if ( !isset( self::$con ) ) {
			if ( '127.0.0.1' == $_SERVER['REMOTE_ADDR'] ) {
	        	self::$con = mysqli_connect( 'localhost', 'root', '', 'docente' );
			} else {
				self::$con = mysqli_connect( 'localhost', 'cppd', 'xlop9cvi', 'docente' );
			}
	    }
		return self::$con;
    }

}

?>