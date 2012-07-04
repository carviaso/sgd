<?php
session_start();

require_once(dirname(__FILE__) . '/../../app/library/Smarty-3.0rc1/libs/Smarty.class.php');
require_once(dirname(__FILE__) . '/../../app/library/MPDF45/mpdf.php');
//require_once(dirname(__FILE__) . '/../../app/library/phpmailer/class.phpmailer.php');

$dirs = array( 'models/lib', 'models', 'controllers', 'views/*', 'inc', 'helper' );
foreach ( $dirs as $dir ) {
	foreach ( glob( "../app/{$dir}/*.php" ) as $filename ) {
		include_once "{$filename}";
	}
}
$objUtil = new Util();

$erro = '';
$status = '1';
$texto = '';
extract( $_REQUEST );

if($action == 'esqueci-senha') {
	$objMembroC = new MembroC();
	$array = $objMembroC->getMembroPorSiape($siape, array('ATIVO'=>'1'));
	
	if(count($array) > 0) {
		/*
		 * Enviar e-mail com a senha para o professor
		 */
		$retorno = $objMembroC->enviarEmailComSenha($array);
		if($retorno) {
			$texto = "A sua senha foi enviada para o seu e-mail.";
		} else {
			$status = '3';
			$erro = 'Erro ao gerar nova senha! Favor entre em contato com a administração do sistema';
			$erro .= ' para maiores informações.';
		}
	} else {
		$status = '3';
		$erro = 'É necessário ser membro da CPPD para ter acesso ao sistema!';
	}
	$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
	die();
}

if ( isset( $_POST['verificaLogin'] ) ) {
	$objMembroC = new MembroC();
	$retorno = $objMembroC->validaMembro($siape, $senha);
	if(!$retorno) {
		$status = '3';
		$erro = "Login e/ou senha inválido(s)!";
	}
	$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
	die();
} elseif($_SESSION['CPPD']['ID_MEMBRO'] == '') {
	$status = '3';
	$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
}

/*
 * @TODO Chamar somente os controlles
 * Criar um método generico para realizar essa chamada
 */

switch ($action) {
	case 'upload-ata':
		
		$arquivoNome = '';
		$novoFilename = '';
		
		/*
		 * Modificar nome do arquivo.
		 * Retirar espaços, acentos
		 */
		$novoFilename = str_replace(array(' '), array('_'), $_FILES['file_ata']['name']);
		$novoFilename = Util::removerAcento($novoFilename);
		
		$url = dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'repositorio'.DIRECTORY_SEPARATOR;
		
		if($_FILES['file_ata']['error'] > 0) {
			$status = '0';
			$erro = "Erro no upload [{$_FILES['file_ata']['error']}]";
		} else {
			if(move_uploaded_file($_FILES['file_ata']['tmp_name'], $url . $novoFilename)) {
				$arquivoNome = $novoFilename;
			} else {
				$status = '0';
				$erro = "Erro ao mover arquivo para repositorio [{$_FILES['file_ata']['error']}]";			
			}
		}
		
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$teste, 'arquivo'=>$arquivoNome));
		break;
	case 'pdf-parecer':
		$objProcessoC = new ProcessoC();
		$objProcessoC->pdfParecer($id_processo);
		break;
	case 'pdf-pauta':
		$objPautaC = new PautaC();
		$objPautaC->pdf($id_pauta);
		break;
	case 'atualiza-email-membro':
		$objMembroM = new MembroM();
		$objMembroM->setWhere("WHERE id_membro = {$id_membro}");
		$retorno = $objMembroM->update(array('email'=>$email));
		if($retorno) {	
			$texto = "E-mail atualizado com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao atualizar registro!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'reuniao-add-processo':
		$objPautaProcessoC = new PautaProcessoC();
		$retorno = $objPautaProcessoC->inserir($id_pauta, $id_processo);
		if($retorno) {	
			$texto = "Processo incluído na pauta com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao incluir processo na pauta!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'edit-processo-simplificado':
		$objProcessoC = new ProcessoC();
		$retorno = $objProcessoC->atualizarProcessoSimplificado($id_processo, $id_status, $id_requerente, $id_relator, $parecer);
		if($retorno) {	
			$texto = "Processo atualizado com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao atualizar processo!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'excluir-processo-da-pauta':
		$objPautaProcessoM = new PautaProcessoM();
		$objPautaProcessoM->setWhere("WHERE id_pauta = {$id_pauta} AND id_processo = {$id_processo}");
		$retorno = $objPautaProcessoM->delete();
		if($retorno) {
			$texto = "Processo retirado de pauta com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao retirar processo de pauta!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'edit-reuniao':
		
		$objReuniaoC = new ReuniaoC();
		$retorno = $objReuniaoC->editar($id_reuniao, $id_pauta, $id_status, $local, $dia, $mes, $ano, $hora, $minuto, $motivo_cancelamento, $lista_presenca, $arquivo_novo, $action_file);
		if($retorno) {
			if($email == '') {
				$objMembroC = new MembroC();
				if($id_status == '2') {
					/*
					 * cancelamento
					 */
					$objMembroC->enviarEmailCanceladaReuniao($numero_pauta, $local, $dia, $mes, $ano, $hora, $minuto, $motivo_cancelamento);
				} else {
					$objMembroC->enviarEmailNovaReuniao($numero_pauta, $local, $dia, $mes, $ano, $hora, $minuto, $motivo_cancelamento);
				}
			}
			$texto = "Reunião atualizada com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao atualizar reunião!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		
		break;
	case 'filtro-listar-reunioes':
		
		$_SESSION['CPPD']['FILTRO_REUNIAO_NUMERO_PAUTA'] = $numero_pauta;
		$_SESSION['CPPD']['FILTRO_REUNIAO_ID_PAUTA'] = $id_pauta;
		$_SESSION['CPPD']['FILTRO_REUNIAO_ID_STATUS'] = trim($id_status);
		$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_INICIO'] = ($mes_inicio != '' && $ano_inicio != '')?$dia_inicio:'';
		$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO'] = ($ano_inicio != '')?$mes_inicio:'';
		$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO'] = $ano_inicio;
		$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_FINAL'] = ($mes_final != '' && $ano_final != '')?$dia_final:'';
		$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL'] = ($ano_final != '')?$mes_final:'';
		$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL'] = $ano_final;

		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'excluir-reuniao':
		$objReuniaoM = new ReuniaoM();
		$objReuniaoM->setWhere("WHERE id_reuniao = {$id_reuniao}");
		$retorno = $objReuniaoM->delete();
		if($retorno) {
			$texto = "Reunião excluida com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao excluir reunião!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'add-nova-reuniao':
		
		$objReuniaoC = new ReuniaoC();
		$retorno = $objReuniaoC->inserir($id_pauta, $local, $dia, $mes, $ano, $hora, $minuto);
		if($retorno) {
			if($email == '1') {
				$objMembroC = new MembroC();
				$objMembroC->enviarEmailNovaReuniao($numero_pauta, $local, $dia, $mes, $ano, $hora, $minuto);
			}
			
			$texto = "Reunião cadastrada com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao cadastrar reunião!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'edit-pauta':
		$objPautaC = new PautaC();
		$retorno = $objPautaC->editar($id_pauta, $numero_pauta, $processos, $liberar_pauta);
		if($retorno) {	
			$texto = "Pauta atualizada com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao atualizar pauta!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'excluir-pauta':
		$objPautaM = new PautaM();
		$objPautaM->setWhere("WHERE id_pauta = {$id_pauta}");
		$retorno = $objPautaM->delete();
		if($retorno) {
			$objPautaProcessoM = new PautaProcessoM();
			$objPautaProcessoM->setWhere("WHERE id_pauta = {$id_pauta}");
			$objPautaProcessoM->delete();
			
			$texto = "Pauta excluida com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao excluir pauta!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'add-nova-pauta':
		$objPautaC = new PautaC();
		$retorno = $objPautaC->inserirPauta($numero_pauta, $processos, $liberar_pauta);
		if($retorno) {
			if($liberar_pauta) {
				/*
				 * Enviar e-mail para membros
				 */
			}
			$texto = "Pauta inserida com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao inserir pauta!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'filtro-listar-pautas':
		$_SESSION['CPPD']['FILTRO_PAUTA_NUMERO'] = $numero_pauta;
		
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'filtro-listar-processos':
		
		$_SESSION['CPPD']['FILTRO_PROCESSO_NUMERO'] = $numero_processo;
		$_SESSION['CPPD']['FILTRO_PROCESSO_STATUS'] = $id_status;
		$_SESSION['CPPD']['FILTRO_PROCESSO_ASSUNTO'] = $id_assunto;
		$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REQ'] = $id_requerente;
		$_SESSION['CPPD']['FILTRO_PROCESSO_NOME_REQ'] = $nome_requerente;
		$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REL'] = $id_relator;
		$_SESSION['CPPD']['FILTRO_PROCESSO_NOME_REL'] = $nome_relator;

		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'excluir-processo':
		$objProcessoM = new ProcessoM();
		$objProcessoM->setWhere("WHERE id_processo = {$id_processo}");
		$retorno = $objProcessoM->delete();
		if($retorno) {	
			$texto = "Processo excluido com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao excluir processo!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'edit-processo':
		$objProcessoC = new ProcessoC();
		$retorno = $objProcessoC->atualizarProcesso($id_processo, $numero_processo, $id_status, $id_assunto, $id_requerente, $id_relator, $parecer);
		if($retorno) {	
			$texto = "Processo atualizado com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao atualizar processo!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'add-novo-processo':
		$objProcessoC = new ProcessoC();
		$retorno = $objProcessoC->inserirProcesso($numero_processo, $id_status, $id_assunto, $id_requerente, $id_relator, $parecer);
		if($retorno) {	
			$texto = "Processo inserido com sucesso!";
		} else {
			$status = '3';
			$erro = 'Erro ao inserir processo!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'pesquisa-requerentes':
		$objProfessorC = new ProfessorC();
		$array = $objProfessorC->getProfessores($search, 200);
		
		$objUtil->retornoJson(array('status'=>$status, 'array'=>$array, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'add-excluir-membro':
//		$texto = 'id_professor: ' . $id_professor . ' - checked: ' . $funcao;
		$objMembroC = new MembroC();
		$retorno = $objMembroC->validaAddMembro($id_professor, $check, $email);
		if($retorno) {	
			if($check == '1') {
				$texto = "Professor inserido com sucesso!";
			} else {
				$texto = "Professor excluir da CPPD";
			}
		} else {
			$status = '3';
			$erro = 'Erro ao atualizar registro!';
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'excluir-membro':
		/*
		 * Apenas inativa o membro
		 */
		$objMembroC = new MembroC();
		$erro = $objMembroC->inativarMembro($id_membro_excluir);
		if($erro != '') {
			$status = '3';
		} else {
			$texto = "Membro excluido com sucesso!";
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'alterar-senha':
		$objMembroC = new MembroC();
		$retorno = $objMembroC->alterarSenha($senha_atual, $nova_senha, $confir_senha);
		if($retorno != '') {
			$status = '3';
			$erro = $retorno;
		}  else {
			$texto = "Senha alterada com sucesso!";
		}
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
		break;
	case 'lista-membro':
		$texto = "ok";
		$objMembroC = new MembroC();
		$array = $objMembroC->getMembros();
//		print_r($array);
		$objUtil->retornoJson(array('status'=>$status, 'erro'=>$erro, 'texto'=>$texto));
	break;
}

?>