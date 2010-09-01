<?php

class DepartamentoV {

	function DepartamentoV() {}

	function viewDepartamento( $departamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "option", 'viewDepartamento' );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('departamento.tpl');
	}

	function listDepartamentos( $departamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "option", 'listDepartamento' );
		$smarty->display('departamento.tpl');
	}

	function viewProfessoresPorDepartamento( $professores ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professores", $professores );
		$smarty->assign( "option", 'viewProfessoresPorDepartamento' );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('departamento.tpl');
	}
}

?>