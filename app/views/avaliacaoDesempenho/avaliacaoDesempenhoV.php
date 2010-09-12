<?php

class AvaliacaoDesempenhoV {

	function AvaliacaoDesempenhoV() {}

	function printFormCadAvaliacaoDesempenho() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/avaliacaoDesempenho/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->display('formAvaliacaoDesempenho.tpl');
	}
}

?>