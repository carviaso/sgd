<?php

class DepartamentoV {

	function DepartamentoV() {}

	function printFormCadDepartamento( $centros ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "centros", $centros );
		$smarty->display('formDepartamento.tpl');
	}

	function relDepartamentos( $departamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "option", 'viewDepartamento' );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('relDepartamentos.tpl');
	}

	function relChefesDepartamentos( $departamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "option", 'listDepartamentos' );
		$smarty->assign( "departamentos", $departamentos );
		$smarty->display('relChefesDepartamentos.tpl');
	}

	function relChefesPorDepartamento( $chefes, $subChefes, $chefeDeExpedientes ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "option", 'chefesPorDepartamento' );
		$smarty->assign( "chefes", $chefes );
		$smarty->assign( "subChefes", $subChefes );
		$smarty->assign( "chefeDeExpedientes", $chefeDeExpedientes );
		$smarty->display('relChefesDepartamentos.tpl');
	}

	function relProfessoresDepartamento( $departamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "option", 'listDepartamento' );
		$smarty->display('relDepartamentos.tpl');
	}

	function relProfessoresPorDepartamento( $professores ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/departamento/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professores", $professores );
		$smarty->assign( "option", 'relProfessoresPorDepartamento' );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('relDepartamentos.tpl');
	}
}

?>