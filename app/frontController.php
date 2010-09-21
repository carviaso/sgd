<?php
session_start();

include_once '../app/controllers/loginC.php';
include_once '../app/models/loginM.php';
include_once '../app/include/conexao.php';

if ( isset( $_POST['verificaLogin'] ) ) {
	$loginC = new loginC();
	return $loginC->valida( $_POST['siape'], md5($_POST['senha'] ) );
}
// VERIFICAR UMA BOA MANEIRA DE REDIRECIONAR NA PERDA DE SESSAO
elseif ( $_SESSION['logado'] != true ) {
	session_unset();
	session_destroy();
	header('Location: http://www.google.com.br/');
}

include_once 'library/Smarty-3.0rc1/libs/Smarty.class.php';

$dirs = array( 'controllers', 'models', 'views/*', 'include', 'helper' );
foreach ( $dirs as $dir ) {
	foreach ( glob( "../app/{$dir}/*.php" ) as $filename ) {
		include_once "{$filename}";
	}
}

extract( $_POST );

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
		$centroC->cadastrar( $nome, $sigla, $idInstituicao );
	break;
	case 'relDiretoresCentros':
		$centroC = new CentroController();
		$centros = $centroC->getCentros();
		$centroV = new CentroV();
		return $centroV->relDiretoresCentros( $centros );
	break;
	case 'relDiretorPorCentro':
		$centroC = new CentroController();
		$diretores = $centroC->relDiretorPorCentro( $_POST['idCentro'] );
		$centroV = new CentroV();
		return $centroV->relDiretorPorCentro( $diretores );
	break;
	case 'relDepartamentoCentro':
		$centroC = new CentroController();
		$centros = $centroC->getCentros();
		$centroV = new CentroV();
		return $centroV->relDepartamentoCentro( $centros );
	break;
	case 'relDepartamentoPorCentro':
		$centroC = new CentroController();
		$departamentos = $centroC->relDepartamentoPorCentro( $_POST['idCentro'] );
		$centroV = new CentroV();
		return $centroV->relDepartamentoPorCentro( $departamentos );
	break;
	case 'relProfessoresPorDepartamento':
		$departamentoC = new DepartamentoController();
		$professores = $departamentoC->getProfessoresPorDepartamento( $_POST['idDepartamento'] );
		$departamentoV = new DepartamentoV();
		return $departamentoV->relProfessoresPorDepartamento( $professores );
	break;
	case 'relProfessoresDepartamento':
		$departamentoC = new DepartamentoController();
		$departamentos = $departamentoC->getDepartamentos();
		$departamentoV = new DepartamentoV();
		return $departamentoV->relProfessoresDepartamento( $departamentos );
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
		$professorC = new ProfessorC();
		$professorC->cadastrarProfessor( $nome, $dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao );
	break;
	case 'printFormCadRegTrabProfessor':
		$professorC = new ProfessorC();
		$professores = $professorC->getAllProfessores();
		$regimeTrabalhoC = new RegimeTrabalhoController();
		$regimesTrabalho = $regimeTrabalhoC->getAllRegimesTrabalho();
		$professorV = new ProfessorV();
		$professorV->printFormCadRegTrabProfessor( $professores, $regimesTrabalho );
	break;
	case 'cadRegimeTrabalhoProfessor':
		$professorC = new ProfessorC();
		$professorC->cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio );
	break;
	case 'printFormCadAfastamentoProfessor':
		$professorC = new ProfessorC();
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
		$professorC = new ProfessorC();
		$professorC->cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao );
	break;
	case 'printFormCadProgFuncProfessor':
		$professorC = new ProfessorC();
		$professores = $professorC->getAllProfessores();
		$categoriaFuncionalC = new CategoriaFuncionalController();
		$categoriasFuncionais = $categoriaFuncionalC->getCategoriaFuncional();
		$professorV = new ProfessorV();
		$professorV->printFormCadProgFuncProfessor( $professores, $categoriasFuncionais );
	break;
	case 'cadProgFuncProfessor':
		$professorC = new ProfessorC();
		$professorC->cadastrarProgressaoFuncionalProfessor( $idProfessor, $idCategoriaFuncional, $processo, $dataAvaliacao, $notaAvaliacao, $dataInicio, $portaria );
	break;
	case 'mostraProgressaoFuncional':
		$professorC = new ProfessorC();
		$professorC->mostraProgressaoFuncional( $idProfessor );
	break;
	case 'listarProfessores':
		$professorC = new ProfessorC();
		$professores = $professorC->getAllProfessores();
		$professorC->listarProfessores( $professores );
	break;
	case 'getAllProfessoresJson':
		$professorC = new ProfessorC();
		$limit = $rows;
	    $wh = "";
	    $searchOn = Strip( $_POST['_search'] );
	    if( $searchOn == 'true' ) {
	        $wh = " WHERE ";
	        $searchstr = Strip( $_POST['filters'] );
	        $wh .= constructWhere( $searchstr );
	    }
		$professores = $professorC->getAllProfessoresJson( $page, $limit, $sidx, $sord, $wh );
	break;
	case 'mostraDetalhesProfessor':
		$professorC= new ProfessorC();
		$professorC->mostraDetalhesProfessor( $idProfessor );
	break;
	case 'printFormCadPais':
		$paisV = new PaisV();
		$paisV->printFormCadPais();
	break;
	case 'cadPais':
		$paisC = new PaisController();
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
		$instituicaoC->cadastrar( $nome, $sigla, $idMunicipio );
	break;
	case 'printFormCadTipoAfastamento':
		$tipoAfastamentoV = new TipoAfastamentoV();
		$tipoAfastamentoV->printFormCadTipoAfastamento();
	break;
	case 'cadTipoAfastamento':
		$tipoAfastamentoC = new TipoAfastamentoController();
		$tipoAfastamentoC->cadastrar( $descricao );
	break;
	case 'printFormCadTipoTitulacao':
		$tipoTitulacaoV = new TipoTitulacaoV();
		$tipoTitulacaoV->printFormCadTipoTitulacao();
	break;
	case 'cadTipoTitulacao':
		$tipoTitulacaoC = new TipoTitulacaoController();
		$tipoTitulacaoC->cadastrar( $descricao );
	break;
	case 'printFormCadCategoriaFuncional':
		$categoriaFuncionaV = new categoriaFuncionalV();
		$categoriaFuncionaV->printFormCadCategoriaFuncional();
	break;
	case 'cadCategoriaFuncional':
		$categoriaFuncionalC = new CategoriaFuncionalController();
		$categoriaFuncionalC->cadastrar( $descricao );
	break;
	case 'printFormCadRegimeTrabalho':
		$regimeTrabalhoV = new RegimeTrabalhoV();
		$regimeTrabalhoV->printFormCadRegimeTrabalho();
	break;
	case 'cadRegimeTrabalho':
		$regimeTrabalhoC = new RegimeTrabalhoController();
		$regimeTrabalhoC->cadastrar( $descricao, $quantidadeHoras, $dedicacaoExclusiva );
	break;
	case 'dataDiff':
		$dataHelper = new DataHelper();
		$dataInicio = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataInicio ) ) );
		$dataPrevisaoTermino = date( 'Y-m-d', strtotime( str_replace( '/', '-', $dataPrevisaoTermino ) ) );
		$mesesDiff = $dataHelper->dataDiff( $dataInicio, $dataPrevisaoTermino );
		echo json_encode( $mesesDiff );
	break;
	case 'printFormCadAvaliacaoDesempenho':
		$avaliacaoDesempenhoV = new AvaliacaoDesempenhoV();
		$avaliacaoDesempenhoV->printFormCadAvaliacaoDesempenho();
	break;
	case 'logout':
		$loginC = new LoginC();
		$loginC->logout();
	break;
}

?>