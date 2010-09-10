{if $option eq listCentros}
	<h1>Relat&oacute;rio de Departamentos por Centro</h1>
	<label for="selectCentros">Escolha o centro</label>
	<select id="selectCentros">
		{foreach from=$centros item=centro}
		    <option value="{$centro->idCentro}">{$centro->nome}</option>
		{/foreach}
	</select>
	<br />
	<br />
	<div id="departamentosPorCentro" ></div>
{/if}
{if $option eq diretoresPorCentro}
	{foreach from=$diretores item=diretor}
	    <div>{$diretor->nome}</div>
	{/foreach}
	<br />
{/if}