<?php

if(!class_exists("ProfessorM")) {
	
class ProfessorM extends ConexaoModelo {
	
	function __construct() {
		$this->setOrderBy('id_professor');
		$this->setTable('professor');
	}
	
	function __destruct() {}

}
}

?>