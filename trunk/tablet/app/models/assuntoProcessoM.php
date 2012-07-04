<?php

if(!class_exists("AssuntoProcessoM")) {
	
class AssuntoProcessoM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_assunto_processo');
		$this->setTable('tb_assunto_processo');
	}
	
	function __destruct() {}

}
}

?>