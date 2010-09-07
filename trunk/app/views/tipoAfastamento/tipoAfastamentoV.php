<?php

class TipoAfastamentoV {

	function TipoAfastamentoV() {}

	function printFormCadTipoAfastamento() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/tipoAfastamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->display('formTipoAfastamento.tpl');
	}
}

?>