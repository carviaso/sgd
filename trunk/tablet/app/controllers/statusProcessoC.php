<?php

if(!class_exists("StatusProcessoC")) {
	
class StatusProcessoC {
	
	function __construct() {}
	
	function __destruct() {}

	public function getStatus(){
		$objStatusM = new StatusProcessoM();
		$objStatusM->setSelect(array(
									'id_status_processo',
									'nome',
									'ativo')
								);

								
		$where = "WHERE ativo in (1)";
		$objStatusM->setWhere($where);
		$array = $objStatusM->consultaAll();
	
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}
}
}

?>