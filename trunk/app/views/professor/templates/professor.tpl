<h1>Cadastro de Professor</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sobrenome</div>
<input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Data de nascimento</div>
<input type="text" id="dataNascimento" class="ui-state-default ui-corner-all width100" />
<div>Matr&iacute;cula</div>
<input type="text" id="matricula" name="Matricula" maxlength="255" value="" class="ui-state-default ui-corner-all width100" />
<div>Siape</div>
<input type="text" id="siape" name="Siape" maxlength="255" value="" class="ui-state-default ui-corner-all width100" />
<div>Data da admiss&atilde;o</div>
<input type="text" id="dataAdmissao" class="ui-state-default ui-corner-all width100" />
<div>Data da admiss&atilde;o na Ufsc</div>
<input type="text" id="dataAdmissaoUfsc" class="ui-state-default ui-corner-all width100" />
<div>Aposentado</div>
<div id="radio">
	<label for="aposentadoSim">Sim</label>
	<input type="radio" id="aposentadoSim" name="aposentado" value="1" />
	<label for="aposentadoNao">N&atilde;o</label>
	<input type="radio" id="aposentadoNao" name="aposentado" value="0" />
</div>
<div>Data prevista da aposentadoria</div>
<input type="text" id="dataPrevistaAposentadoria" class="ui-state-default ui-corner-all width100" />
<div>Data efetiva da aposentadoria</div>
<input type="text" id="dataEfetivaAposentadoria" class="ui-state-default ui-corner-all width100" />
<div>Departamento</div>
<select id="departamento" class="width100">
	{foreach from=$departamentos item=departamento}
		<option value="{$departamento->idDepartamento}">{$departamento->nome}</option>
	{/foreach}
</select>
<div>Categoria Funcional Inicial<div>
<select id="categoriaFuncionalInicial" class="width100">
	{foreach from=$categoriasFuncionais item=categoriaFuncional}
		<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
	{/foreach}
</select>
<div>Categoria Funcional Atual<div>
<select id="categoriaFuncionalAtual" class="width100">
	{foreach from=$categoriasFuncionais item=categoriaFuncional}
		<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
	{/foreach}
</select>
<div>Tipo de Titula&ccedil;&atilde;o<div>
<select id="titulacao" class="width100">
	{foreach from=$tipoTitulacoes item=tipoTitulacao}
		<option value="{$tipoTitulacao->idTipoTitulacao}">{$tipoTitulacao->descricao}</option>
	{/foreach}
</select>
<div>Categoria Funcional Refer&ecirc;ncia<div>
<select id="categoriaFuncionalReferencia" class="width100">
	{foreach from=$categoriasFuncionais item=categoriaFuncional}
		<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
	{/foreach}
</select>
<div>Cargo<div>
<select id="cargo" class="width100">
	{foreach from=$cargos item=cargo}
		<option value="{$cargo->idCargo}">{$cargo->descricaoCargo}</option>
	{/foreach}
</select>
<div>Situacao<div>
<select id="situacao" class="width100">
	{foreach from=$situacoes item=situacao}
		<option value="{$situacao->idSituacao}">{$situacao->descricaoSituacao}</option>
	{/foreach}
</select>
<div>&nbsp;<div>
<div><button id="cadastrarProfessor" class="right">Cadastrar</button><div>