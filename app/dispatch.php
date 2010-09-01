<?php

require ('library/Smarty-3.0rc1/libs/Smarty.class.php');
include '../app/controllers/centroController.php';
include '../app/controllers/departamentoController.php';
include '../app/controllers/categoriaFuncionalController.php';
include '../app/controllers/titulacaoController.php';
include '../app/controllers/professorController.php';
include '../app/controllers/cargoController.php';
include '../app/controllers/situacaoController.php';
include '../app/controllers/regimeTrabalhoController.php';
include '../app/views/centro/centroV.php';
include '../app/views/departamento/departamentoV.php';
include '../app/views/professor/professorV.php';
include '../app/models/centro.php';
include '../app/models/departamento.php';
include '../app/models/categoriaFuncional.php';
include '../app/models/titulacao.php';
include '../app/models/professor.php';
include '../app/models/cargo.php';
include '../app/models/situacao.php';
include '../app/models/regimeTrabalho.php';
include '../app/include/conexao.php';

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
		$professorC->cadastrarProfessor( $nome, $sobrenome,$dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao );
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
}

?>