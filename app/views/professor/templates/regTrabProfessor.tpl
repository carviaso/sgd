<h1>Cadastro de Altera&ccedil;&atilde;o de Regime de Trabalhooo</h1>

	
<div class="multiSelectProfessor"></div>

<br />
<br />
<br />
<!-- 
<div>Professor</div>
<select id="idProfessor" class="select ui-corner-all width100">
	{foreach from=$professores item=professor}
		<option value="{$professor->id_professor}">{$professor->nome}</option>
	{/foreach}
</select>
 -->
<div>Regime de Trabalho</div>
<select id="idRegimeTrabalho" class="select ui-corner-all width100">
	{foreach from=$regimesTrabalho item=regimeTrabalho}
		<option value="{$regimeTrabalho->idRegimeTrabalho}">{$regimeTrabalho->descricao}</option>
	{/foreach}
</select>
<div>Processo</div>
<input type="text" id="processo" name="processo" value="" maxlength="45" class="input ui-corner-all width100" />
<div>Delibera&ccedil;&atilde;o</div>
<input type="text" id="deliberacao" name="deliberacao" value="" maxlength="45" class="input ui-corner-all width100" />
<div>Portaria</div>
<input type="text" id="portaria" name="portaria" value="" maxlength="45" class="input ui-corner-all width100" />
<div>Data de in&iacute;cio</div>
<input type="text" id="dataInicio" class="input ui-corner-all width100" />
<p></p>
<button id="cadastrarRegimeTrabalho" class="right button">Cadastrar</button>