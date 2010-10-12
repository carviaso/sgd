{if $option eq listDepartamentos}
	<h1>Relat&oacute;rio de Chefes por Centro</h1>
	<label for="selectDepartamentos">Escolha o departamento</label>
	<select id="selectDepartamentos" class="select ui-corner-all width100">
		{foreach from=$departamentos item=departamento}
			<option value="{$departamento->idDepartamento}">{$departamento->nome}</option>
		{/foreach}
	</select>
	<br />
	<br />
	<div id="chefesDepartamentos" ></div>
{/if}
{if $option eq chefesPorDepartamento}
	<table class="aatable">
		<tr><th>Chefe</th></tr>
		{foreach from=$chefes item=chefe}
			<tr><td>{$chefe->nome}</td></tr>
			{foreachelse}
			<tr><td>Nenhum chefe cadastrado para o departamento selecionado</td></tr>
		{/foreach}
	</table>
	<br />
	<table class="aatable">
		<tr><th>Sub-chefe</th></tr>
		{foreach from=$subChefes item=subChefe}
			<tr><td>{$subChefe->nome}</td></tr>
		{foreachelse}
			<tr><td>Nenhum sub-chefe cadastrado para o departamento selecionado</td></tr>
		{/foreach}
	</table>
{/if}