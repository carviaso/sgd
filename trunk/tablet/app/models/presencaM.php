<?php

if(!class_exists("PresencaM")) {

class PresencaM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_presenca');
		$this->setTable('tb_presenca');
	}
	
	function __destruct() {}

}
}

?>