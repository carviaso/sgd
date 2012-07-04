<?php

if(!class_exists("Util")) {
	
class Util {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function retornoJson($array){
		echo json_encode($array);
		die();
	}
	
	public static function removerAcento($str){
	    $from = 'ÀÁÃÂÉÊÍÓÕÔÚÜÇàáãâéêíóõôúüç';
	    $to   = 'AAAAEEIOOOUUCaaaaeeiooouuc';
	    return strtr($str, $from, $to);
	}

}
}

?>