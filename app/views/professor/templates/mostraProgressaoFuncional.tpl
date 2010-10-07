<div id="viewProgressaoFuncional">
	{foreach from=$progressaoFuncional item=progressao}
		<div class="viewProgressaoFuncionalItem">
			<div>Categoria Funcional</div>
			<div>{$progressao->categoriaFuncional}</div>
			<div>Processo</div>
			<div>{$progressao->processo}</div>
			<div>Data da Aprecia&ccedil;&atilde;o</div>
			<div>{$progressao->dataAvaliacao}</div>
			<div>Nota Avalia&ccedil;&atilde;o</div>
			<div>{$progressao->notaAvaliacao}</div>
			<div>A partir de:</div>
			<div>{$progressao->aPartirDe}</div>
			<div>Portaria</div>
			<div>{$progressao->portaria}</div>
			<div>Observacao</div>
			<div>{$progressao->observacao}</div>
			<!-- 
			<table>
				<tr>
					<td>Categoria Funcional</td>
					<td>{$progressao->categoriaFuncional}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Processo</td>
					<td>{$progressao->processo}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Data da Aprecia&ccedil;&atilde;o do processo</td>
					<td>{$progressao->dataAvaliacao}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td>{$progressao->categoriaFuncional}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td>{$progressao->categoriaFuncional}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td>{$progressao->categoriaFuncional}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td>{$progressao->categoriaFuncional}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			 -->
		</div>
	{foreachelse}
		<div>
			<h4>Nenhuma progressao Funcional cadastrada para o professor selecionado.</h4>
		</div>
	{/foreach}
</div>