<?php

if(!class_exists("PautaProcessoVO")) {
	
class PautaProcessoVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_pauta_processo = '';
			$this->id_pauta = '';
			$this->id_processo = '';
		}
	}

}
}

?>