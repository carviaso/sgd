<?php

if(!class_exists("ProcessoC")) {
	
class ProcessoC {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function pdfParecer($idProcesso) {
		$objProcessoM = new ProcessoM();
		$objProcessoM->setSelect(array(
									'p.id_processo',
									'p.numero',
									'p.id_assunto_processo',
									'ap.nome as assunto',
									'p.id_professor_relator',
									'mprof.nome as nome_relator',
									'p.id_professor_requerente',
									'preq.nome as nome_requerente',
									'd.sigla as siglaDepartamento',
									'cen.sigla as siglaCentro',
									'p.id_status_processo',
									'sp.nome as nome_status',
									'p.parecer',
									"IF(p.id_professor_relator={$_SESSION['CPPD']['ID_MEMBRO']}, '1','0') AS meu_processo",
									"IF(p.id_status_processo IN (3,4,5,7,8), '1','0') AS processo_ativo")
								);

								
		$objProcessoM->setTable('tb_processo as p');
		$where = "
			INNER JOIN tb_assunto_processo AS ap ON p.id_assunto_processo=ap.id_assunto_processo
			INNER JOIN professor AS preq ON p.id_professor_requerente=preq.id_professor
			INNER JOIN tb_membro AS m ON p.id_professor_relator=m.id_membro
			INNER JOIN professor AS mprof ON m.id_professor=mprof.id_professor
			INNER JOIN tb_status_processo AS sp ON p.id_status_processo=sp.id_status_processo
			LEFT JOIN departamento AS d on preq.id_departamento = d.id_departamento
			LEFT JOIN centro AS cen on d.id_centro = cen.id_centro
			WHERE p.id_processo = '{$idProcesso}'";
		$objProcessoM->setWhere($where);
		$array = $objProcessoM->consulta();
		$array = array_map("utf8_encode", $array);
		
//		$img = dirname(__FILE__). DIRECTORY_SEPARATOR. 'public' . DIRECTORY_SEPARATOR . 'imagens' . DIRECTORY_SEPARATOR;
		
		preg_match('/(.*)\/[a-zA-Z]+.php/i', $_SERVER['SCRIPT_NAME'], $ret);
		
		$img = 'http://' . $_SERVER['HTTP_HOST'] . $ret[1] . '/../imagens/Brastra.gif';
		
//		mail('luccabassan@gmail.com','[SGD] link img brastra.gif',$img);
		
		$parecer = nl2br($array['parecer']);
		
		$content .= "
		<div align='center'>
				<img src='{$img}'><br />
				SERVIÇO PÚBLICO FEDERAL
			<h4 style='margin-bottom:0; text-align: center;margin-top: 0'>
				<strong>UNIVERSIDADE FEDERAL DE SANTA CATARINA</strong><br />
				<strong>PRÓ-REITORIA DE ENSINO DE GRADUAÇÃO</strong><br />
				<strong>COMISSÃO PERMANENTE DE PESSOAL DOCENTE</strong><br />
				
			</h4>
			<span class='texto'>Prédio da Reitoria - 2º andar | Campus Prof. João David Ferreira Lima | CEP 88040-900<br />
				Trindade - Florianópolis - Santa Catarina - Brasil | www.cppd.ufsc.br<br />
				Fone +55 (48) 3721-9307 | cppd@reitoria.ufsc.br
			</span>
		
		<div style='margin-top:20px' class='texto'>{$parecer}
			";
		
		/*		
		$sr = explode("\n", $array['parecer']);
		foreach ($sr as $value) {
			$content .= "<div class='texto'>{$value}</div>";
		}*/
		
		$content .= "		
					
		</div>";
		$stylesheet = "
		.texto {
			font-size: 12px;
		}
		";
		$mpdf = new mPDF();
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML( $content );
		
		$nome = "parecer.pdf";
		
		$mpdf->Output( "{$nome}", 'D' );
		
		
		
	}
	
	public function getProcessoPorId($id) {
		$objProcessoM = new ProcessoM();
		$objProcessoM->setSelect(array(
									'p.id_processo',
									'p.numero',
									'p.id_assunto_processo',
									'ap.nome as assunto',
									'p.id_professor_relator',
									'mprof.nome as nome_relator',
									'p.id_professor_requerente',
									'preq.nome as nome_requerente',
									'd.sigla as siglaDepartamento',
									'cen.sigla as siglaCentro',
									'p.id_status_processo',
									'sp.nome as nome_status',
									'p.parecer',
									"IF(p.id_professor_relator={$_SESSION['CPPD']['ID_MEMBRO']}, '1','0') AS meu_processo",
									"IF(p.id_status_processo IN (3,4,5,7,8), '1','0') AS processo_ativo")
								);

								
		$objProcessoM->setTable('tb_processo as p');
		$where = "
			INNER JOIN tb_assunto_processo AS ap ON p.id_assunto_processo=ap.id_assunto_processo
			INNER JOIN professor AS preq ON p.id_professor_requerente=preq.id_professor
			INNER JOIN tb_membro AS m ON p.id_professor_relator=m.id_membro
			INNER JOIN professor AS mprof ON m.id_professor=mprof.id_professor
			INNER JOIN tb_status_processo AS sp ON p.id_status_processo=sp.id_status_processo
			LEFT JOIN departamento AS d on preq.id_departamento = d.id_departamento
			LEFT JOIN centro AS cen on d.id_centro = cen.id_centro
			WHERE p.id_processo = '{$id}'";
		$objProcessoM->setWhere($where);
		$array = $objProcessoM->consulta();
		$array = array_map("utf8_encode", $array);
		return $array;
	}
	
	public function atualizarProcessoSimplificado($id_processo, $id_status, $id_requerente, $id_relator, $parecer) {
	
		$objProcessoM = new ProcessoM();

		$array = array();
		if($id_relator!= '')
			$array['id_professor_relator'] = $id_relator;

		if($id_requerente != '')
			$array['id_professor_requerente'] = $id_requerente;

		if($id_status != '')
			$array['id_status_processo'] = $id_status;

		$array['parecer'] = utf8_decode($parecer);
		
		$objProcessoM->setWhere("WHERE id_processo = '{$id_processo}'");

		$retorno = $objProcessoM->update($array);		
		return $retorno;
		
	}
	
	public function atualizarProcesso($id_processo, $numero, $id_status, $id_assunto, $id_requerente, $id_relator, $parecer) {
		
		$objProcessoM = new ProcessoM();

		$array = array();
		if(in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) {
			$array['numero'] = utf8_decode($numero);
			$array['id_professor_relator'] = $id_relator;
			$array['id_professor_requerente'] = $id_requerente;
			$array['id_assunto_processo'] = $id_assunto;
			$array['id_status_processo'] = $id_status;
		}
		$array['parecer'] = utf8_decode($parecer);
		
		$objProcessoM->setWhere("WHERE id_processo = '{$id_processo}'");

		$retorno = $objProcessoM->update($array);		
		return $retorno;
		
	}
	
	public function inserirProcesso($numero, $id_status, $id_assunto, $id_requerente, $id_relator, $parecer) {

		$objProcessoM = new ProcessoM();

		$obj = new ProcessoVO();
		$obj->numero = utf8_decode($numero);
		$obj->id_professor_relator = $id_relator;
		$obj->id_professor_requerente = $id_requerente;
		$obj->id_assunto_processo = $id_assunto;
		$obj->id_status_processo = $id_status;
		$obj->parecer = utf8_decode($parecer);
		$obj->data_insert = date("Y/m/d h:i:s");
		$obj->cadastro_id_professor = $_SESSION['CPPD']['ID_PROFESSOR'];

		$retorno = $objProcessoM->insert($obj);		
		return $retorno;

	}
	
	public function getProcessos($session = false, $condicao = array(), $ordenacao = 'meu_processo DESC, p.id_processo DESC'){
		$objProcessoM = new ProcessoM();
		$objProcessoM->setSelect(array(
									'p.id_processo',
									'p.numero',
									'p.id_assunto_processo',
									'ap.nome AS assunto',
									'p.id_professor_relator',
									'mprof.nome AS nome_relator',
									'p.id_professor_requerente',
									'preq.nome AS nome_requerente',
									'd.sigla AS siglaDepartamento',
									'cen.sigla AS siglaCentro',
									'p.id_status_processo',
									'sp.nome AS nome_status',
									'p.parecer',
									"IF(p.id_professor_relator={$_SESSION['CPPD']['ID_MEMBRO']}, '1','0') AS meu_processo",
									"IF(p.id_status_processo IN (3,4,5,7,8), '1','0') AS processo_ativo")
								);

		$objProcessoM->setTable('tb_processo as p');
		$where = "
			INNER JOIN tb_assunto_processo AS ap ON p.id_assunto_processo=ap.id_assunto_processo
			INNER JOIN professor AS preq ON p.id_professor_requerente=preq.id_professor
			INNER JOIN tb_membro AS m ON p.id_professor_relator=m.id_membro
			INNER JOIN professor AS mprof ON m.id_professor=mprof.id_professor
			INNER JOIN tb_status_processo AS sp ON p.id_status_processo=sp.id_status_processo
			LEFT JOIN departamento AS d on preq.id_departamento = d.id_departamento
			LEFT JOIN centro AS cen on d.id_centro = cen.id_centro
			LEFT JOIN tb_pauta_processo AS pp ON p.id_processo=pp.id_processo
			LEFT JOIN tb_pauta AS pauta ON pp.id_pauta=pauta.id_pauta
			";
		
		$con = '';

		$objProcessoM->isDistinct(true);

		if(!in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) {
			$con .= " AND pauta.liberar_pauta in (1) ";
		}
		
		/*
		 * Validar sessao
		 */
		if(count($condicao) > 0) {
			if(@$condicao['STATUS']) {
				$con .= " AND p.id_status_processo IN ({$condicao['STATUS']})";
			}
			if(@$condicao['ID_PAUTA']) {
				$where .= "
					INNER JOIN tb_pauta_processo AS pautp ON p.id_processo=pautp.id_processo
					INNER JOIN tb_pauta AS paut ON pautp.id_pauta=paut.id_pauta";
				$con .= " AND paut.id_pauta IN ({$condicao['ID_PAUTA']})";
			}
			if(@$condicao['PROCESSOS_EM_PAUTA'] === true) {
				$where .= "
						LEFT JOIN tb_reuniao AS reu ON pauta.id_pauta=reu.id_pauta
					";
				$con .= " AND (reu.id_reuniao IS NULL OR reu.status_reuniao IN (0)) ";
				$con .= " AND pauta.liberar_pauta in (1) ";
			}
		}
		if($session) {
			if(@$_SESSION['CPPD']['FILTRO_PROCESSO_NUMERO'] != '') {
				$con .= " AND UPPER(p.numero) LIKE UPPER('%{$_SESSION['CPPD']['FILTRO_PROCESSO_NUMERO']}%')";
			}
			if(@$_SESSION['CPPD']['FILTRO_PROCESSO_STATUS'] != '' && @$_SESSION['CPPD']['FILTRO_PROCESSO_STATUS'] != '0') {
				$con .= " AND p.id_status_processo IN ({$_SESSION['CPPD']['FILTRO_PROCESSO_STATUS']})";
			}
			if(@$_SESSION['CPPD']['FILTRO_PROCESSO_ASSUNTO'] != '' && @$_SESSION['CPPD']['FILTRO_PROCESSO_ASSUNTO'] != '0') {
				$con .= " AND p.id_assunto_processo IN ({$_SESSION['CPPD']['FILTRO_PROCESSO_ASSUNTO']})";
			}
			if(@$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REQ'] != '') {
				$con .= " AND preq.id_professor IN ({$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REQ']})";
			}
			if(@$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REL'] != '') {
				$con .= " AND m.id_membro IN ({$_SESSION['CPPD']['FILTRO_PROCESSO_ID_REL']})";
			}
		}
		
		$where .= " WHERE 1 {$con}";
		
		$objProcessoM->setWhere($where);
		
		$objProcessoM->setOrderBy($ordenacao);
		$array = $objProcessoM->consultaAll();
	
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}

}
}

?>