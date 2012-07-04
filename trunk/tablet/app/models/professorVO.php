<?php

if(!class_exists("ProfessorVO")) {
	
class ProfessorVO extends EntidadeModelo {
	
	function __construct($complete = false) {
		if($complete) {
			$this->id_professor = '';
			$this->nome = '';
			$this->matricula = '';
			$this->siape = '';
			$this->data_admissao = '';
			$this->data_admissa_ufsc = '';
			$this->data_nascimento = '';
			$this->senha = '';
			$this->id_status_atual_professor = '';
		}
	}

}
}

?>