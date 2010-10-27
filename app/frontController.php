<?php
session_start();

include_once '../app/controllers/loginC.php';
include_once '../app/models/loginM.php';
include_once '../app/include/conexao.php';

if ( isset( $_POST['verificaLogin'] ) ) {
	$loginC = new loginC();
//	try {
//		mail( 'bferronato@gmail.com', 'SGD - Verifica Login', "Usuario: {$_POST['siape']}" );
//	} catch (Exception $e) {
//		echo 'erro ao enviar email';
//	}
	return $loginC->valida( $_POST['siape'], md5($_POST['senha'] ) );
}
/* @todo VERIFICAR UMA BOA MANEIRA DE REDIRECIONAR NA PERDA DE SESSAO */
elseif ( $_SESSION['logado'] != true ) {
	//mail( 'bferronato@gmail.com', 'SGD - Perda sessao', "Perda sessao usuario {$_SESSION['idProfessor']}" );
	session_unset();
	session_destroy();
	/* @todo testar o redirecionamento */
	header('Location: ../index.php');
}

include_once 'library/Smarty-3.0rc1/libs/Smarty.class.php';
include_once 'library/MPDF45/mpdf.php';

$dirs = array( 'controllers', 'models', 'views/*', 'include', 'helper' );
foreach ( $dirs as $dir ) {
	foreach ( glob( "../app/{$dir}/*.php" ) as $filename ) {
		include_once "{$filename}";
	}
}

extract( $_POST );

/*
 * @TODO Chamar somente os controlles
 * Criar um método generico para realizar essa chamada
 */
switch ($action) {
	case 'relCentros':
		$centroC = new CentroC();
		$centroC->relCentros();
	break;
	case 'getCentrosJson':
		$centroC = new CentroC();
		$centros = $centroC->getCentrosJson();
	break;
	case 'relDepartamentos':
		$departamentoC = new DepartamentoC();
		$departamentos = $departamentoC->getDepartamentos( '', '' );
		$departamentoV = new DepartamentoV();
		$departamentoV->relDepartamentos( $departamentos );
	break;
	case 'getDepartamentos':
		$departamentoC = new DepartamentoC();
		$departamentoC->getDepartamentos( $returnType, $filtro );
	break;
	case 'getDepartamentosPorCentro':
		$departamentoC = new DepartamentoC();
		$departamentos = $departamentoC->getDepartamentosPorCentro( $_POST['idCentro'] );
		$departamentoV = new DepartamentoV();
		return $departamentoV->viewDepartamento( $departamentos );
	break;
	case 'printFormCadDepartamento':
		$departamentoV = new DepartamentoV();
		$centroC = new CentroC();
		$centros = $centroC->getCentros();
		$departamentoV->printFormCadDepartamento( $centros );
	break;
	case 'cadDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentoC->cadastrar( $nome, $sigla, $idCentro, $fone );
	break;
	case 'printFormCadCentro':
		$centroV = new CentroV();
		$instituicaoC = new InstituicaoController();
		$instituicoes = $instituicaoC->getAll();
		$centroV->printFormCadCentro( $instituicoes );
	break;
	case 'cadCentro':
		$centroC = new CentroC();
		$centroC->cadastrar( $nome, $sigla, $idInstituicao, $fone );
	break;
	case 'relDiretoresCentros':
		$centroC = new CentroC();
		$centroC->relDiretoresCentros();
	break;
	case 'relDiretorPorCentro':
		$centroC = new CentroC();
		$centroC->relDiretorPorCentro( $idCentro );
	break;
	case 'definirAtualDiretor':
		$centroC = new CentroC();
		$centroC->definirAtualDiretor( $idCentro, $idProfessor );
	break;
	case 'definirAtualViceDiretor':
		$centroC = new CentroC();
		$centroC->definirAtualViceDiretor( $idCentro, $idProfessor );
	break;
	case 'definirAtualSecretario':
		$centroC = new CentroC();
		$centroC->definirAtualSecretario( $idCentro, $idProfessor );
	break;
	case 'relDepartamentoCentro':
		$centroC = new CentroC();
		$centros = $centroC->getCentros();
		$centroV = new CentroV();
		return $centroV->relDepartamentoCentro( $centros );
	break;
	case 'relDepartamentoPorCentro':
		$centroC = new CentroC();
		$departamentos = $centroC->relDepartamentoPorCentro( $_POST['idCentro'] );
		$centroV = new CentroV();
		return $centroV->relDepartamentoPorCentro( $departamentos );
	break;
	case 'relChefesDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentoC->relChefesDepartamento();
	break;
	case 'relChefesPorDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentoC->relChefesPorDepartamento( $idDepartamento );
	break;
	case 'definirAtualChefeDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentoC->definirAtualChefeDepartamento( $idDepartamento, $idProfessor );
	break;
	case 'definirAtualSubChefeDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentoC->definirAtualSubChefeDepartamento( $idDepartamento, $idProfessor );
	break;
	case 'definirAtualChefeExpediente':
		$departamentoC = new DepartamentoC();
		$departamentoC->definirAtualChefeExpediente( $idDepartamento, $idProfessor );
	break;
	case 'relGeralProfessor':
		$professorC = new ProfessorC();
		$professorC->relGeralProfessor();
	break;
	case 'detalheGeralProfessor':
		$professorC = new ProfessorC();
		$professorC->detalheGeralProfessor( $idProfessor );
	break;
	case 'relatorioAfastamentoAposentadoria':
		$professorC = new ProfessorC();
		$professorC->relatorioAfastamentoAposentadoria();
	break;
	case 'relProfessoresPorDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentoC->relProfessoresPorDepartamento( $idDepartamento, $filtro );
	break;
	case 'relProfessoresDepartamento':
		$departamentoC = new DepartamentoC();
		$departamentos = $departamentoC->getDepartamentos( '', '' );
		$departamentoV = new DepartamentoV();
		return $departamentoV->relProfessoresDepartamento( $departamentos );
	break;
	case 'findProfessorByName':
		$professorC = new ProfessorC();
		$professorC->findProfessorByName( $nameParam );
	break;
	case 'printFormCadProfessor':
		$professorC = new ProfessorC();
		$professorC->printFormCadProfessor();
	break;
	case 'cadProfessor':
		$professorC = new ProfessorC();
		$professorC->cadastrarProfessor( $nome, $dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idRegimeTrabalho, $idSituacao, $idStatusAtualProfessor );
	break;
	case 'printFormCadRegTrabProfessor':
		$professorC = new ProfessorC();
		$professores = $professorC->getAllProfessores( '', '');
		$regimeTrabalhoC = new RegimeTrabalhoC();
		$regimesTrabalho = $regimeTrabalhoC->getAllRegimesTrabalho( '' );
		$professorV = new ProfessorV();
		$professorV->printFormCadRegTrabProfessor( $professores, $regimesTrabalho );
	break;
	case 'cadRegimeTrabalhoProfessor':
		$professorC = new ProfessorC();
		$professorC->cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio );
	break;
	case 'printFormCadAfastamentoProfessor':
		$professorC = new ProfessorC();
		$professores = $professorC->getAllProfessores( '', '' );
		$instituicaoC = new InstituicaoController();
		$instituicoes = $instituicaoC->getAll();
		$tipoAfastamentoC = new TipoAfastamentoController();
		$tiposAfastamento = $tipoAfastamentoC->getAll();
		$tipoTitulacaoC = new TipoTitulacaoController();
		$tiposTitulacao = $tipoTitulacaoC->getAll();
		$professorV = new ProfessorV();
		$professorV->printFormCadAfastamentoProfessor( $professores, $instituicoes, $tiposAfastamento, $tiposTitulacao );
	break;
	case 'getStatusBySituacao':
		$situacaC = new SituacaoC();
		$situacaC->getStatusBySituacao( $returnType, $filtro );
	break;
	case 'cadAfastamentoProfessor':
		$professorC = new ProfessorC();
		$professorC->cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao );
	break;
	case 'printFormCadProgFuncProfessor':
		$professorC = new ProfessorC();
		$professores = $professorC->getAllProfessores( '', '' );
		$categoriaFuncionalC = new CategoriaFuncionalController();
		$categoriasFuncionais = $categoriaFuncionalC->getCategoriaFuncional();
		$professorV = new ProfessorV();
		$professorV->printFormCadProgFuncProfessor( $professores, $categoriasFuncionais );
	break;
	case 'cadProgFuncProfessor':
		$professorC = new ProfessorC();
		$professorC->cadastrarProgressaoFuncionalProfessor( $idProfessor, $idCategoriaFuncional, $processo, $tituloAvaliacao, $dataAvaliacao, $notaAvaliacao, $aPartirDe, $portaria, $observacoes );
	break;
	case 'mostraProgressaoFuncional':
		$professorC = new ProfessorC();
		$professorC->mostraProgressaoFuncional( $idProfessor );
	break;
	case 'listarProfessores':
		$professorC = new ProfessorC();
		$professorC->listarProfessores();
	break;
	case 'getAllProfessores':
		$professorC = new ProfessorC();
		$professorC->getAllProfessores( $returnType, $filtro );
	break;
	case 'getAllProfessoresJson':
		// @todo Mudar essa funcao para o professorC
		$professorC = new ProfessorC();
		$limit = $rows;
		$wh = "";
		$searchOn = Strip( $_POST['_search'] );
		if( $searchOn == 'true' ) {
			$wh = " WHERE ";
			$searchstr = Strip( $_POST['filters'] );
			$wh .= constructWhere( $searchstr );
		}
		if ( ( !empty( $filtro ) && ( $searchOn == 'false' ) ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'cargo':
					$wh .= ' WHERE p.id_cargo in (' . join( ',', $filtro->params->idCargo ) . ')';
					$wh .= ' AND p.id_situacao not in (2)';
				break;
			}
		}
		if ( ( !empty( $filtro ) && ( $searchOn == 'true' ) ) ) {
			$filtro = json_decode( $filtro );
			switch ( $filtro->tipo ) {
				case 'cargo':
					$wh .= ' AND p.id_cargo in (' . join( ',', $filtro->params->idCargo ) . ')';
					$wh .= ' AND p.id_situacao not in (2)';
				break;
			}
		}
		$professores = $professorC->getAllProfessoresJson( $page, $limit, $sidx, $sord, $wh );
	break;
	case 'mostraDetalhesProfessor':
		$professorC= new ProfessorC();
		$professorC->mostraDetalhesProfessor( $idProfessor );
	break;
	case 'imprimirFicha':
		$professorC= new ProfessorC();
		$professorC->imprimirFicha( $idProfessor );
	break;
	case 'printFormUser':
		$professorC = new ProfessorC();
		$professorC->printFormUser( $_SESSION['idProfessor'] );
	break;
	case 'updateUser':
		$professorC = new ProfessorC();
		$professorC->updateUser( $nome, $dataNascimento, $siape, $senhaAtual, $novaSenha, $novaSenha2 );
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
		$municioC = new municipioController();
		$municioC->printFormCadMunicipio();

	break;
	case 'cadMunicipio':
		$municioC = new municipioController();
		$municioC->cadastrar( $nome, $idUf );
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
	case 'printFormCadPortaria':
		$portariaC = new PortariaC();
		$portariaC->printFormCadPortaria();
	break;
	case 'cadPortaria':
		$portariaC = new PortariaC();
		$portariaC->cadPortaria( $idProfessor, $portaria, $descricao );
	break;
	case 'logout':
		$loginC = new LoginC();
		$loginC->logout();
	break;
}

?>