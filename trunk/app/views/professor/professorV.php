<?php

class ProfessorV {

	function ProfessorV() {}

	function printFormCadProfessor( $departamentos, $categoriasFuncionais, $tipoTitulacoes, $cargos, $regimesTrabalho, $situacoes ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "departamentos", $departamentos );
		$smarty->assign( "categoriasFuncionais", $categoriasFuncionais );
		$smarty->assign( "tipoTitulacoes", $tipoTitulacoes );
		$smarty->assign( "cargos", $cargos );
		$smarty->assign( "regimesTrabalho", $regimesTrabalho );
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

	function printFormCadAfastamentoProfessor( $professores, $instituicoes, $tiposAfastamento, $tiposTitulacao ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professores", $professores );
		$smarty->assign( "instituicoes", $instituicoes );
		$smarty->assign( "tiposAfastamento", $tiposAfastamento );
		$smarty->assign( "tiposTitulacao", $tiposTitulacao );
		$smarty->display('formAfastamentoProfessor.tpl');
	}

	function printFormCadProgFuncProfessor( $professores, $categoriasFuncionais ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professores", $professores );
		$smarty->assign( "categoriasFuncionais", $categoriasFuncionais );
		$smarty->display('formProgressaoFuncionalProfessor.tpl');
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

	function mostraDetalhesProfessor( $professor ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professor", $professor );
		$smarty->assign( "fotoProfessor", "public/fotos/rosto{$professor->id_professor}.jpg" );
		$smarty->assign( "fichaProfessor", "public/fotos/ficha{$professor->id_professor}.jpg" );
		$smarty->display('mostraDetalhesProfessor.tpl');
	}

	function relGeralProfessor() {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "option", 'relatorioGeral' );
		$smarty->display('relGeralProfessor.tpl');
	}

	function detalheGeralProfessor( $departamento, $regimesTrabalho, $processosProfessor ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "option", 'detalheGeralProfessor' );
		$smarty->assign( "departamento", $departamento );
		$smarty->assign( "regimesTrabalho", $regimesTrabalho );
		$smarty->assign( "processosProfessor", $processosProfessor );
		$smarty->display('relGeralProfessor.tpl');
	}

	function relAfastamentoAposentadoria( $tiposAfastamentos ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "option", 'exibeFormulario' );
		$smarty->assign( "tiposAfastamentos", $tiposAfastamentos );
		$smarty->display('relAfastamentoAposentadoria.tpl');
	}

	function pesquisarAfastamentoAposentadoria( $professores, $aposentado ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		if( $aposentado ) {
			$smarty->assign( "option", 'exibeResultadoAposentado' );
		} else {
			$smarty->assign( "option", 'exibeResultado' );
		}
		$smarty->assign( "professores", $professores );
		$smarty->display('relAfastamentoAposentadoria.tpl');
	}

	function mostraProgressaoFuncional( $progressaoFuncional ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "progressaoFuncional", $progressaoFuncional );
		$smarty->display('mostraProgressaoFuncional.tpl');
	}
	
	function relAposentados( $aposentados ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "aposentados", $aposentados);
		$smarty->display('relAposentados.tpl');
	}

	public function imprimirFicha( $professor, $progressoes ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professor", $professor );
		$smarty->assign( "progressoes", $progressoes );
		$smarty->assign( "data", date( 'd/m/Y' ) );
		$smarty->assign( "dia", date( 'd' ) );
		$smarty->assign( "mes", date( 'm' ) );
		$smarty->assign( "ano", date( 'Y' ) );
		$dataHelper = new DataHelper();
		$mesExtenso = $dataHelper->mesExtenso( date( 'm' ) );
		$smarty->assign( "mesExtenso", $mesExtenso );
		return $smarty->fetch('imprimirFicha.tpl');
	}

	function printFormUser( $professor ) {
		$smarty = new Smarty();
		$smarty->template_dir = 'views/professor/templates/';
		$smarty->compile_dir  = '../tmp/templates_c/';
		$smarty->cache_dir    = '../tmp/cache/';
		$smarty->config_dir   = 'views/configs/';
		$smarty->assign( "professor", $professor );
		$smarty->display('printFormUser.tpl');
	}
}

?>