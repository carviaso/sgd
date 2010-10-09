<h1>Cadastro de Afastamento de Professor</h1>
<div class="multiSelectProfessor"></div>
<div>Institui&ccedil;&atilde;o</div>
<select id="idInstituicao" class="select ui-corner-all width100">
{foreach from=$instituicoes item=instituicao}
	<option value="{$instituicao->idInstituicao}">{$instituicao->nome}</option>
{/foreach}
</select>
<div>Tipo de Afastamento</div>
<select id="idTipoAfastamento" class="select ui-corner-all width100">
{foreach from=$tiposAfastamento item=tipoAfastamento}
	<option value="{$tipoAfastamento->idTipoAfastamento}">{$tipoAfastamento->descricao}</option>
{/foreach}
</select>
<div>Tipo de Titula&ccedil;&atilde;o<div>
<select id="idTipoTitulacao" class="select ui-corner-all width100">
	{foreach from=$tiposTitulacao item=tipoTitulacao}
		<option value="{$tipoTitulacao->idTipoTitulacao}">{$tipoTitulacao->descricao}</option>
	{/foreach}
</select>
<div>Data de in&iacute;cio</div>
<input type="text" id="dataInicio" class="input ui-corner-all width100" />
<div>Data de previs&atilde;o de t&eacute;rmino</div>
<input type="text" id="dataPrevisaoTermino" class="input ui-corner-all width100" />
<div class="mesesDuracao">Meses de duracao</div>
<div>Processo</div>
<input type="text" id="processo" value="" maxlength="45" class="input ui-corner-all width100" />
<div>Prorroga&ccedil;&atilde;o</div>
<div id="radio">
	<label for="prorrogacaoSim">Sim</label>
	<input type="radio" id="prorrogacaoSim" name="prorrogacao" value="1" />
	<label for="prorrogacaoNao">N&atilde;o</label>
	<input type="radio" id="prorrogacaoNao" name="prorrogacao" value="0" />
</div>
<div>Observa&ccedil;&atilde;o</div>
<textarea id="observacao" rows="6" class="input ui-corner-all width100"></textarea>
<div>&nbsp;<div>
<div><button id="cadastrarAfastamentoProfessor" class="right button">Cadastrar</button><div>