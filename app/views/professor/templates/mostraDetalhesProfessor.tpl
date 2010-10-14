<div>
	<div class="campoDetalheProfessor">
		<table class="aatable">
			<tr><th colspan="2">Dados do professor</th></tr>
			<tr>
				<td>Nome</td>
				<td>{$professor->nome}</td>
				<td rowspan="4" width="10px">
					<img width="60px" height="83" src="{$fotoProfessor}" alt="fotoProfessor" class="fotoProfessor" />
				</td>
				<td rowspan="4" width="10px">
					<img width="60px" height="83" src="{$fichaProfessor}" alt="fichaProfessor" class="fichaProfessor" />
				</td>
			</tr>
			<tr>
				<td>Matr&iacute;cula</td>
				<td>{$professor->matricula}</td>
			</tr>
			<tr>
				<td>SIAPE</td>
				<td>{$professor->siape}</td>
			</tr>
			<tr>
				<td>Data Nascimento</td>
				<td>{$professor->dataNascimento}</td>
			</tr>
		</table>
	</div>
	<div class="campoDetalheProfessor">
		<table class="aatable">
			<tr><th colspan="2">Datas</th></tr>
			<tr>
				<td>Data Admiss&atilde;o</td>
				<td>{$professor->dataAdmissao}</td>
			</tr>
			<tr>
				<td>Data Admiss&atilde;o UFSC</td>
				<td>{$professor->dataAdmissaoUfsc}</td>
			</tr>
			<tr>
				<td>Data Prevista Aposentadoria</td>
				<td>{$professor->dataPrevistaAposentadoria}</td>
			</tr>
			<tr>
				<td>Data Efetiva Aposentadoria</td>
				<td>{$professor->dataEfetivaAposentadoria}</td>
			</tr>
		</table>
	</div>
	<div class="campoDetalheProfessor">
		<table class="aatable">
			<tr><th colspan="2">Dados da Lota&ccedil;&atilde;o</th></tr>
			<tr>
				<td>Departamento</td>
				<td>{$professor->nomeDepartamento} - ({$professor->siglaDepartamento})</td>
			</tr>
			<tr>
				<td>Centro</td>
				<td>{$professor->nomeCentro} - ({$professor->siglaCentro})</td>
			</tr>
			<tr>
				<td>Institui&ccedil;&atilde;o</td>
				<td>{$professor->nomeInstituicao} - ({$professor->siglaInstituicao})</td>
			</tr>
		</table>
	</div>
	<div class="campoDetalheProfessor">
		<table class="aatable">
			<tr><th colspan="2">Dados da Categoria</th></tr>
			<tr>
				<td>Categoria Funcional Inicial</td>
				<td>{$professor->descCategoriaFuncionalInicial}</td>
			</tr>
			<tr>
				<td>Categoria Funcional Atual</td>
				<td>{$professor->descCategoriaFuncionalAtual}</td>
			</tr>
			<tr>
				<td>Tipo Titula&ccedil;&atilde;o</td>
				<td>{$professor->descTipoTitulacao}</td>
			</tr>
			<tr>
				<td>Categoria Funcional Refer&ecirc;ncia</td>
				<td>{$professor->descCategoriaFuncionalReferencia}</td>
			</tr>
			<tr>
				<td>Cargo</td>
				<td>{$professor->descricaoCargo}</td>
			</tr>
			<tr>
				<td>Situa&ccedil;&atilde;o Atual</td>
				<td>{$professor->descricaoSituacaoAtual}</td>
			</tr>
		</table>
	</div>
</div>