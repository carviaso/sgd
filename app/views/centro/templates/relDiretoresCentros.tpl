{if $option eq listCentros}
	<h1>Relat&oacute;rio de Diretores por Centro</h1>
	<label for="selectCentros">Escolha o centro</label>
	<select id="selectCentros" class="select ui-corner-all width100">
		{foreach from=$centros item=centro}
			<option value="{$centro->idCentro}">{$centro->nome}</option>
		{/foreach}
	</select>
	<br />
	<br />
	<div id="departamentosPorCentro" ></div>
{/if}
{if $option eq diretoresPorCentro}
	<table class="aatable">
		<tr><th>Diretor</th></tr>
		{foreach from=$diretores item=diretor}
			<tr><td>{$diretor->nome}</td></tr>
			{foreachelse}
			<tr><td>Nenhum diretor cadastrado para o centro selecionado</td></tr>
		{/foreach}
	</table>
	<br />
	<table class="aatable">
		<tr><th>Vice-Diretor</th></tr>
		{foreach from=$viceDiretores item=viceDiretor}
			<tr><td>{$viceDiretor->nome}</td></tr>
		{foreachelse}
			<tr><td>Nenhum vice-diretor cadastrado para o centro selecionado</td></tr>
		{/foreach}
	</table>
	<br />
	<table class="aatable">
		<tr><th>Secret&aacute;rio</th></tr>
		{foreach from=$secretariodocentros item=secretariodocentro}
			<tr><td>{$secretariodocentro->nome}</td></tr>
		{foreachelse}
			<tr><td>Nenhum secret&aacute;rio cadastrado para o centro selecionado</td></tr>
		{/foreach}
	</table>
{/if}