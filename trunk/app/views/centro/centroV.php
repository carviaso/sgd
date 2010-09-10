<?php

class CentroV {

	function CentroV() {}

	function relCentros( $centros ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/centro/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "centros", $centros );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('relCentros.tpl');
	}

	function relDiretoresCentros( $centros ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/centro/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "centros", $centros );
		$smarty->assign( "option", 'listCentros' );
		$smarty->display('relDiretoresCentros.tpl');
	}

	function relDiretorPorCentro( $diretores ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/centro/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "diretores", $diretores );
		$smarty->assign( "option", 'diretoresPorCentro' );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('relDiretoresCentros.tpl');
	}

	function relDepartamentoCentro( $centros ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/centro/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "centros", $centros );
		$smarty->assign( "option", 'listCentros' );
		$smarty->display('relDepartamentosCentros.tpl');
	}

	function relDepartamentoPorCentro( $departamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/centro/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "option", 'departamentosPorCentro' );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('relDepartamentosCentros.tpl');
	}

	function printFormCadCentro( $instituicoes ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/centro/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "instituicoes", $instituicoes );
		$smarty->display('formCentro.tpl');
	}
}

?>