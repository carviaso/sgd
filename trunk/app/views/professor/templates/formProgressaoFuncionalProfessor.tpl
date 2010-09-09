<h1>Cadastro de Progressao Funcional de Professor</h1>
<div>Professor</div>
<select id="idProfessor" class="width100">
	{foreach from=$professores item=professor}
		<option value="{$professor->id_professor}">{$professor->nome}</option>
	{/foreach}
</select>
<div>Categoria Funcional<div>
<select id="idCategoriaFuncional" class="width100">
	{foreach from=$categoriasFuncionais item=categoriaFuncional}
		<option value="{$categoriaFuncional->idCategoriaFuncional}">{$categoriaFuncional->descricao}</option>
	{/foreach}
</select>
<div>Processo</div>
<input type="text" id="processo" value="" maxlength="45" class="ui-state-default ui-corner-all width100" />
<div>Data de Avalia&ccedil;&atilde;o</div>
<input type="text" id="dataAvaliacao" class="ui-state-default ui-corner-all width100" />
<div>Nota da Avalia&ccedil;&atilde;o</div>
<input type="text" id="notaAvaliacao" class="ui-state-default ui-corner-all width100" />
<div>Data de in&iacute;cio</div>
<input type="text" id="dataInicio" class="ui-state-default ui-corner-all width100" />
<div>Portaria</div>
<input type="text" id="portaria" name="portaria" value="" maxlength="45" class="ui-state-default ui-corner-all width100" />
<div>&nbsp;<div>
<div><button id="cadastrarProgressaoFuncionalProfessor" class="right">Cadastrar</button>