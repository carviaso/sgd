{if $option eq exibeFormulario}
	<h1>Relat&oacute;rio de afastamento/aposentadoria</h1>
	<div class="width100 left">Data de In&iacute;cio</div>
	<input type="text" id="dataInicial" class="input ui-corner-all width100" />
	<div class="width100 left">Data Previs&atilde;o T&eacute;rmino Afastamento</div>
	<input type="text" id="dataFinal" class="input ui-corner-all width100" />
	<h2>Tipos de afastamento</h2>
	<input type="checkbox" id="aposentado" name="aposentado" value="2" />
	<label for="aposentado">Previs&atilde;o de aposentadoria</label>
	<div>&nbsp;</div>
	{assign var='i' value=1}
	{foreach from=$tiposAfastamentos item=tiposAfastamento}
		{assign var='i' value=$i+1}
		<input type="checkbox" id="{$i}" name="tiposAfastamento" value="{$tiposAfastamento->idTipoAfastamento}" checked="checked" />
		<label for="{$i}">{$tiposAfastamento->descricao}</label>
		<br />
	{/foreach}
	<div><button id="pesquisar" class="right button">Pesquisar</button><div>
	<div style="clear: both;"></div>
	<div id="relacaoProfessores">&nbsp;</div>
{/if}
{if $option eq exibeResultadoAposentado}
	<h4>Professores</h4>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Data de previs&atilde;o de aposentadoria</th>
		</tr>
		{foreach from=$professores item=professor}
		<tr>
			<td>{$professor->nome}</td>
			<td>{$professor->dataPrevisaoAposentadoria}</td>
		</tr>
		{foreachelse}
			<tr><td colspan="4">Nenhum professor encontrado.</td></tr>
		{/foreach}
	</table>
{/if}
{if $option eq exibeResultado}
	<h4>Professores</h4>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Data de In&iacute;cio</th>
			<th>Data de previs&atilde;o de t&eacute;rmino</th>
			<th nowrap="nowrap">Tipo de afastamento</th>
		</tr>
		{foreach from=$professores item=professor}
		<tr>
			<td>{$professor->nome}</td>
			<td>{$professor->dataInicio}</td>
			<td>{$professor->dataPrevisaoTermino}</td>
			<td>{$professor->descricao}</td>
		</tr>
		{foreachelse}
			<tr><td colspan="4">Nenhum professor encontrado.</td></tr>
		{/foreach}
	</table>
{/if}