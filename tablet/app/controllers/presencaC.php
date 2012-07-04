<?php

if(!class_exists("PresencaC")) {
	
class PresencaC {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function getMembrosPorReuniao($idReuniao){
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
									'i.sigla as siglaInstituicao',
									'IF(pr.presenca IS NULL, 0, pr.presenca) as presenca')
								);

								
		$objMembroM->setTable('tb_membro as m');
		$where = "
			LEFT JOIN professor AS p ON m.id_professor=p.id_professor
			LEFT JOIN tb_presenca AS pr ON m.id_membro=pr.id_membro and pr.id_reuniao = '{$idReuniao}'
			left join departamento d
			on p.id_departamento = d.id_departamento
			left join centro cen
			on d.id_centro = cen.id_centro
			left join instituicao i
			on cen.id_instituicao = i.id_instituicao
			WHERE m.ativo in (1) OR (pr.id_reuniao = '{$idReuniao}')";
		$objMembroM->setWhere($where);
		$objMembroM->isDistinct(true);
		$objMembroM->setOrderBy("p.nome");
		$array = $objMembroM->consultaAll();
	
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}

		return $array;
	}

}
}

?>