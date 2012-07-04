<?php

if(!class_exists("AssuntoProcessoVO")) {
	
class AssuntoProcessoVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_assunto_processo = '';
			$this->nome = '';
			$this->ativo = '';
		}
	}

}
}

?>