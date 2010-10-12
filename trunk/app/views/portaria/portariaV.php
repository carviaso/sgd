<?php

class PortariaV {

	function PortariaV() {}

	function printFormCadPortaria() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/portaria/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->display('formPortaria.tpl');
	}
}

?>