<?php

if(!class_exists("PautaVO")) {
	
class PautaVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_pauta = '';
			$this->numero = '';
			$this->data_insert = '';
			$this->liberar_pauta = '';
		}
	}

}
}

?>