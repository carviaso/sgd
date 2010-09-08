<?php

class ProfessorV {

	function ProfessorV() {}

	function printFormCadProfessor( $departamentos, $categoriasFuncionais, $tipoTitulacoes, $cargos, $situacoes ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "categoriasFuncionais", $categoriasFuncionais );
		$smarty->assign( "tipoTitulacoes", $tipoTitulacoes );
		$smarty->assign( "cargos", $cargos );
		$smarty->assign( "situacoes", $situacoes );
		$smarty->display('professor.tpl');

	}

	function printFormCadRegTrabProfessor( $professores, $regimesTrabalho ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professores", $professores );
		$smarty->assign( "regimesTrabalho", $regimesTrabalho );
		$smarty->display('regTrabProfessor.tpl');
	}

	function listarProfessores( $professores ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professores", $professores );
		$smarty->assign( "emissao", date('d/m/Y H:i:s P') );
		$smarty->display('listarProfessores.tpl');
	}
}

?>