<?php

class CategoriaFuncionalV {

	function CategoriaFuncionalV() {}

	function printFormCadCategoriaFuncional() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/categoriaFuncional/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->display('formCategoriaFuncional.tpl');
	}
}

?>