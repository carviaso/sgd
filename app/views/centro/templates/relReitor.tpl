<table class="aatable">
	<tr><th>Reitor</th><th>&nbsp;</th></tr>
	{foreach from=$reitores item=reitor}
		<tr><td id="diretorCentro">{$reitor->nome}</td><td width="20px"><div class="escolherDiretorCentro" title="Selecionar novo Diretor"></div></td></tr>
	{foreachelse}
		<tr><td id="diretorCentro">Nenhum reitor cadastrado</td><td width="20px"><div class="escolherDiretorCentro" title="Selecionar novo Diretor"></div></td></tr>
	{/foreach}
	<tr class="hidden">
		<td colspan="2">
			<div class="multiSelectProfessor"></div><br />
			<button id="definirAtualDiretor" class="right button">Definir como atual reitor</button>
		</td>
	</tr>
</table>
<br />
<table class="aatable">
	<tr><th>Vice-Reitor</th></tr>
	{foreach from=$viceReitores item=viceReitor}
		<tr><td id="viceDiretorCentro">{$viceReitor->nome}</td><td width="20px"><div class="escolherViceDiretorCentro" title="Selecionar novo Diretor"></div></td></tr>
	{foreachelse}
		<tr><td id="viceDiretorCentro">Nenhum vice-reitor cadastrado</td><td width="20px"><div class="escolherViceDiretorCentro" title="Selecionar novo Diretor"></div></td></tr>
	{/foreach}
	<tr class="hidden">
		<td colspan="2">
			<div class="multiSelectProfessor"></div><br />
			<button id="definirAtualViceDiretor" class="right button">Definir como atual vice-reito</button>
		</td>
	</tr>
</table>
<br />
<table class="aatable">
	<tr><th>Secret&aacute;rio</th></tr>
	{foreach from=$secretariasReitor item=secretariaReitor}
		<tr><td id="secretarioCentro">{$secretariaReitor->nome}</td><td width="20px"><div class="escolherSecretarioCentro" title="Selecionar novo Diretor"></div></td></tr>
	{foreachelse}
		<tr><td id="secretarioCentro">Nenhuma secret&aacute;ria cadastrada</td><td width="20px"><div class="escolherSecretarioCentro" title="Selecionar novo Diretor"></div></td></tr>
	{/foreach}
	<tr class="hidden">
		<td colspan="2">
			<div class="multiSelectProfessor"></div><br />
			<button id="definirAtualSecretario" class="right button">Definir como atual secret&aacute;ria</button>
		</td>
	</tr>
</table>