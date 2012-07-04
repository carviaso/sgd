<?php

if(!class_exists("PautaM")) {
	
class PautaM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_pauta');
		$this->setTable('tb_pauta');
	}
	
	function __destruct() {}

}
}

?>