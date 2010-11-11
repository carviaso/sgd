{if $option eq relatorioGeral}
	<h1>Relat&oacute;rio Geral do Professor</h1>
	<div>Digite o nome do professor</div>
	<input type="text" id="professor" name="professor" value="" maxlength="100" class="input ui-corner-all width100" />
	<input type="hidden" id="idProfessor" name="idProfessor" />
	<div id="detalheGeralProfessor"></div>
{/if}
{if $option eq detalheGeralProfessor}
	<p></p>
	<h4>Departamento</h4>
	{foreach from=$departamento item=dep}
		<table class="aatable">
			<tr>
				<th>Nome</th>
				<th>Telefone</th>
			</tr>
			<tr>
				<td>{$dep->nome} / {$dep->departamentoSigla} / {$dep->centroSigla}</td>
				<td>{$dep->fone}</td>
			</tr>
		</table>
	{/foreach}
	<p></p>
	<h4>Altera&ccedil;&atilde;o de Regime de Trabalho do Professor</h4>
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
		{foreachelse}
			<tr><td colspan="4">Nenhum Regime de trabalho encontrado.</td></tr>
		{/foreach}
	</table>
	<p></p>
	<h4>Processos</h4>
	<table class="aatable">
		<tr>
			<th>N&uacute;mero</th>
			<th>Descri&ccedil;&atilde;o</th>
		</tr>
		{foreach from=$processosProfessor item=processo}
		<tr>
			<td>{$processo->processo}</td>
			<td>{$processo->descricao}</td>
		</tr>
		{foreachelse}
			<tr><td colspan="4">Nenhum processo encontrado.</td></tr>
		{/foreach}
	</table>
	<p></p>
	<h4>Portarias</h4>
	<table class="aatable">
		<tr>
			<th>N&uacute;mero</th>
			<th>Descri&ccedil;&atilde;o</th>
		</tr>
		{foreach from=$portariasProfessor item=portaria}
		<tr>
			<td>{$portaria->portaria}</td>
			<td>{$portaria->descricao}</td>
		</tr>
		{foreachelse}
			<tr><td colspan="4">Nenhum portaria encontrada.</td></tr>
		{/foreach}
	</table>
{/if}