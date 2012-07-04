<?php

if(!class_exists("StatusProcessoVO")) {
	
class StatusProcessoVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_status_processo = '';
			$this->nome = '';
			$this->ativo = '';
		}
	}

}
}

?>