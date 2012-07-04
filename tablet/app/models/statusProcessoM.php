<?php

if(!class_exists("StatusProcessoM")) {
	
class StatusProcessoM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_status_processo');
		$this->setTable('tb_status_processo');
	}
	
	function __destruct() {}

}
}

?>