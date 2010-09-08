<?php

class ProfessorController {

	/**
	 * Contrutor
	 *
	 * @return void
	 */
	public function ProfessorController() {}

	/**
	 * Retorna um array com todos os objetos Professores
	 *
	 * @return array
	 */
	public function getAllProfessores() {
		$professorDAO = new Professor();
		return $professorDAO->getAllProfessores();
	}

	/**
	 * Retorna um array com todos os objetos Professores por centro
	 *
	 * @return array
	 */
	public function getProfessoresPorDepartamento( $idDepartamento ) {
		$professorDAO = new Professor();
		return $professorDAO->getProfessoresPorDepartamento( $idDepartamento );
	}

	/**
	 * Realiza o cadastro de um novo professor
	 *
	 * @return json
	 */
	public function cadastrarProfessor( $nome, $sobrenome,$dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial,	$idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao ) {
		$professorDAO = new Professor();
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
			$return = $professorDAO->cadastrarProfessor( $nome, $sobrenome,$dataNascimento, $matricula, $siape, $dataAdmissao, $dataAdmissaoUfsc, $aposentado, $dataPrevistaAposentadoria, $dataEfetivaAposentadoria, $idDepartamento, $idCategoriaFuncionalInicial, $idCategoriaFuncionalAtual, $idTipoTitulacao, $idCategoriaFuncionalReferencia, $idCargo, $idSituacao );
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
		$professorDAO = new Professor();

		$erro = array();
		if ( empty( $processo) ) $erro[] = 'Processo';
		if ( empty( $deliberacao) ) $erro[] = 'Deliberacao';
		if ( empty( $portaria) ) $erro[] = 'Portaria';
		if ( empty( $dataInicio) ) $erro[] = 'Data de Inicio';

		if ( count( $erro ) == 0 ) {
			$return = $professorDAO->cadastrarRegimeTrabalhoProfessor( $idProfessor, $idRegimeTrabalho, $processo, $deliberacao, $portaria, $dataInicio );
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
		$professorDAO = new Professor();

		$erro = array();
		if ( empty( $idProfessor ) ) $erro[] = 'Professor';
		if ( empty( $idInstituicao ) ) $erro[] = 'Instituicao';
		if ( empty( $idTipoAfastamento ) ) $erro[] = 'Tipo de Afastamento';
		if ( empty( $idTipoTitulacao ) ) $erro[] = 'Titulacao';
		if ( empty( $dataInicio ) ) $erro[] = 'Data de Inicio';
		if ( empty( $dataPrevisaoTermino ) ) $erro[] = 'Data de Previsao de Termino';
		if ( empty( $processo ) ) $erro[] = 'Processo';
		if ( empty( $prorrogacao ) ) $erro[] = 'Prorrogacao';

		if ( count( $erro ) == 0 ) {
			$return = $professorDAO->cadastrarAfastamentoProfessor( $idProfessor, $idInstituicao, $idTipoAfastamento, $idTipoTitulacao, $dataInicio, $dataPrevisaoTermino, $processo, $prorrogacao, $observacao );
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
		$professorV = new ProfessorV();
		return $professorV->listarProfessores( $professores );
	}


}
?>