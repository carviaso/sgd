{if $option eq departamentoProfessor}
	<h1>Relat&oacute;rio Geral do Professor</h1>
	<div>Digite o nome do professor</div>
	<input type="text" id="professor" name="professor" value="" maxlength="100" class="input ui-corner-all width100" />
	<input type="hidden" id="idProfessor" name="idProfessor" />
	<div id="detalheGeralProfessor"></div>
{/if}
{if $option eq detalheGeralProfessor}
	<p></p>
	{foreach from=$departamento item=dep}
		<table class="aatable">
			<tr>
				<th>Departamento</th>
				<th>Telefone</th>
			</tr>
			<tr>
				<td>{$dep->nome} / {$dep->departamentoSigla} / {$dep->centroSigla}</td>
				<td>{$dep->fone}</td>
			</tr>
		</table>
	{/foreach}
	<p></p>
	<h1>Regimes de Trabalho do Professor</h1>
	<table class="aatable">
		<tr>
			<th>Processo</th>
			<th>Delibera&ccedil;&atilde;o</th>
			<th>Portaria</th>
			<th nowrap="nowrap">Data de In&iacute;cio</th>
		</tr>
		{foreach from=$regimesTrabalho item=regimeTrabalhoProfessor}
		<tr>
			<td>{$regimeTrabalhoProfessor->processo}</td>
			<td>{$regimeTrabalhoProfessor->deliberacao}</td>
			<td>{$regimeTrabalhoProfessor->portaria}</td>
			<td>{$regimeTrabalhoProfessor->dataInicio}</td>
		</tr>
		{/foreach}
	</table>
{/if}