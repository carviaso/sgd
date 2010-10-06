<div>
	<div id="imprimirFichaCabecalho">
		<div>SERVI&Ccedil;O P&Uacute;BLICO FEDERAL</div>
		<div>UNIVERSIDADE FEDERAL DE SANTA CATARINA</div>
		<div>PR&Oacute;-REITORIA DE DESENVOLVIMENTO HUMANO E SOCIAL</div>
		<div>DEPARTAMENTO DE DESENVOLVIMENTO E ADMINISTRA&Ccedil;&atilde;O DE PESSOAL</div>
	</div>
	<div id="imprimirFichaSubtitulo">INFORMA&Ccedil;&Otilde;ES CADASTRAIS</div>
	<div id="imprimirFichaDados">
		<div class="imprimirFichaLabel">Nome:</div>
		<div class="imprimirFichaColumn">{$professor->nome}</div>
		<div class="imprimirFichaLabel">Matr&iacute;cula UFSC:</div>
		<div class="imprimirFichaColumn">{$professor->matricula}</div>
		<div class="imprimirFichaLabel">Cargo/Regime:</div>
		<div class="imprimirFichaColumn">{$professor->descricaoCargo}</div>
		<div class="imprimirFichaLabel">Grupo/Classe/Padr&atilde;o:</div>
		<div class="imprimirFichaColumn">{$professor->descCategoriaFuncionalAtual}</div>
		<div class="imprimirFichaLabel">Admiss&atilde;o na UFSC:</div>
		<div class="imprimirFichaColumn">{$professor->dataAdmissaoUfsc}</div>
		<div class="imprimirFichaLabel">Lota&ccedil;&atilde;o:</div>
		<div class="imprimirFichaColumn">{$professor->nomeDepartamento}</div>
		<div class="imprimirFichaLabel">Localiza&ccedil;&atilde;o:</div>
		<div class="imprimirFichaColumn">{$professor->nomeInstituicao}</div>
		<div class="imprimirFichaLabel">Jornada:</div>
		<div class="imprimirFichaColumn">{$professor->jornada}</div>
		<div class="imprimirFichaLabel">Situa&ccedil;&atilde;o:</div>
		<div class="imprimirFichaColumn">{$professor->situacao}</div>
	</div>
	<div id="imprimirFichaData1">Florian&oacute;polis, {$data}</div>
	<div id="imprimirFichaSubtitulo2">Progress&otilde;es</div>
	<div class="imprimirFichaProgressao">{foreach $progressoes as $progressao}
		<div class="imprimirFichaProgressaoIten">
			<div>{$progressao->idCategoriaFuncionalInicial}</div>
			<div>{$progressao->cargo}</div>
			<div>{$progressao->portaria}</div>
			<div>{$progressao->observacao}</div>
		</div>
	{/foreach}</div>
	<div style="clear: both"></div>
	<div>{$data}</div>
	<div>Fonte: CPPD/SGD</div>
</div>