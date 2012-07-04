<?php

if(!class_exists("ProcessoVO")) {
	
class ProcessoVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_processo = '';
			$this->id_professor_requerente = '';
			$this->id_membro_relator = '';
			$this->id_assunto_processo = '';
			$this->numero = '';
			$this->id_status_processo = '';
			$this->parecer = '';
			$this->data_insert = '';
			$this->cadastro_id_professor = '';
		}
	}

}
}

?>