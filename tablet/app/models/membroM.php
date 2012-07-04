<?php

if(!class_exists("MembroM")) {
	
class MembroM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_membro');
		$this->setTable('tb_membro');
	}
	
	function __destruct() {}

}
}

?>