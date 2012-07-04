<?php

if(!class_exists("PautaC")) {
	
class PautaC {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function pdf($idPauta) {

		$mpdf = new mPDF();
//		$stylesheet = file_get_contents('../public/css/imprimirFicha.css');
//		$content = file_get_contents('../pdf_pauta.php');
		$content = "";
		
		$objProcessoM = new ProcessoM();
		$arraySelect = array(
			'p.id_processo',
			'preq.nome as nome_requerente',
			'prel.nome as nome_relator',
			'a.nome as assunto_processo',
			"date_format(r.data_reuniao,'%d/%m/%Y') as data_reuniao",
			"date_format(r.data_reuniao,'%H:%i') as hora_reuniao",
			'p.numero as numero_processo',
			'pa.numero as numero_pauta',
			'd.nome as nomeDepartamento',
			'd.sigla as siglaDepartamento',
			'cen.nome as nomeCentro',
			'cen.sigla as siglaCentro'
		);
		
		$objProcessoM->isDistinct(true);
		$objProcessoM->setSelect($arraySelect);
		
		$objProcessoM->setTable("tb_processo as p");
		$where = "
			INNER JOIN professor as preq on p.id_professor_requerente=preq.id_professor
			left join departamento d on preq .id_departamento = d.id_departamento
			left join centro cen on d.id_centro = cen.id_centro
			left join instituicao i on cen.id_instituicao = i.id_instituicao
			INNER JOIN professor as prel on p.id_professor_relator=prel.id_professor
			INNER JOIN tb_assunto_processo as a on p.id_assunto_processo=a.id_assunto_processo
			INNER JOIN tb_pauta_processo as pp on p.id_processo=pp.id_processo
			INNER JOIN tb_pauta as pa on pp.id_pauta=pa.id_pauta
			LEFT JOIN tb_reuniao as r on pa.id_pauta=r.id_pauta
			WHERE pa.id_pauta = {$idPauta}
		";
		$objProcessoM->setWhere($where);
		$objProcessoM->setOrderBy("nome_relator");
		$arrayProcesso  = $objProcessoM->consultaAll();
		foreach ($arrayProcesso as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}
		
		$objReuniaoM = new ReuniaoM();
		
		$select = array(
			"date_format(r.data_reuniao,'%d/%m/%Y') as data_reuniao",
			"date_format(r.data_reuniao,'%H:%i') as hora_reuniao",
			'r.local_reuniao',
			'p.numero as numero_pauta'
		);
		
		$objReuniaoM->setSelect($select);
		$where = "
			LEFT JOIN tb_reuniao as r on p.id_pauta=r.id_pauta
			WHERE p.id_pauta = {$idPauta}
		";
		$objReuniaoM->setTable("tb_pauta as p");
		$objReuniaoM->setWhere($where);
		$arraReuniao = $objReuniaoM->consulta();
		$arraReuniao = array_map("utf8_encode", $arraReuniao);
		
		$mes = '';
		switch (date('m')) {
			case 1: $mes = 'janeiro'; break;
			case 2: $mes = 'fevereiro'; break;
			case 3: $mes = 'março'; break;
			case 4: $mes = 'abril'; break;
			case 5: $mes = 'maio'; break;
			case 6: $mes = 'junho'; break;
			case 7: $mes = 'julho'; break;
			case 8: $mes = 'agosto'; break;
			case 9: $mes = 'setembro'; break;
			case 10: $mes = 'outubro'; break;
			case 11: $mes = 'novembro'; break;
			case 12: $mes = 'dezembro'; break;
		}

		$content .= "
		<div style='border-bottom:1px solid #000'>
			<h3 style='margin-bottom:0; text-align: center;'>
				UNIVERSIDADE FEDERAL DE SANTA CATARINA<br />
				COMISSÃO PERMANENTE DE PESSOAL DOCENTE
			</h3>
		</div>
		<div style='margin-top:20px'>
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='48%' align='left' class='texto'>Convocação nº{$arraReuniao['numero_pauta']}</td>
					<td width='48%' align='right' class='texto'>Florianópolis ".date('d')." de {$mes} de ".date('Y')."</td>
				</tr>
			</table>
		</div>";
		if($arraReuniao['data_reuniao'] != '') {
			$content .= "
			<div style='margin-top:20px;text-indent: 40px' class='texto'>
				De ordem do Senhor Presidente, convoco Vossa Senhoria para participar da Reunião Ordinária da Comissão
				Permanente de Pessoal Docente, a realizar-se no dia <strong>{$arraReuniao['data_reuniao']}</strong>, às 
				<strong>{$arraReuniao['hora_reuniao']} horas, na {$arraReuniao['local_reuniao']}</strong> com a seguinte <strong>ORDEM DO DIA</strong>:
			</div>";
		}
		$content .= "
		<div style='margin-top:20px' class='texto'>
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='7%' align='left' class='texto' valign='top'>001</td>
					<td width='7%' align='left' class='texto' valign='top' colspan='2'>Comunicação da Presidência;
						<div style='height: 15px'>&nbsp;</div>
					</td>
				</tr>
				<tr>
					<td width='7%' align='left' class='texto' valign='top'>002</td>
					<td width='7%' align='left' class='texto' valign='top' colspan='2'>Aprovação da pauta e ordem do dia;
						<div style='height: 15px'>&nbsp;</div>
					</td>
				</tr>
				<tr>
					<td width='7%' align='left' class='texto' valign='top'>003</td>
					<td width='7%' align='left' class='texto' valign='top' colspan='2'>Aprovação da(s) ata(s) n(s)º 
						_____________________________________________________________ referente às reuniões ordinárias realizadas nos dias 
						_____________________________________________________________, respectivamente.
						<div style='height: 15px'>&nbsp;</div>
					</td>
				</tr>
			";
		$cont = 4;
		foreach ($arrayProcesso as $key => $proc) {
			
			$numeracao = str_pad($cont, 3, "0", STR_PAD_LEFT);
			
			$content .= "
				<tr>
					<td width='7%' align='left' class='texto' valign='top'>{$numeracao}</td>
					<td width='7%' align='left' class='texto' valign='top'>Proc.:</td>
					<td width='86%' align='left' class='texto' valign='top'>{$proc['numero_processo']}, Prof. {$proc['nome_requerente']} ({$proc['siglaDepartamento']}/{$proc['siglaCentro']})</td>
				</tr>
				<tr>
					<td width='8%' align='left' class='texto' valign='top'></td>
					<td width='8%' align='left' class='texto' valign='top'>Ass.:</td>
					<td width='86%' align='left' class='texto' valign='top'>{$proc['assunto_processo']}</td>
				</tr>
				<tr>
					<td width='7%' align='left' class='texto' valign='top'></td>
					<td width='7%' align='left' class='texto' valign='top'>Rel.:</td>
					<td width='86%' align='left' class='texto' valign='top'>Prof. {$proc['nome_relator']}
						<div style='height: 15px'>&nbsp;</div>
					</td>
				</tr>
			";
			$cont++;
		}
		$content .= "
			</table>
		</div>
		";
		
		
		$stylesheet = "
		.texto {
			font-size: 11px;
		}
		";
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML( $content );
		
		$nome = "pauta.pdf";
		
		$mpdf->Output( "{$nome}", 'D' );

	}
	
	public function getPautaPorId($id) {
		$objPautaM = new PautaM();
		$objPautaM->setSelect(array(
									'p.id_pauta',
									'p.numero',
									'p.data_insert',
									'p.liberar_pauta')
								);
								
		$objPautaM->setTable('tb_pauta as p');
		$where = "
			WHERE p.id_pauta = '{$id}'";
		$objPautaM->setWhere($where);
		$array = $objPautaM->consulta();
		if($objPautaM->getAffectedRows() > 0)
			$array = array_map("utf8_encode", $array);
		return $array;
	}
	
	public function getPautas($session = false, $condicao = null, $order = 'p.id_pauta DESC') {
		
		/*
		 * Restringir por nível de usuário.
		 * Se for apenas membro deverá mostrar apenas pautas
		 * vinculadas com reuniões
		 */
		$objPautaM = new PautaM();
		
		$objPautaM->setSelect(array(
								'p.id_pauta',
								'p.data_insert',
								'p.numero',
								'p.liberar_pauta',
								'r.local_reuniao',
								'r.data_reuniao')
							);
		
		$objPautaM->setTable('tb_pauta as p');
		$objPautaM->setOrderBy($order);
		
		$where = "
			LEFT JOIN tb_reuniao r ON p.id_pauta=r.id_pauta
			WHERE 1 ";
		
		if($condicao) {
			if(@$condicao['REUNIAO'] != '') {
				$where .= " AND r.id_reuniao IS NULL";
			}
			if(@$condicao['REUNIAO_PAUTA'] != '') {
				$p = "";
				if($condicao['REUNIAO_PAUTA'] != '0') {
					$p = " OR p.id_pauta IN ({$condicao['REUNIAO_PAUTA']})";
				}
				$where .= " AND (r.id_reuniao IS NULL {$p})";
			}
		}
		
		if($session) {
			if(@$_SESSION['CPPD']['FILTRO_PAUTA_NUMERO'] != '') {
				$where .= " AND UPPER(p.numero) LIKE UPPER('%{$_SESSION['CPPD']['FILTRO_PAUTA_NUMERO']}%')";
			}
		}
		
		$objPautaM->setWhere($where);
		$array = $objPautaM->consultaAll();
		
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}
	
	public function editar($idPauta, $numero, $processos, $liberar_pauta) {

		$objPautaM = new PautaM();
		$objPautaM->setWhere("WHERE id_pauta = {$idPauta}");
		
		$arrayPauta = $objPautaM->consulta();
		
		$enviarEmail = false;
		if($arrayPauta['liberar_pauta'] == '0' && $liberar_pauta == '1') {
			$enviarEmail = true;
		}

		$array = array();
		$array['numero'] = $numero;
		$array['liberar_pauta'] = $liberar_pauta;
		$retorno = $objPautaM->update($array);

		if($retorno) {

			$objPautaProcessoM = new PautaProcessoM();
			$objPautaProcessoM->setWhere("WHERE id_pauta = {$idPauta}");
			$retorno = $objPautaProcessoM->delete();
			if($retorno) {

				$objPautoProcessoC = new PautaProcessoC();
				$array = explode(',',$processos);
				foreach ($array as $valor) {
					if($valor != '')
						$objPautoProcessoC->inserir($idPauta, $valor);
				}
				
			}
			if($enviarEmail) {
				/*
				 * Disparar e-mail para os membros
				 */
				$objMembroC = new MembroC();
				$objMembroC->enviarEmailNovaPauta($idPauta);
			}
			
		}

		return $retorno;
	}

	public function inserirPauta($numero, $processos, $liberar_pauta) {

		$objPautaM = new PautaM();

		$obj = new PautaVO();
		$obj->numero = utf8_decode($numero);
		$obj->data_insert = date("Y/m/d h:i:s");
		$obj->liberar_pauta = $liberar_pauta;

		$retorno = $objPautaM->insert($obj);

		if($retorno) {
			/*
			 * Inserir tb_pauta_processo
			 */
			$objPautoProcessoC = new PautaProcessoC();
			$array = explode(',',$processos);
			$idPauta = $objPautaM->getLastId();
			foreach ($array as $valor) {
				if($valor != '')
					$objPautoProcessoC->inserir($idPauta, $valor);
			}
			
			if($liberar_pauta == '1') {
				/*
				 * Disparar e-mail para os membros
				 */
				$objMembroC = new MembroC();
				$objMembroC->enviarEmailNovaPauta($idPauta);
			}
			
		}
		
		return $retorno;

	}
}
}

?>