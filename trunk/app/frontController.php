<?php

include_once 'library/Smarty-3.0rc1/libs/Smarty.class.php';
$dirs = array( 'controllers', 'models', 'views/*', 'include' );

foreach ( $dirs as $dir ) {
	foreach ( glob( "../app/{$dir}/*.php" ) as $filename ) {
		include "$filename";
	}
}

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
	case 'printFormCadDepartamento':
		$departamentoV = new DepartamentoV();
		$centroC = new CentroController();
		$centros = $centroC->getCentros();
		$departamentoV->printFormCadDepartamento( $centros );
	break;
	case 'cadDepartamento':
		$departamentoC = new DepartamentoController();
		extract( $_POST );
		$departamentoC->cadastrar( $nome, $sigla, $idCentro );
	break;
	case 'printFormCadCentro':
		$centroV = new CentroV();
		$instituicaoC = new InstituicaoController();
		$instituicoes = $instituicaoC->getAll();
		$centroV->printFormCadCentro( $instituicoes );
	break;
	case 'cadCentro':
		$centroC = new CentroController();
		extract( $_POST );
		$centroC->cadastrar( $nome, $sigla, $idInstituicao );
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
		$tipoTitulacaoC = new TipoTitulacaoController();
		$tipoTitulacoes = $tipoTitulacaoC->getAll();
		$cargoC = new CargoController();
		$cargos = $cargoC->getCargos();
		$situacaoC = new SituacaoController();
		$situacoes = $situacaoC->getSituacoes();
		$professorV = new ProfessorV();
		$professorV->printFormCadProfessor( $departamentos, $categoriasFuncionais, $tipoTitulacoes, $cargos, $situacoes );
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

	case 'printFormCadAfastamentoProfessor':
		$professorC = new ProfessorController();
		$professores = $professorC->getAllProfessores();
		$instituicaoC = new InstituicaoController();
		$instituicoes = $instituicaoC->getAll();
		$tipoAfastamentoC = new TipoAfastamentoController();
		$tiposAfastamento = $tipoAfastamentoC->getAll();
		$tipoTitulacaoC = new TipoTitulacaoController();
		$tiposTitulacao = $tipoTitulacaoC->getAll();
		$professorV = new ProfessorV();
		$professorV->printFormCadAfastamentoProfessor( $professores, $instituicoes, $tiposAfastamento, $tiposTitulacao );
	break;
	case 'cadAfastamentoProfessor':
		$professorC = new ProfessorController();
		extract( $_POST );
		$professorC->cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao );
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
	case 'printFormCadUF':
		$ufV = new UfV();
		$paisC = new PaisController();
		$paises = $paisC->getAll();
		$ufV->printFormCadUf( $paises );
	break;
	case 'cadUF':
		$ufC = new UfController();
		extract( $_POST );
		$ufC->cadastrarUf( $idPais, $nome, $sigla );
	break;
	case 'printFormCadMunicipio':
		$municipioV = new MunicipioV();
		$ufC = new UfController();
		$ufs = $ufC->getAll();
		$municipioV->printFormCadMunicipio( $ufs );
	break;
	case 'cadMunicipio':
		$municioC = new municipioController();
		extract( $_POST );
		$municioC->cadastrar( $nome, $idUf  );
	break;
	case 'printFormCadInstituicao':
		$instituicaoV = new InstituicaoV();
		$municioC = new municipioController();
		$municipios = $municioC->getAll();
		$instituicaoV->printFormCadInstituicao( $municipios );
	break;
	case 'cadInstituicao':
		$instituicaoC = new InstituicaoController();
		extract( $_POST );
		$instituicaoC->cadastrar( $nome, $sigla, $idMunicipio );
	break;
	case 'printFormCadTipoAfastamento':
		$tipoAfastamentoV = new TipoAfastamentoV();
		$tipoAfastamentoV->printFormCadTipoAfastamento();
	break;
	case 'cadTipoAfastamento':
		$tipoAfastamentoC = new TipoAfastamentoController();
		extract( $_POST );
		$tipoAfastamentoC->cadastrar( $descricao );
	break;
	case 'printFormCadTipoTitulacao':
		$tipoTitulacaoV = new TipoTitulacaoV();
		$tipoTitulacaoV->printFormCadTipoTitulacao();
	break;
	case 'cadTipoTitulacao':
		$tipoTitulacaoC = new TipoTitulacaoController();
		extract( $_POST );
		$tipoTitulacaoC->cadastrar( $descricao );
	break;
	case 'printFormCadCategoriaFuncional':
		$categoriaFuncionaV = new categoriaFuncionalV();
		$categoriaFuncionaV->printFormCadCategoriaFuncional();
	break;
	case 'cadCategoriaFuncional':
		$categoriaFuncionalC = new CategoriaFuncionalController();
		extract( $_POST );
		$categoriaFuncionalC->cadastrar( $descricao );
	break;
	case 'printFormCadRegimeTrabalho':
		$regimeTrabalhoV = new RegimeTrabalhoV();
		$regimeTrabalhoV->printFormCadRegimeTrabalho();
	break;
	case 'cadRegimeTrabalho':
		$regimeTrabalhoC = new RegimeTrabalhoController();
		extract( $_POST );
		$regimeTrabalhoC->cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva );
	break;
}

?>