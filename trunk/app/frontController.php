<?php

include_once 'library/Smarty-3.0rc1/libs/Smarty.class.php';
include_once '../app/controllers/centroController.php';
include_once '../app/controllers/departamentoController.php';
include_once '../app/controllers/categoriaFuncionalController.php';
include_once '../app/controllers/titulacaoController.php';
include_once '../app/controllers/professorController.php';
include_once '../app/controllers/cargoController.php';
include_once '../app/controllers/situacaoController.php';
include_once '../app/controllers/regimeTrabalhoController.php';
include_once '../app/controllers/paisController.php';
include_once '../app/views/centro/centroV.php';
include_once '../app/views/pais/paisV.php';
include_once '../app/views/departamento/departamentoV.php';
include_once '../app/views/professor/professorV.php';
include_once '../app/models/centro.php';
include_once '../app/models/departamento.php';
include_once '../app/models/categoriaFuncional.php';
include_once '../app/models/titulacao.php';
include_once '../app/models/professor.php';
include_once '../app/models/cargo.php';
include_once '../app/models/situacao.php';
include_once '../app/models/regimeTrabalho.php';
include_once '../app/models/pais.php';
include_once '../app/include/conexao.php';

// http://jqueryui.com/themeroller/#ffDefault=Verdana%2CArial%2Csans-serif&fwDefault=normal&fsDefault=0.8em&cornerRadius=4px&bgColorHeader=cfb75a&bgTextureHeader=03_highlight_soft.png&bgImgOpacityHeader=75&borderColorHeader=aa2808&fcHeader=222222&iconColorHeader=222222&bgColorContent=ffffff&bgTextureContent=01_flat.png&bgImgOpacityContent=75&borderColorContent=aa2808&fcContent=222222&iconColorContent=222222&bgColorDefault=cfb75a&bgTextureDefault=02_glass.png&bgImgOpacityDefault=75&borderColorDefault=aa2808&fcDefault=494646&iconColorDefault=888888&bgColorHover=cfa80c&bgTextureHover=02_glass.png&bgImgOpacityHover=75&borderColorHover=aa2808&fcHover=aa2808&iconColorHover=494646&bgColorActive=ffffff&bgTextureActive=02_glass.png&bgImgOpacityActive=65&borderColorActive=aa2808&fcActive=212121&iconColorActive=aa2808&bgColorHighlight=fbf9ee&bgTextureHighlight=02_glass.png&bgImgOpacityHighlight=55&borderColorHighlight=fcefa1&fcHighlight=363636&iconColorHighlight=2e83ff&bgColorError=fef1ec&bgTextureError=02_glass.png&bgImgOpacityError=95&borderColorError=cd0a0a&fcError=cd0a0a&iconColorError=cd0a0a&bgColorOverlay=494646&bgTextureOverlay=01_flat.png&bgImgOpacityOverlay=0&opacityOverlay=30&bgColorShadow=494646&bgTextureShadow=01_flat.png&bgImgOpacityShadow=0&opacityShadow=30&thicknessShadow=8px&offsetTopShadow=-8px&offsetLeftShadow=-8px&cornerRadiusShadow=8px
$action = $_POST['action'];

switch ($action) {
	case 'getCentros':
		$centroC = new CentroController();
		$centros = $centroC->getCentros();
		$centroV = new CentroV();
		return $centroV->viewCentro( $centros );
	break;
	case 'getDepartamentos':
		$departamentoC = new DepartamentoController();
		$departamentos = $departamentoC->getDepartamentos();
		$departamentoV = new DepartamentoV();
		return $departamentoV->viewDepartamento( $departamentos );
	break;
	case 'getDepartamentosPorCentro':
		$departamentoC = new DepartamentoController();
		$departamentos = $departamentoC->getDepartamentosPorCentro( $_POST['idCentro'] );
		$departamentoV = new DepartamentoV();
		return $departamentoV->viewDepartamento( $departamentos );
	break;
	case 'printCentros':
		$centroC = new CentroController();
		$centros = $centroC->getCentros();
		$centroV = new CentroV();
		return $centroV->listCentros( $centros );
	break;
	case 'getDiretorPorCentro':
		$centroC = new CentroController();
		$diretores = $centroC->viewDiretoresPorCentros( $_POST['idCentro'] );
		$centroV = new CentroV();
		return $centroV->viewDiretoresPorCentros( $diretores );
	break;
	case 'getProfessoresPorDepartamento':
		$departamentoC = new DepartamentoController();
		$professores = $departamentoC->getProfessoresPorDepartamento( $_POST['idDepartamento'] );
		$departamentoV = new DepartamentoV();
		return $departamentoV->viewProfessoresPorDepartamento( $professores );
	break;
	case 'printDepartamentos':
		$departamentoC = new DepartamentoController();
		$departamentos = $departamentoC->getDepartamentos();
		$departamentoV = new DepartamentoV();
		return $departamentoV->listDepartamentos( $departamentos );
	break;
	case 'printFormCadProfessor':
		$departamentoC = new DepartamentoController();
		$departamentos = $departamentoC->getDepartamentos();
		$categoriaFuncionalC = new CategoriaFuncionalController();
		$categoriasFuncionais = $categoriaFuncionalC->getCategoriaFuncional();
		$titulacaoC = new TitulacaoController();
		$titulacoes = $titulacaoC->getTitulacao();
		$cargoC = new CargoController();
		$cargos = $cargoC->getCargos();
		$situacaoC = new SituacaoController();
		$situacoes = $situacaoC->getSituacoes();
		$professorV = new ProfessorV();
		$professorV->printFormCadProfessor( $departamentos, $categoriasFuncionais, $titulacoes, $cargos, $situacoes );
	break;
	case 'cadProfessor':
		$professorC = new ProfessorController();
		extract( $_POST );
		$professorC->cadastrarProfessor( $nome, $sobrenome, $dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao );
	break;
	case 'printFormCadRegTrabProfessor':
		$professorC = new ProfessorController();
		$professores = $professorC->getAllProfessores();
		$regimeTrabalhoC = new RegimeTrabalhoController();
		$regimesTrabalho = $regimeTrabalhoC->getAllRegimesTrabalho();
		$professorV = new ProfessorV();
		$professorV->printFormCadRegTrabProfessor( $professores, $regimesTrabalho );
	break;
	case 'cadRegimeTrabalhoProfessor':
		$professorC = new ProfessorController();
		extract( $_POST );
		$professorC->cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio );
	break;
	case 'listarProfessores':
		$professorC = new ProfessorController();
		$professores = $professorC->getAllProfessores();
		$professorC->listarProfessores( $professores );
	break;
	case 'printFormCadPais':
		$paisV = new PaisV();
		$paisV->printFormCadPais();
	break;
	case 'cadPais':
		$paisC = new PaisController();
		extract( $_POST );
		$paisC->cadastrarPais( $nome, $sigla );
	break;
}

?>