<?php

class MunicipioV {

	function MunicipioV() {}

	function printFormCadMunicipio( $ufs ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/municipio/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "ufs", $ufs );
		$smarty->display('municipio.tpl');
	}
}

?>