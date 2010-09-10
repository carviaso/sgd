<?php

include_once 'library/Smarty-3.0rc1/libs/Smarty.class.php';

$dirs = array( 'controllers', 'models', 'views/*', 'include', 'helper' );
foreach ( $dirs as $dir ) {
	foreach ( glob( "../app/{$dir}/*.php" ) as $filename ) {
		include "{$filename}";
	}
}

$action = $_POST['action'];

switch ($action) {
	case 'relCentros':
		$centroC = new CentroController();
		$centros = $centroC->getCentros();
		$centroV = new CentroV();
		return $centroV->relCentros( $centros );
	break;
	case 'relDepartamentos':
		$departamentoC = new DepartamentoController();
		$departamentos = $departamentoC->getDepartamentos();
		$departamentoV = new DepartamentoV();
		return $departamentoV->relDepartamentos( $departamentos );
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
//	case 'printCentros':
//		$centroC = new CentroController();
//		$centros = $centroC->getCentros();
//		$centroV = new CentroV();
//		return $centroV->listCentros( $centros );
//	break;
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
	case 'printFormCadProgFuncProfessor':
		$professorC = new ProfessorController();
		$professores = $professorC->getAllProfessores();
		$categoriaFuncionalC = new CategoriaFuncionalController();
		$categoriasFuncionais = $categoriaFuncionalC->getCategoriaFuncional();
		$professorV = new ProfessorV();
		$professorV->printFormCadProgFuncProfessor( $professores, $categoriasFuncionais );
	break;
	case 'cadProgFuncProfessor':
		$professorC = new ProfessorController();
		extract( $_POST );
		$professorC->cadastrarProgressaoFuncionalProfessor( $idProfessor, $idCategoriaFuncional, $processo, $dataAvaliacao, $notaAvaliacao, $dataInicio, $portaria );
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
	case 'dataDiff':
		$dataHelper = new DataHelper();
		extract( $_POST );
		$dataInicio = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataInicio ) ) );
		$dataPrevisaoTermino = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataPrevisaoTermino ) ) );
		$mesesDiff = $dataHelper->dataDiff( $dataInicio, $dataPrevisaoTermino );
		echo json_encode( $mesesDiff );
	break;
}

?>