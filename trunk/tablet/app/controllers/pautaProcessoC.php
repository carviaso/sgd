<?php

if(!class_exists("PautaProcessoC")) {
	
class PautaProcessoC {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function inserir($idPauta, $idProcesso) {

		$objPautaProcessoM = new PautaProcessoM();

		/*
		 * Verificar se o processo já não está nesta pauta
		 */
		$retorno = true;
		
		$objPautaProcessoM->setWhere("WHERE id_pauta = {$idPauta} AND id_processo = {$idProcesso}");
		$array = $objPautaProcessoM->consultaAll();
		if(count($array) == 0) {
			$obj = new PautaProcessoVO();
			$obj->id_pauta = $idPauta;
			$obj->id_processo = $idProcesso;
	
			$retorno = $objPautaProcessoM->insert($obj);
		}
		

		return $retorno;

	}
	
	public function getProcessoPauta($idPauta, $order = 'nome_relator') {

		$objPautaM = new PautaM();
		
		$objPautaM->setSelect(array(
								'DISTINCT p.id_processo',
								'p.numero',
								'mprof.nome as nome_relator',
								'preq.nome as nome_requerente',
								'd.sigla as siglaDepartamento',
								'cen.sigla as siglaCentro',
								'sp.nome as nome_status',
								"(select count(id_pauta_processo) from tb_pauta_processo where id_pauta = {$idPauta} and id_processo=p.id_processo) as total")
							);
		
		$objPautaM->setTable('tb_processo p');
		$objPautaM->setOrderBy($order);
		
		$where = "
			INNER JOIN tb_assunto_processo AS ap ON p.id_assunto_processo=ap.id_assunto_processo
			INNER JOIN professor AS preq ON p.id_professor_requerente=preq.id_professor
			INNER JOIN tb_membro AS m ON p.id_professor_relator=m.id_membro
			INNER JOIN professor AS mprof ON m.id_professor=mprof.id_professor
			INNER JOIN tb_status_processo AS sp ON p.id_status_processo=sp.id_status_processo
			LEFT JOIN departamento AS d ON preq.id_departamento = d.id_departamento
			LEFT JOIN centro AS cen ON d.id_centro = cen.id_centro
			WHERE p.id_status_processo IN (3,4,5,7,8)
			UNION
			SELECT DISTINCT p.id_processo, p.numero, mprof.nome as nome_relator, preq.nome as nome_requerente,
			d.sigla as siglaDepartamento, cen.sigla as siglaCentro, sp.nome as nome_status,
			(select count(id_pauta_processo) from tb_pauta_processo where id_pauta = {$idPauta} and id_processo=p.id_processo) as total
			FROM tb_processo p
			INNER JOin tb_pauta_processo pp ON p.id_processo=pp.id_processo
			INNER JOIN tb_pauta pa ON pp.id_pauta=pa.id_pauta
			INNER JOIN tb_assunto_processo AS ap ON p.id_assunto_processo=ap.id_assunto_processo
			INNER JOIN professor AS preq ON p.id_professor_requerente=preq.id_professor
			INNER JOIN tb_membro AS m ON p.id_professor_relator=m.id_membro
			INNER JOIN professor AS mprof ON m.id_professor=mprof.id_professor
			INNER JOIN tb_status_processo AS sp ON p.id_status_processo=sp.id_status_processo
			LEFT JOIN departamento AS d ON preq.id_departamento = d.id_departamento
			LEFT JOIN centro AS cen ON d.id_centro = cen.id_centro
			WHERE pa.id_pauta IN ({$idPauta})
			";

		$objPautaM->setWhere($where);
		$array = $objPautaM->consultaAll();
		
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}
	
}
}

?>