<h1>Cadastro de Institui&ccedil;&otilde;es</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="10" class="ui-state-default ui-corner-all width100" />
<div>Munic&iacute;pio</div>
<select id="idMunicipio" class="width100">
{foreach from=$municipios item=municipio}
	<option value="{$municipio->idMunicipio}">{$municipio->nome}</option>
{/foreach}
</select>
<p></p>
<p><button id="cadastrarInstituicao">Cadastrar</button></p>