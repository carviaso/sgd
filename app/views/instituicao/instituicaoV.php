<?php

class InstituicaoV {

	function InstituicaoV() {}

	function printFormCadInstituicao( $municipios ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/instituicao/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "municipios", $municipios );
		$smarty->display('instituicao.tpl');
	}
}

?>