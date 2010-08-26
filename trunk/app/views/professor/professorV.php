<?php

class ProfessorV {
	
	function ProfessorV() {}
	
	function printFormCadProfessor( $departamentos, $categoriasFuncionais, $titulacoes, $cargos, $situacoes ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "categoriasFuncionais", $categoriasFuncionais );
		$smarty->assign( "titulacoes", $titulacoes );
		$smarty->assign( "cargos", $cargos );
		$smarty->assign( "situacoes", $situacoes );
		$smarty->display('professor.tpl');
	}
}

?>