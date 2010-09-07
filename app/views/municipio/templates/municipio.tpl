<h1>Cadastro de Munic&iacute;pio</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>UF</div>     
<select id="idUf" class="width100">
{foreach from=$ufs item=uf}
	<option value="{$uf->idUf}">{$uf->nome}</option>
{/foreach}
</select>
<p></p>
<p>
	<button id="cadastrarMunicipio">Cadastrar</button>
</p>