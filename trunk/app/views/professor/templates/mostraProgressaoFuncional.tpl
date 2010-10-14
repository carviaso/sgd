<div>
	{foreach from=$progressaoFuncional item=progressao}
		<div class="viewProgressaoFuncionalItem">
			<table class="aatable">
				<tr>
					<th colspan="2">Categoria Funcional &mdash; {$progressao->categoriaFuncional}</th>
				</tr>
				<tr>
					<td class="width25">Processo</td>
					<td>{$progressao->processo}</td>
				</tr>
				<tr>
					<td>Data da Aprecia&ccedil;&atilde;o do processo</td>
					<td>{$progressao->dataAvaliacao}</td>
				</tr>
				<tr>
					<td>Nota Avalia&ccedil;&atilde;o</td>
					<td>{$progressao->notaAvaliacao}</td>
				</tr>
				<tr>
					<td>A partir de</td>
					<td>{$progressao->aPartirDe}</td>
				</tr>
				<tr>
					<td>Portaria</td>
					<td>{$progressao->portaria}</td>
				</tr>
				<tr>
					<td>T&iacute;tulo Avalia&ccedil;&atilde;o</td>
					<td>{$progressao->tituloAvaliacao}</td>
				</tr>
				<tr>
					<td>Observa&ccedil;&atilde;o</td>
					<td>{$progressao->observacao}</td>
				</tr>
			</table>
		</div>
	{foreachelse}
		<div class="viewProgressaoFuncionalItem">
			<table class="aatable">
				<tr>
					<td class="center">Nenhuma progressao Funcional cadastrada para o professor selecionado.</td>
				</tr>
			</table>
		</div>
	{/foreach}
</div>