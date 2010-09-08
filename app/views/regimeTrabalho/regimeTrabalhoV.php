<?php

class RegimeTrabalhoV {

	function RegimeTrabalhoV() {}

	function printFormCadRegimeTrabalho() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/regimeTrabalho/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->display('formRegimeTrabalho.tpl');
	}
}

?>