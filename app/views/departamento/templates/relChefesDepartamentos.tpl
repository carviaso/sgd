{if $option eq listDepartamentos}
	<h1>Relat&oacute;rio de Chefes por Departamento</h1>
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
			<tr><td id="chefeDepartamento">{$chefe->nome}</td><td width="20px"><div class="escolherChefeDepartamento" title="Selecionar novo Diretor"></div></td></tr>
			{foreachelse}
			<tr><td id="chefeDepartamento">Nenhum chefe cadastrado para o departamento selecionado</td><td width="20px"><div class="escolherChefeDepartamento" title="Selecionar novo Chefe do Departamento"></div></td></tr>
		{/foreach}
		<tr class="hidden">
			<td colspan="2">
				<div class="multiSelectProfessor"></div><br />
				<button id="definirAtualChefeDepartamento" class="right button">Definir como atual chefe de departamento</button>
			</td>
		</tr>
	</table>
	<br />
	<table class="aatable">
		<tr><th>Sub-chefe</th></tr>
		{foreach from=$subChefes item=subChefe}
			<tr><td id="subChefeDepartamento">{$subChefe->nome}</td><td width="20px"><div class="escolherSubChefeDepartamento" title="Selecionar novo Diretor"></div></td></tr>
		{foreachelse}
			<tr><td id="subChefeDepartamento">Nenhum sub-chefe cadastrado para o departamento selecionado</td><td width="20px"><div class="escolherSubChefeDepartamento" title="Selecionar novo Diretor"></div></td></tr>
		{/foreach}
		<tr class="hidden">
			<td colspan="2">
				<div class="multiSelectProfessor"></div><br />
				<button id="definirAtualSubChefeDepartamento" class="right button">Definir como atual sub-chefe de departamento</button>
			</td>
		</tr>
	</table>
	<br />
	<table class="aatable">
		<tr><th>Chefe de Expediente</th></tr>
		{foreach from=$chefeDeExpedientes item=chefeDeExpediente}
			<tr><td id="chefeExpediente">{$chefeDeExpediente->nome}</td><td width="20px"><div class="escolherChefeExpediente" title="Selecionar novo Diretor"></div></td></tr>
		{foreachelse}
			<tr><td id="chefeExpediente">Nenhum sub-chefe cadastrado para o departamento selecionado</td><td width="20px"><div class="escolherChefeExpediente" title="Selecionar novo Diretor"></div></td></tr>
		{/foreach}
		<tr class="hidden">
			<td colspan="2">
				<div class="multiSelectProfessor"></div><br />
				<button id="definirAtualChefeExpediente" class="right button">Definir como atual chefe de expediente</button>
			</td>
		</tr>
	</table>
{/if}