{if $option eq listCentros}
	<h1>Relat&oacute;rio de Departamento por Centro</h1>
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
{if $option eq departamentosPorCentro}
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Sigla</th>
		</tr>
		{foreach from=$departamentos item=departamento}
			<tr>
		    	<td>{$departamento->nome}</td>
		    	<td>{$departamento->sigla}</td>
		    </tr>	    
		{foreachelse}
			<tr>
		    	<td colspan="2">Nenhum departamento cadastrado para o centro selecionado</td>
		    </tr>
		{/foreach}
	</table>	
{/if}