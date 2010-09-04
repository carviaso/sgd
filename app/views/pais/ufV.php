<?php

class UfV {

	function UfV() {}

	function printFormCadUf( $paises ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/uf/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "paises", $paises );
		$smarty->display('uf.tpl');
	}
}

?>