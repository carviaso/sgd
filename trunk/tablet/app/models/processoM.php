<?php

if(!class_exists("ProcessoM")) {
	
class ProcessoM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_processo');
		$this->setTable('tb_processo');
	}
	
	function __destruct() {}

}
}

?>