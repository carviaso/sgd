<?php

class ProfessorC {

	private $model;
	private $view;

	/**
	 * Contrutor
	 *
	 * @return void
	 */
	public function ProfessorC() {
		$this->model = new ProfessorM();
		$this->view = new ProfessorV();
	}

	/**
	 * Retorna um array com todos os objetos Professores
	 *
	 * @return array
	 */
	public function getAllProfessores() {
		return $this->model->getAllProfessores();
	}

	/**
	 * Retorna um array com todos os professores no formato json para preenchimento de datatable
	 *
	 * @return json
	 */
	public function getAllProfessoresJson( $page, $limit, $sidx, $sord, $wh ) {
		$count = $this->model->countTotalProfessores( $wh );

		if( $count > 0 ) {
			$total_pages = ceil( $count / $limit );
		} else {
			$total_pages = 0;
		}
		if ( $page > $total_pages ) {
			$page = $total_pages;
		}
		$start = $limit * $page - $limit;
		if( $start < 0 ) $start = 0;
		if( !$sidx ) $sidx = 1;

		echo json_encode( $this->model->getAllProfessoresJson( $start, $limit, $sidx, $sord, $count, $total_pages, $page, $wh ) );
	}

	/**
	 * Retorna um array com todos os objetos Professores por centro
	 *
	 * @return array
	 */
	public function getProfessoresPorDepartamento( $idDepartamento ) {
		return $this->model->getProfessoresPorDepartamento( $idDepartamento );
	}

	/**
	 * Realiza o cadastro de um novo professor
	 *
	 * @return json
	 */
	public function cadastrarProfessor( $nome, $sobrenome,$dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial,	$idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao ) {
		$erro = array();
		if ( empty( $nome) ) $erro[] = 'Nome';
		if ( empty( $sobrenome) ) $erro[] = 'Sobrenome';
		if ( empty( $dataNascimento) ) $erro[] = 'Data nascimento';
		if ( empty( $matricula) ) $erro[] = 'Matricula';
		if ( empty( $siape) ) $erro[] = 'Siape';
		if ( empty( $dataAdmissao) ) $erro[] = 'Data admissao';
		if ( empty( $dataAdmissaoUfsc) ) $erro[] = 'Data admissao UFSC';
		if ( $aposentado == '' ) $erro[] = 'Aposentado';
		if ( empty( $dataPrevistaAposentadoria) ) $erro[] = 'Data prevista aposentadoria';
		if ( empty( $dataEfetivaAposentadoria) ) $erro[] = 'Data efetiva aposentadoria';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrarProfessor( $nome, $sobrenome,$dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Realiza o cadastro do regime de trabalho de um professor
	 *
	 * @return json
	 */
	public function cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio ) {
		$erro = array();
		if ( empty( $processo) ) $erro[] = 'Processo';
		if ( empty( $deliberacao) ) $erro[] = 'Deliberacao';
		if ( empty( $portaria) ) $erro[] = 'Portaria';
		if ( empty( $dataInicio) ) $erro[] = 'Data de Inicio';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Realiza o cadastro de afastamento de um professor
	 *
	 * @return json
	 */
	public function cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao ) {
		$erro = array();
		if ( empty( $idProfessor ) ) $erro[] = 'Professor';
		if ( empty( $idInstituicao ) ) $erro[] = 'Instituicao';
		if ( empty( $idTipoAfastamento ) ) $erro[] = 'Tipo de Afastamento';
		if ( empty( $idTipoTitulacao ) ) $erro[] = 'Titulacao';
		if ( empty( $dataInicio ) ) $erro[] = 'Data de Inicio';
		if ( empty( $dataPrevisaoTermino ) ) $erro[] = 'Data de Previsao de Termino';
		if ( empty( $processo ) ) $erro[] = 'Processo';
		if ( $prorrogacao == '' ) $erro[] = 'Prorrogacao';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Realiza o cadastro de afastamento de um professor
	 *
	 * @return json
	 */
	public function cadastrarProgressaoFuncionalProfessor( $idProfessor, $idCategoriaFuncional, $processo, $dataAvaliacao, $notaAvaliacao, $dataInicio, $portaria ) {
		$erro = array();
		if ( empty( $idProfessor ) ) $erro[] = 'Professor';
		if ( empty( $idCategoriaFuncional ) ) $erro[] = 'Categoria Funcional';
		if ( empty( $processo ) ) $erro[] = 'Processo';
		if ( empty( $dataAvaliacao ) ) $erro[] = 'Data Avaliacao';
		if ( empty( $notaAvaliacao ) ) $erro[] = 'Nota Avaliacao';
		if ( empty( $dataInicio ) ) $erro[] = 'Data Inicio';
		if ( empty( $portaria ) ) $erro[] = 'Portaria';

		if ( count( $erro ) == 0 ) {
			$return = $this->model->cadastrarProgressaoFuncionalProfessor( $idProfessor, $idCategoriaFuncional, $processo, $dataAvaliacao, $notaAvaliacao, $dataInicio, $portaria );
		} else {
			$return->result = 0;
			$return->error = join( '<br />', $erro );
		}
		echo json_encode( $return );
	}

	/**
	 * Lista todos os professores
	 *
	 * @return json
	 */
	public function listarProfessores( $professores ) {
		return $this->view->listarProfessores( $professores );
	}

	/**
	 * Mostra os detalhes do professor desejado
	 *
	 * @return void
	 */
	public function mostraDetalhesProfessor( $idProfessor ) {
		$professor = $this->model->getProfessorPorId( $idProfessor );
		$this->view->mostraDetalhesProfessor( $professor );
	}

	/**
	 * Mostra os detalhes da progressao funcional do professor
	 *
	 * @return void
	 */
	public function mostraProgressaoFuncional( $idProfessor ) {
		$progressaoFuncional = $this->model->getAllProgressaoFuncionalProfessor( $idProfessor );
		$this->view->mostraProgressaoFuncional( $progressaoFuncional );
	}
}
?>