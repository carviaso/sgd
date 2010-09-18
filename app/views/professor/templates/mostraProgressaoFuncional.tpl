<div id="viewProgressaoFuncional">
	{foreach from=$progressaoFuncional item=progressao}
		<div class="viewProgressaoFuncionalItem">
			<div>Categoria Funcional</div>
			<div>{$progressao->categoriaFuncional}</div>
			<div>Processo</div>
			<div>{$progressao->processo}</div>
			<div>Data Avalia&ccedil;&atilde;o</div>
			<div>{$progressao->dataAvaliacao}</div>
			<div>Nota Avalia&ccedil;&atilde;o</div>
			<div>{$progressao->notaAvaliacao}</div>
			<div>Data In&iacute;cio</div>
			<div>{$progressao->dataInicio}</div>
			<div>Portaria</div>
			<div>{$progressao->portaria}</div>
			<div>Observacao</div>
			<div>{$progressao->observacao}</div>
		</div>
	{foreachelse}
		<div>
			<h4>Nenhuma progressao Funcional cadastrada para o professor selecionado.</h4>
		</div>
	{/foreach}
</div>