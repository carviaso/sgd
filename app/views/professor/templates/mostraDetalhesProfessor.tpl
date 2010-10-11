<div id="viewDetalhesProfessor">
	<fieldset><legend>Dados do Professor</legend>
		<div>
			Nome
		</div>
		<div>
			{$professor->nome}
		</div>
		<div>
			Matr&iacute;cula
		</div>
		<div>
			{$professor->matricula}
		</div>
		<div>
			SIAPE
		</div>
		<div>
			{$professor->siape}
		</div>
		<div>
			Data Nascimento
		</div>
		<div>
			{$professor->dataNascimento}
		</div>
	</fieldset>
	<fieldset><legend>Datas</legend>
		<div>
			Data Admiss&atilde;o
		</div>
		<div>
			{$professor->dataAdmissao}
		</div>
		<div>
			Data Admiss&atilde;o UFSC
		</div>
		<div>
			{$professor->dataAdmissaoUfsc}
		</div>
		<div>
			Data Prevista Aposentadoria
		</div>
		<div>
			{$professor->dataPrevistaAposentadoria}
		</div>
		<div>
			Data Efetiva Aposentadoria
		</div>
		<div>
			{$professor->dataEfetivaAposentadoria}
		</div>
	</fieldset>
	<fieldset><legend>Dados da Lota&ccedil;&atilde;o</legend>
		<div>
			Departamento
		</div>
		<div>
			{$professor->nomeDepartamento} - ({$professor->siglaDepartamento})
		</div>
		<div>
			Centro
		</div>
		<div>
			{$professor->nomeCentro} - ({$professor->siglaCentro})
		</div>
		<div>
			Institui&ccedil;&atilde;o
		</div>
		<div>
			{$professor->nomeInstituicao} - ({$professor->siglaInstituicao})
		</div>
	</fieldset>
	<fieldset><legend>Dados da Categoria</legend>	
		<div>
			Categoria Funcional Inicial
		</div>
		<div>
			{$professor->descCategoriaFuncionalInicial}
		</div>
		<div>
			Categoria Funcional Atual
		</div>
		<div>
			{$professor->descCategoriaFuncionalAtual}
		</div>
		<div>
			Tipo Titula&ccedil;&atilde;o
		</div>
		<div>
			{$professor->descTipoTitulacao}
		</div>
		<div>
			Categoria Funcional Refer&ecirc;ncia
		</div>
		<div>
			{$professor->descCategoriaFuncionalReferencia}
		</div>
		<div>
			Cargo
		</div>
		<div>
			{$professor->descricaoCargo}
		</div>
		<div>
			Situa&ccedil;&atilde;o Atual
		</div>
		<div>
			{$professor->descricaoSituacaoAtual}
		</div>
	</fieldset>
</div>