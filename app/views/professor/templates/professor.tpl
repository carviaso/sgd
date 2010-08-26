<h1>Cadastro de Professor</h1>
<table class="aatable">
	<tr>
		<th colspan="2">Cadastro de novo professor</th>
	</tr>
	<tr>
		<td>Nome</td>
		<td><input type="text" id="nome" name="nome" value="" maxlength="100" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Sobrenome</td>
		<td><input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data de nascimento</td>
		<td><input type="text" id="dataNascimento" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Matr&iacute;cula</td>
		<td><input type="text" id="matricula" name="Matricula" maxlength="255" value="" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Siape</td>
		<td><input type="text" id="siape" name="Siape" maxlength="255" value="" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o</td>
		<td><input type="text" id="dataAdmissao" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o na Ufsc</td>
		<td><input type="text" id="dataAdmissaoUfsc" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Aposentado</td>
		<td>
			<div id="radio">
				<label for="aposentadoSim">Sim</label>
				<input type="radio" id="aposentadoSim" name="aposentado" value="1" />
				<label for="aposentadoNao">N&atilde;o</label>
				<input type="radio" id="aposentadoNao" name="aposentado" value="0" />
			</div>
		</td>
	</tr>
	<tr>
		<td>Data prevista da aposentadoria</td>
		<td><input type="text" id="dataPrevistaAposentadoria" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data efetiva da aposentadoria</td>
		<td><input type="text" id="dataEfetivaAposentadoria" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Departamento</td>
		<td><select id="departamento" class="width100">
			{foreach from=$departamentos item=departamento}
				<option value="{$departamento->idDepartamento}">{$departamento->nome}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Inicial</td>
		<td><select id="categoriaFuncionalInicial" class="width100">
			{foreach from=$categoriasFuncionais item=categoriaFuncional}
				<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Atual</td>
		<td><select id="categoriaFuncionalAtual" class="width100">
			{foreach from=$categoriasFuncionais item=categoriaFuncional}
				<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Tipo de Titula&ccedil;&atilde;o</td>
		<td><select id="titulacao" class="width100">
			{foreach from=$titulacoes item=titulacao}
				<option value="{$titulacao->idTipoTitulacao}">{$titulacao->descricao}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Refer&ecirc;ncia</td>
		<td><select id="categoriaFuncionalReferencia" class="width100">
			{foreach from=$categoriasFuncionais item=categoriaFuncional}
				<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Cargo</td>
		<td><select id="cargo" class="width100">
			{foreach from=$cargos item=cargo}
				<option value="{$cargo->idCargo}">{$cargo->descricaoCargo}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>Situacao</td>
		<td><select id="situacao" class="width100">
			{foreach from=$situacoes item=situacao}
				<option value="{$situacao->idSituacao}">{$situacao->descricaoSituacao}</option>
			{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><button id="cadastrarProfessor">Cadastrar</button></td>
	</tr>
</table>