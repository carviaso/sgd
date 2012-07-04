<?php

if(!class_exists("PresencaVO")) {
	
class PresencaVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_presenca = '';
			$this->id_membro = '';
			$this->id_reuniao = '';
			$this->presenca = '';
		}
	}

}
}

?>