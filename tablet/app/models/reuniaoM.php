<?php

if(!class_exists("ReuniaoM")) {
	
class ReuniaoM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_reuniao');
		$this->setTable('tb_reuniao');
	}
	
	function __destruct() {}

}
}

?>