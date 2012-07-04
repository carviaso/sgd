<?php
class EntidadeModelo {

	private $_data = array();
	
	public function __set($name, $value){
		$this->_data[$name] = $value;
	}
	
	public function __get($name){
		return $this->_data[$name];
	}
	
	public function getData(){
		return $this->_data;
	}
}
?>