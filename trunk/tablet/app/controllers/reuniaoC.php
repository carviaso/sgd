<?php

if(!class_exists("ReuniaoC")) {
	
class ReuniaoC {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function getProximaReuniao() {
		
		$objReuniaoM = new ReuniaoM();
		
		$select = array(
				'r.id_reuniao',
				'p.id_pauta',
				'p.numero',
				"date_format(r.data_reuniao,'%d/%m/%Y %H:%i') as data_reuniao",
				"IF(date(curdate())=date(r.data_reuniao), '1','0') as hoje"
		);
		
		$objReuniaoM->setSelect($select);
		$objReuniaoM->setTable('tb_reuniao AS r');
		
		$where = "
			INNER JOIN tb_pauta AS p ON r.id_pauta=p.id_pauta
			WHERE r.status_reuniao IN (0) AND r.data_reuniao >= curdate()
		";
		
		$objReuniaoM->setWhere($where);
		
		$objReuniaoM->setOrderBy("r.data_reuniao ASC");
		$objReuniaoM->setLimit('LIMIT 0 , 1');
		
		$array = $objReuniaoM->consulta();
		
		if($objReuniaoM->getAffectedRows() == 0) {
			$array = array();
		}
		
		return $array;
	}
	
	public function editar($id_reuniao, $id_pauta, $id_status, $local, $dia, $mes, $ano, $hora, $minuto, $motivo_cancelamento, $lista_presenca = '', $arquivo_novo = '', $action_file = '') {
		
		$data  = mktime($hora, $minuto, 0, $mes,  $dia,  $ano);
		
		$objMembroM = new MembroM();		
		$objMembroM->setWhere("WHERE ativo = 1");
		$totalMembros = $objMembroM->count();
		
		$objReuniaoM = new ReuniaoM();
		
		$objReuniaoM->setWhere("WHERE id_reuniao = {$id_reuniao}");
		$reuniao = $objReuniaoM->consulta();
		
		$array = array();
		$array['id_pauta'] = $id_pauta;
		$array['local_reuniao'] = utf8_decode($local);
		$array['data_reuniao'] = date("Y/m/d H:i:s", $data);
		$array['status_reuniao'] = $id_status;
		$array['motivo_cancelamento'] = ($id_status == '2')?utf8_decode($motivo_cancelamento):'';
		$array['total_membro'] = $totalMembros;
		if($action_file == 'troca') {
			$array['arquivo_ata'] = $arquivo_novo;
		} elseif($action_file == 'exclui') {
			$array['arquivo_ata'] = '';
		}
		
		$retorno = $objReuniaoM->update($array);
		
		if($retorno) {
			/*
			 * arquivo ata
			 */
			$url = dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'repositorio'.DIRECTORY_SEPARATOR;
			if($action_file == 'troca' || $action_file == 'exclui') {
				
				$file = $reuniao['arquivo_ata'];
				if(file_exists($url.$file)) {
					@unlink($url.$file);
				}
				
			}
		}
		
		if($retorno && $lista_presenca != '') {
			$objPresencaM = new PresencaM();
			$objPresencaM->setWhere("WHERE id_reuniao = {$id_reuniao}");
			$objPresencaM->delete();
			
			$arrayPresenca = explode(',',$lista_presenca);
			foreach ($arrayPresenca as $key => $id_membro) {
				if($id_membro != '') {
					$novaPresenca = array();
					$novaPresenca['id_reuniao'] = $id_reuniao;
					$novaPresenca['id_membro'] = $id_membro;
					$novaPresenca['presenca'] = '1';
					$objPresencaM->insert($novaPresenca);
				}
			}
			
		}
		
		return $retorno;
		
	}
	
	public function getReuniaoPorId($id) {
		
		$objReuniaoM = new ReuniaoM();
		$objReuniaoM->setSelect(array(
									'r.id_reuniao',
									'p.id_pauta',
									'p.numero AS numero_pauta',
									"if(status_reuniao=0,'A ser realizada', if(status_reuniao=1, 'Realizada',if(status_reuniao=2, 'Cancelada','Transferida'))) as nome_status_reuniao ",
									'r.data_insert',
									"date_format(r.data_reuniao,'%d/%m/%Y %H:%i') as data_reuniao",
									"date_format(r.data_reuniao,'%d') as data_reuniao_dia",
									"date_format(r.data_reuniao,'%m') as data_reuniao_mes",
									"date_format(r.data_reuniao,'%Y') as data_reuniao_ano",
									"date_format(r.data_reuniao,'%H') as data_reuniao_hora",
									"date_format(r.data_reuniao,'%i') as data_reuniao_minuto",
									'r.local_reuniao',
									'r.status_reuniao',
									'r.ata',
									'r.liberar_ata',
									'r.motivo_cancelamento',
									'r.total_membro',
									'r.arquivo_ata')
								);

								
		$objReuniaoM->setTable('tb_reuniao as r');
		$where = "
			LEFT JOIN tb_pauta p ON p.id_pauta=r.id_pauta
			WHERE r.id_reuniao = '{$id}'";
		$objReuniaoM->setWhere($where);
		$array = $objReuniaoM->consulta();
		
		if($array) 
			$array = array_map("utf8_encode", $array);
		return $array;
	}
	
	public function inserir($id_pauta, $local, $dia, $mes, $ano, $hora, $minuto) {
		
		$objReuniaoM = new ReuniaoM();
		
		$data  = mktime($hora, $minuto, 0, $mes,  $dia,  $ano);
		
//		$status = ($id_pauta == '' || $id_pauta == '0')?'0':'1';
		$status = '0';

		$obj = new ReuniaoVO();
		$obj->id_pauta = $id_pauta;
		$obj->data_insert = date("Y/m/d H:i:s");
		$obj->data_reuniao = date("Y/m/d H:i:s", $data);
		$obj->local_reuniao = utf8_decode($local);
		$obj->status_reuniao = $status;

		$retorno = $objReuniaoM->insert($obj);
		
		$objPautaC = new PautaC();
		$arrayPauta = $objPautaC->getPautaPorId($id_pauta);
		if($arrayPauta['liberar_pauta'] == '0') {
			$objPautaM = new PautaM();
			$objPautaM->setWhere("WHERE id_pauta = {$id_pauta}");
			$array['liberar_pauta'] = '1';
			$objPautaM->update($array);
		}

		return $retorno;

	} 
	
	public function getReunioes($session = false, $order = 'r.data_reuniao asc') {
		
		$objReuniaoM = new ReuniaoM();
		
		$objReuniaoM->setSelect(array(
								'r.id_reuniao',
								'p.id_pauta',
								'p.numero AS numero_pauta',
								"if(status_reuniao=0,'A ser realizada', if(status_reuniao=1, 'Realizada',if(status_reuniao=2, 'Cancelada','Transferida'))) as nome_status_reuniao ",
								'r.data_insert',
								"date_format(r.data_reuniao,'%d/%m/%Y %H:%i') as data_reuniao",
								'r.local_reuniao',
								'r.status_reuniao',
								'r.ata',
								'r.liberar_ata',
								"IF(p.liberar_pauta='1', '1','0') AS pauta_liberada",
								'r.total_membro',
								'r.arquivo_ata',
								'(SELECT COUNT(id_presenca) FROM tb_presenca WHERE id_reuniao = r.id_reuniao AND presenca = 1) as total_presente')
							);
		
		$objReuniaoM->setTable('tb_reuniao as r');
		$objReuniaoM->setOrderBy($order);
		
		$where = "
			LEFT JOIN tb_pauta p ON p.id_pauta=r.id_pauta
			WHERE 1 ";
		
		if($session) {
			if(@$_SESSION['CPPD']['FILTRO_REUNIAO_ID_PAUTA'] != '') {
				$where .= " AND r.id_pauta IN ({$_SESSION['CPPD']['FILTRO_REUNIAO_ID_PAUTA']})";
			}
			if(@$_SESSION['CPPD']['FILTRO_REUNIAO_ID_STATUS'] != '') {
				$where .= " AND r.status_reuniao IN ({$_SESSION['CPPD']['FILTRO_REUNIAO_ID_STATUS']})";
			}
			if(@$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO'] != '' && @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO'] != '') {
				$where .= " AND YEAR(r.data_reuniao) >= '{$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO']}'";
				$where .= " AND MONTH(r.data_reuniao) >= '{$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']}'";
				if(@$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_INICIO'] != '') {
					$where .= " AND DAY(r.data_reuniao) >= '{$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_INICIO']}'";
				}
			} elseif(@$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO'] != '') {
				$where .= " AND YEAR(r.data_reuniao) >= '{$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO']}'";
			}
			if(@$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL'] != '' && @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL'] != '') {
				$where .= " AND YEAR(r.data_reuniao) <= '{$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL']}'";
				$where .= " AND MONTH(r.data_reuniao) >= '{$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']}'";
				if(@$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_FINAL'] != '') {
					$where .= " AND DAY(r.data_reuniao) <= '{$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_FINAL']}'";
				}
			} elseif(@$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL'] != '') {
				$where .= " AND YEAR(r.data_reuniao) <= '{$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL']}'";
			}
		}
		
		$objReuniaoM->setWhere($where);
		$array = $objReuniaoM->consultaAll();
		
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
		
	}
	
}
}

?>