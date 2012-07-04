<?php

if(!class_exists("MembroC")) {
	
class MembroC {
	
	private $_header = '';
	
	function __construct() {
		
		$this->_header = "From: CPPD <no-reply@inf.ufsc.br>\r\n";
	}
	
	function __destruct() {}
	
	public function enviarEmailComSenha($arrayMembro) {
		
		/*
		 * Definir uma nova senha randomica
		 */
		$objProfessorM = new ProfessorM();
		$objProfessorM->setWhere("WHERE id_professor = {$arrayMembro['id_professor']}");
		$novaSenha = rand(100000, 999999);
		
		$novaSenhaMd = strtolower(md5($novaSenha));
		
		$retorno = $objProfessorM->update(array('senha'=>$novaSenhaMd));
		
		if(!$novaSenhaMd) {
			return false;
		}
		$html = "
		Prezado(a) {$arrayMembro['nome']},\n\n
		
		Uma nova senha foi gerada para acesso ao sistema da CPPD.\n\n
		Para auutenticação no sistema informe os seguintes dados:\n
		Siape: {$arrayMembro['siape']}\n
		Senha: {$novaSenha}\n\n
		
		Atenciosamente CPPD\n
		";

		@mail($arrayMembro['email'], "CPPD - nova senha", $html, $this->_header);

		return true;
		
	}
	
	public function enviarEmailNovaPauta($id_pauta) {

		$objPautaC = new PautaC();
		$arrayPauta = $objPautaC->getPautaPorId($id_pauta);
		
		$arrayMembros = $this->getMembrosAtivos();
		
		$html = "
		Prezado(a) {NOME},\n\n
		
		Comunico que uma nova pauta foi cadastrada no sistema para apreciação dos processos.\n
		Pauta nº {$arrayPauta['numero']}
		
		Atenciosamente CPPD\n
		";
		
		foreach ($arrayMembros as $membro) {
			$conteudo = $html;
			$conteudo = str_replace("{NOME}", $membro['nome'], $conteudo);
			@mail($membro['email'], "CPPD - nova pauta", $conteudo, $this->_header);
		}

	}
	
	public function enviarEmailCanceladaReuniao($numero_pauta, $local, $dia, $mes, $ano, $hora, $minuto, $motivo_cancelamento = '') {

		$arrayMembros = $this->getMembrosAtivos();
		
		$data = "{$dia}/{$mes}/{$ano}";
		$horario = "{$hora}:{$minuto}";
		
		$html = "
		Prezado(a) {NOME},\n\n
		
		Comunico que a reunião agendada para a data {$data} e hora {$horario} foi cancelada.\n
		Motivo: {$motivo_cancelamento}\n\n
		
		Atenciosamente CPPD\n
		";
		
		foreach ($arrayMembros as $membro) {
			$conteudo = $html;
			$conteudo = str_replace("{NOME}", $membro['nome'], $conteudo);
			@mail($membro['email'], "CPPD - reunião cancelada", $conteudo, $this->_header);
		}
	}
	
	public function enviarEmailNovaReuniao($numero_pauta, $local, $dia, $mes, $ano, $hora, $minuto, $motivo_cancelamento = '') {
		
		$data = "{$dia}/{$mes}/{$ano}";
		$horario = "{$hora}:{$minuto}";
		
		$arrayMembros = $this->getMembrosAtivos();
		
		$html = "
		Prezado(a) {NOME},\n\n
		
		Comunico que foi agendada uma nova reunião da CPPD.\n\n
		Detalhes da reunião:\n
		Pauta: {$numero_pauta}\n
		Data: {$data}\n
		Hora: {$horario}\n
		Local: {$local}\n\n
		
		Atenciosamente CPPD\n
		";
		
		foreach ($arrayMembros as $membro) {
			$conteudo = $html;
			$conteudo = str_replace("{NOME}", $membro['nome'], $conteudo);
			@mail($membro['email'], "CPPD - nova pauta", $conteudo, $this->_header);
		}
		
	}
	
	public function validaAddMembro($id_professor, $check, $email) {
		/*
		 * Validar se já é membro e add ou excluir
		 */
		$retorno = false;
		$objMembroM = new MembroM();
		$objMembroM->setWhere("WHERE id_professor = '{$id_professor}'");
		$array = $objMembroM->consulta();
		if($check == '1') {
			if(!$array) {
				/*
				 * Add membro
				 */
				$param = array();
				$param['id_professor'] = $id_professor;
				$param['data_insert'] = date('Y-m-d H:i:s'); // 1776-7-4 04:13:54'
				$param['ativo'] = '1';
				$param['email'] = $email;
				$retorno = $objMembroM->insert($param);
			} elseif($array['ativo'] == '0') {
				/*
				 * Se ativo = '0' update
				 */
				$set = array();
				$set['ativo'] = '1';
				$set['email'] = $email;
				$objMembroM->setWhere("WHERE id_membro = '{$array['id_membro']}'");
				$retorno = $objMembroM->update($set);
			} else {
				$retorno = true;
			}
		} else {
			/*
			 * Se for membro UPDATE ativo = '0'
			 */
			$retorno = true;
			if($array) {
				$set = array();
				$set['ativo'] = '0';
				$objMembroM->setWhere("WHERE id_membro = '{$array['id_membro']}'");
				$retorno = $objMembroM->update($set);
			}
		}
		return $retorno;
	}
	
	public function inativarMembro($id_membro_excluir) {
		$erro = '';
		if($_SESSION['CPPD']['ID_MEMBRO'] == $id_membro_excluir) {
			$erro = 'Acao negada! Voce nao pode excluir o seu proprio usuario.';
		} else {
		
			$objMembroM = new MembroM();
			$set = array();
			$set['ativo'] = '0';
			$objMembroM->setWhere("WHERE id_membro = '{$id_membro_excluir}'");
			$retorno = $objMembroM->update($set);
			if(!$retorno) {
				$erro = "Erro ao excluir membro!";
			}
		}
		return $erro;
	}
	
	public function alterarSenha($senha_atual, $nova_senha, $confir_senha) {
		
		$objMembroM = new MembroM();
		$objMembroM->setSelect(array(
									'm.id_membro',
									'm.id_professor',
									'm.data_insert',
									'm.ativo',
									'm.email',
									'p.nome',
									'p.matricula',
									'p.senha',
									'p.siape')
								);
		$objMembroM->setTable('tb_membro as m');
		$where = 'INNER JOIN professor as p ON p.id_professor=m.id_professor';
		$where .= " WHERE m.id_membro = '{$_SESSION['CPPD']['ID_MEMBRO']}'";
		$objMembroM->setWhere($where);
		$array = $objMembroM->consulta();
		$erro = '';
		if(!$array) {
			$erro = "Registro nao encontrado do professor!";
		}  else {
			if(strtolower($array['senha']) == strtolower(md5($senha_atual)) && $_SESSION['CPPD']['SIAPE'] != '') {
				/*
				 * Update nova senha
				 */
				$set = array();
				$set['senha'] = strtolower(md5($nova_senha));
				$objMembroM->setTable('professor');
				$objMembroM->setWhere("WHERE siape = '{$_SESSION['CPPD']['SIAPE']}'");
				$retorno = $objMembroM->update($set);
				if(!$retorno) {
					$erro = "Erro na atualizacao da nova senha!";
				}
			} else {
				$erro = "Senha atual invalida!";
			}
		}
		
		
		return $erro;
	}
	
	public function validaMembro($siape, $senha){
		/*
		 * Validar sql injection
		 */
		addslashes($siape);
		addslashes($senha);
		
		if( trim($siape) == '' || trim($senha) == '') {
			
			session_unset();
			session_destroy();
			return false;
		}
		
		$senha = md5($senha);
		
		$objMembroM = new MembroM();
		$objMembroM->setSelect(array(
									'm.id_membro',
									'm.id_professor',
									'm.data_insert',
									'm.ativo',
									'm.email',
									'p.nome',
									'p.matricula',
									'p.siape',
									'p.perfil')
								);
		$objMembroM->setTable('tb_membro as m');
		$where = 'LEFT JOIN professor as p ON p.id_professor=m.id_professor';
		$where .= " WHERE p.siape = '{$siape}' AND p.senha = '{$senha}' AND ";
		$where .= " (m.ativo = '1' OR p.perfil IN (1,2)) ";
		$objMembroM->setWhere($where);
		$array = $objMembroM->consulta();
		$retorno = false;
		if($array) {
			$_SESSION['CPPD']['ID_MEMBRO'] = $array['id_membro'];
			$_SESSION['CPPD']['ID_PROFESSOR'] = $array['id_professor'];
			$_SESSION['CPPD']['SIAPE'] = $array['siape'];
			$_SESSION['CPPD']['NOME'] = $array['nome'];
			$_SESSION['CPPD']['PERFIL'] = $array['perfil'];
			
			$_SESSION['CPPD']['FILTRO_PROCESSO_NUMERO'] = '';
			$_SESSION['CPPD']['FILTRO_PROCESSO_STATUS'] = '';
			$_SESSION['CPPD']['FILTRO_PROCESSO_ASSUNTO'] = '';
			$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REQ'] = '';
			$_SESSION['CPPD']['FILTRO_PROCESSO_NOME_REQ'] = '';
			$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REL'] = '';
			$_SESSION['CPPD']['FILTRO_PROCESSO_NOME_REL'] = '';
			
			$_SESSION['CPPD']['FILTRO_PAUTA_NUMERO'] = '';
			
			$_SESSION['CPPD']['FILTRO_REUNIAO_NUMERO_PAUTA'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_ID_PAUTA'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_STATUS'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_INCICIO'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_FINAL'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL'] = '';
			$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL'] = '';
			
			$retorno = true;
		} else {
			/*
			 * destruir sessao
			 */
			session_unset();
			session_destroy();
		}
		return $retorno;
	}

	public function getMembrosAtivos(){
		$objMembroM = new MembroM();
		$objMembroM->setSelect(array(
									'm.id_membro',
									'm.id_professor',
									'm.data_insert',
									'm.ativo',
									'm.email',
									'p.nome',
									'p.matricula',
									'p.siape',
									'd.id_centro',
									'd.nome as nomeDepartamento',
									'd.sigla as siglaDepartamento',
									'cen.nome as nomeCentro',
									'cen.sigla as siglaCentro',
									'i.id_instituicao',
									'i.id_municipio',
									'i.nome as nomeInstituicao',
									'i.sigla as siglaInstituicao')
								);

								
		$objMembroM->setTable('tb_membro as m');
		$where = "
			INNER JOIN professor as p ON p.id_professor=m.id_professor
			left join departamento d on p.id_departamento = d.id_departamento
			left join centro cen on d.id_centro = cen.id_centro
			left join instituicao i on cen.id_instituicao = i.id_instituicao
			WHERE m.ativo in (1)";
		$objMembroM->setWhere($where);
		$objMembroM->setOrderBy("p.nome");
		$array = $objMembroM->consultaAll();
	
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}
	
	public function getMembroPorSiape($siape, $condicao = array()) {
		$objMembroM = new MembroM();
		$objMembroM->setSelect(array(
									'm.id_membro',
									'm.id_professor',
									'm.data_insert',
									'm.ativo',
									'm.email',
									'p.nome',
									'p.matricula',
									'p.siape',
									'p.senha',
									'd.id_centro',
									'd.nome as nomeDepartamento',
									'd.sigla as siglaDepartamento',
									'cen.nome as nomeCentro',
									'cen.sigla as siglaCentro',
									'i.id_instituicao',
									'i.id_municipio',
									'i.nome as nomeInstituicao',
									'i.sigla as siglaInstituicao')
								);

								
		$objMembroM->setTable('tb_membro as m');
		$where = "
			INNER JOIN professor as p ON p.id_professor=m.id_professor
			left join departamento d
			on p.id_departamento = d.id_departamento
			left join centro cen
			on d.id_centro = cen.id_centro
			left join instituicao i
			on cen.id_instituicao = i.id_instituicao
			WHERE p.siape = '{$siape}'";
		$con = '';
		if(count($condicao) > 0) {
			if(@$condicao['ATIVO'] != '') {
				$con .= " AND m.ativo IN ({$condicao['ATIVO']})";
			}
		}
		
		$objMembroM->setWhere($where);
		$array = $objMembroM->consulta();
		if(!is_array($array)) {
			$array = array();
		}
		$array = array_map("utf8_encode", $array);
		return $array;
	}
	
	public function getMembroPorId($id){
		$objMembroM = new MembroM();
		$objMembroM->setSelect(array(
									'm.id_membro',
									'm.id_professor',
									'm.data_insert',
									'm.ativo',
									'm.email',
									'p.nome',
									'p.matricula',
									'p.siape',
									'd.id_centro',
									'd.nome as nomeDepartamento',
									'd.sigla as siglaDepartamento',
									'cen.nome as nomeCentro',
									'cen.sigla as siglaCentro',
									'i.id_instituicao',
									'i.id_municipio',
									'i.nome as nomeInstituicao',
									'i.sigla as siglaInstituicao')
								);

								
		$objMembroM->setTable('tb_membro as m');
		$where = "
			INNER JOIN professor as p ON p.id_professor=m.id_professor
			left join departamento d
			on p.id_departamento = d.id_departamento
			left join centro cen
			on d.id_centro = cen.id_centro
			left join instituicao i
			on cen.id_instituicao = i.id_instituicao
			WHERE m.id_membro = '{$id}'";
		$objMembroM->setWhere($where);
		$array = $objMembroM->consulta();
		$array = array_map("utf8_encode", $array);
		return $array;
	}
}
}

?>