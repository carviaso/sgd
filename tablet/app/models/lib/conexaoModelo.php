<?php
require_once(dirname(__FILE__) . '/../../inc/bd_config.php');

if(!class_exists("ConexaoModelo")) {
	
class ConexaoModelo {

	private $_link = 0;
	private $_table = null;
	private $_where = null;
	private $_select = "*";
	private $_orderBy = "";
	private $_updateSet = "";
	private $_limit = "";
	private $_affected_rows = 0;
	private $_lastId = '';
	private $_distinct = '';
	
	private function conecta() {		
		$this->_link = mysql_connect (BANCO_HOST,BANCO_USER,BANCO_PASS) OR die("Nao foi possivel conectar ao mysql. Erro: " . mysql_error());
		mysql_select_db(BANCO_DB, $this->_link);
	}

	private function desconecta() {		
		mysql_close($this->_link) OR die("Nao foi possivel desconectar do mysql. Erro: " . mysql_error());
	}

	public function consultaAll($echo = false) {
		$query = "
				SELECT ".$this->getDistinct()." ".$this->getSelect()."
				FROM ".$this->getTable()."
				".$this->getWhere()."
				ORDER BY ".$this->getOrderBy()."
				".$this->getLimit()."
			";
		if($echo) {
			echo '<pre>';
			die($query);
		}
		$this->conecta();
		$select = mysql_query($query, $this->_link) OR die("Erro ao consultar banco de dados!!! Erro: " .  mysql_error());
		$numrows = mysql_num_rows($select);
		$this->setAffectedRows(mysql_affected_rows());
		$rows = array();
		for ($i = 0 ; $i < $numrows ; $i++ ) {
			$rows[$i] = mysql_fetch_assoc ($select);
		}
		return $rows;
	}

	public function count() {
		
		if($this->getWhere() == '') {
			die("Erro: para executar o SELECT favor setar a condicao WHERE. Table: " . $this->getTable() . ".");
		}
		$query = "
				SELECT COUNT( ".$this->getDistinct()." ".$this->getOrderBy().") AS TOTAL
				FROM ".$this->getTable()."
				".$this->getWhere()."
			";
//		echo '<pre>';
//		die($query);
		$this->conecta();
		$select = mysql_query($query, $this->_link) OR die("Erro ao consultar banco de dados!!! Erro: " .  mysql_error());
		$total = 0;
		while ($row = mysql_fetch_assoc($select)) {
		    $total = $row["TOTAL"];
		}

		$this->setAffectedRows(mysql_affected_rows());

		return $total;
	}

	public function consulta() {
		
		if($this->getWhere() == '') {
			die("Erro: para executar o SELECT favor setar a condicao WHERE. Table: " . $this->getTable() . ".");
		}
		$query = "
				SELECT ".$this->getDistinct()." ".$this->getSelect()."
				FROM ".$this->getTable()."
				".$this->getWhere()."
				ORDER BY ".$this->getOrderBy()."
				".$this->getLimit()."
			";
//		echo '<pre>';
//		die($query);
		$this->conecta();
		$select = mysql_query($query, $this->_link) OR die("Erro ao consultar banco de dados!!! Erro: " .  mysql_error());
		$row = mysql_fetch_assoc($select);
		$this->setAffectedRows(mysql_affected_rows());
		
		return $row;
	}

	public function update($array) {
		
		if($this->getWhere() == '') {
			die("Erro: para executar o UPDATE favor setar a condição WHERE. Table: " . $this->getTable() . ".");
		}
		
		foreach ($array as $key => $val) {
			$set[] = "{$key} = '{$val}'";
		}
		
		$query = "
				UPDATE ".$this->getTable()." 
				SET ".implode(', ',$set)." 
				".$this->getWhere().";
			";
		$this->conecta();
		$select = mysql_query($query, $this->_link) OR die("Erro ao consultar banco de dados!!! Erro: " .  mysql_error());
		$this->setAffectedRows(mysql_affected_rows());
		return $select;
	}

	public function delete() {
		
		if($this->getWhere() == '') {
			die("Erro: para executar o DELETE favor setar a condição WHERE. Table: " . $this->getTable() . ".");
		}
		
		$query = "
				DELETE FROM ".$this->getTable()." ".$this->getWhere().";
			";
//		die($query);
		$this->conecta();
		$select = mysql_query($query, $this->_link) OR die("Erro ao consultar banco de dados!!! Erro: " .  mysql_error());
		$this->setAffectedRows(mysql_affected_rows());
		return $select;
	}
	
	public function insert($param) {
		$array = (is_object($param)) ? $param->getData() : $param;
		
		foreach ($array as $key => $val) {
			$attr[] = $key;
			$value[] = $val;
		}
		
		$query = "
				INSERT INTO ".$this->getTable()." 
				(".implode(',',$attr).")
				VALUES 
				('".implode('\',\'',$value)."');
			";
//		echo $query;
		$this->conecta();
		$select = mysql_query($query, $this->_link) OR die("Erro ao consultar banco de dados!!! Erro: " .  mysql_error());
		$this->setLastId(mysql_insert_id());
		$this->setAffectedRows(mysql_affected_rows());
		return $select;
	}
	
	public function isDistinct($val = false) {
		$d = ($val)?'DISTINCT':'';
		$this->_distinct = $d;
	}
	private function getDistinct() {
		return $this->_distinct;
	}
	
	private function setLastId($val) {
		$this->_lastId = $val;
	}
	public function getLastId() {
		return $this->_lastId;
	}

	public function setTable($val) {
		$this->_table = $val;
	}

	public function getTable() {
		return $this->_table;
	}

	public function setWhere($val) {
		$this->_where = $val;
	}

	public function getWhere() {
		return $this->_where;
	}

	public function setSelect($val) {
		$this->_select = implode(', ',$val);
	}

	public function getSelect() {
		return $this->_select;
	}

	public function setOrderBy($val) {
		$this->_orderBy = $val;
	}

	public function getOrderBy() {
		return $this->_orderBy;
	}

	public function setUpdateSet($val) {
		$this->_updateSet = $val;
	}

	public function getUpdateSet() {
		return $this->_updateSet;
	}

	public function setLimit($val) {
		$this->_limit = $val;
	}

	public function getLimit() {
		return $this->_limit;
	}

	public function setAffectedRows($val) {
		$this->_affected_rows = $val;
	}

	public function getAffectedRows() {
		return $this->_affected_rows;
	}

}
}
?>