<?php

if(!class_exists("ReuniaoVO")) {
	
class ReuniaoVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_reuniao = '';
			$this->id_pauta = '';
			$this->data_insert = '';
			$this->data_reuniao = '';
			$this->local_reuniao = '';
			$this->status_reuniao = '';
			$this->ata = '';
			$this->liberar_ata = '';
		}
	}

}
}

?>