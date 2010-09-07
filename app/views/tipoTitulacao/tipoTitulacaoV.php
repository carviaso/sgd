<?php

class TipoTitulacaoV {

	function TipoTitulacaoV() {}

	function printFormCadTipoTitulacao() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/tipoTitulacao/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->display('formTipoTitulacao.tpl');
	}
}

?>