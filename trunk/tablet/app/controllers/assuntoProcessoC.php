<?php

if(!class_exists("AssuntoProcessoC")) {
	
class AssuntoProcessoC {
	
	function __construct() {}
	
	function __destruct() {}

	public function getAssuntos(){
		$objAssuntoM = new AssuntoProcessoM();
		$objAssuntoM->setSelect(array(
									'id_assunto_processo',
									'nome',
									'ativo')
								);

								
		$where = "WHERE ativo in (1)";
		$objAssuntoM->setWhere($where);
		$array = $objAssuntoM->consultaAll();
	
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}
}
}

?>