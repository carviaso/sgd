<?php

if(!class_exists("MembroVO")) {
	
class MembroVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_membro = '';
			$this->id_professor = '';
			$this->data_insert = '';
			$this->ativo = '';
			$this->email = '';
		}
	}

}
}

?>