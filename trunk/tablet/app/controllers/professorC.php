<?php

if(!class_exists("ProfessorC")) {
	
class ProfessorC {
	
	function __construct() {}
	
	function __destruct() {}
	
	public function getProfessores($nome, $limit = '100') {
		
		$objProfessorM = new ProfessorM();
		
		$arraySelect = array(
					'p.id_professor',
					'p.nome',
					'p.matricula',
					'p.siape',
					'm.id_membro',
					'IF(m.ativo is null,0,m.ativo) AS ativo',
					'm.email',
					'd.nome as nomeDepartamento',
					'd.sigla as siglaDepartamento',
					'cen.sigla as siglaCentro',
					'i.sigla as siglaInstituicao'
		);
		
		$objProfessorM->setSelect($arraySelect);
		
		$nome = addslashes($nome);
		$condicao = "
			left join departamento d
			on p.id_departamento = d.id_departamento
			left join centro cen
			on d.id_centro = cen.id_centro
			left join instituicao i
			on cen.id_instituicao = i.id_instituicao
			left join tb_membro m on p.id_professor=m.id_professor
			WHERE LOWER(p.nome) LIKE LOWER('%{$nome}%') ";
		$objProfessorM->setTable('professor p');
		$objProfessorM->setWhere($condicao);
		$objProfessorM->setLimit("LIMIT 0,{$limit}");
		$objProfessorM->setOrderBy('p.nome asc');
		$array = $objProfessorM->consultaAll();
		
		foreach ($array as &$ar) {
			$ar = array_map("utf8_encode", $ar);
		}
		
		return $array;
	}

	public function getDadosProfessor($id) {
		
		$objProfessorM = new ProfessorM();
		
		$arraySelect = array(
					'p.id_professor',
					'p.nome',
					'p.matricula',
					'p.siape',
					"DATE_FORMAT(p.data_admissao,  '%d/%m/%Y' ) as data_admissao",
					"DATE_FORMAT(p.data_admissao_ufsc,  '%d/%m/%Y' ) as data_admissao_ufsc",
					"DATE_FORMAT(p.data_nascimento,  '%d/%m/%Y' ) as data_nascimento",
					"DATE_FORMAT(p.data_previsao_aposentadoria,  '%d/%m/%Y' ) as data_previsao_aposentadoria",
					"DATE_FORMAT(p.data_aposentadoria,  '%d/%m/%Y' ) as data_aposentadoria",
					'p.id_departamento',
					'p.id_categoria_funcional_inicial',
					'p.id_categoria_funcional_atual',
					'p.id_tipo_titulacao',
					'p.id_categoria_funcional_referencia',
					'p.id_cargo',
					'p.id_regime_trabalho',
					'p.id_situacao',
					'm.id_membro',
					'IF(m.ativo is null,0,m.ativo) AS ativo',
					'm.email',

					'd.id_centro',
					'd.nome as nomeDepartamento',
					'd.sigla as siglaDepartamento',

					'cen.nome as nomeCentro',
					'cen.sigla as siglaCentro',

					'i.id_instituicao',
					'i.id_municipio',
					'i.nome as nomeInstituicao',
					'i.sigla as siglaInstituicao',

					'cfi.id_categoria_funcional as idCategoriaFuncionalInicial',
					'cfi.descricao as descCategoriaFuncionalInicial',

					'cfa.id_categoria_funcional as idCategoriaFuncionalAtual',
					'cfa.descricao as descCategoriaFuncionalAtual',

					'cfr.id_categoria_funcional as idCategoriaFuncionalReferencia',
					'cfr.descricao as descCategoriaFuncionalReferencia',

					'tt.id_tipo_titulacao as idTipoTitulacao',
					'tt.descricao as descTipoTitulacao',

					'c.id_cargo as idCargo',
					'c.descricao_cargo as descricaoCargo',

					'rt.descricao as descricao_regime_trabalho',
					'rt.quantidade_horas as quantidade_horasRegime_trabalho',
					'rt.dedicacao_exclusiva as dedicacao_exclusiva',

					's.id_situacao as idSituacao',
					's.descricao_situacao as descricaoSituacao',

					'sa.descricao as descricaoSituacaoAtual'
				
		);
		
		$objProfessorM->setSelect($arraySelect);
		
		$objProfessorM->setTable('professor p');
		$where = "
			left join departamento d
			on p.id_departamento = d.id_departamento
			left join centro cen
			on d.id_centro = cen.id_centro
			left join instituicao i
			on cen.id_instituicao = i.id_instituicao
			left join categoria_funcional cfi
			on p.id_categoria_funcional_inicial = cfi.id_categoria_funcional
			left join categoria_funcional cfa
			on p.id_categoria_funcional_atual = cfa.id_categoria_funcional
			left join categoria_funcional cfr
			on p.id_categoria_funcional_referencia = cfr.id_categoria_funcional
			left join tipo_titulacao tt
			on p.id_tipo_titulacao = tt.id_tipo_titulacao
			left join cargo c
			on p.id_cargo = c.id_cargo
			left join regime_trabalho rt
			on p.id_regime_trabalho = rt.id_regime_trabalho
			left join situacao s
			on p.id_situacao = s.id_situacao
			left join status_atual_professor sa
			on p.id_status_atual_professor = sa.id_status
			left join tb_membro m on p.id_professor=m.id_professor
			WHERE p.id_professor = '{$id}'
		";
		$objProfessorM->setWhere($where);
		
		$array = $objProfessorM->consulta();
		/*
		 * Converte tudo para utf8
		 */
		$array = array_map("utf8_encode", $array);
		
		return $array;
		
	}
	
}
}

?>