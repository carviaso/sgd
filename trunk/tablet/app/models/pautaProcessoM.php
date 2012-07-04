<?php

if(!class_exists("PautaProcessoM")) {
	
class PautaProcessoM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_pauta_processo');
		$this->setTable('tb_pauta_processo');
	}
	
	function __destruct() {}

}
}

?>