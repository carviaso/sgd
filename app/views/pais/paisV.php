<?php

class PaisV {

	function PaisV() {}

	function printFormCadPais() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/pais/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('pais.tpl');
	}
}

?>