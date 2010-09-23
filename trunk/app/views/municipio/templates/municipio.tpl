<h1>Cadastro de Munic&iacute;pio</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="input ui-corner-all width100" />
<div>UF</div>     
<select id="idUf" class="select ui-corner-all width100">
{foreach from=$ufs item=uf}
	<option value="{$uf->idUf}">{$uf->nome}</option>
{/foreach}
</select>
<p></p>
<p>
	<button id="cadastrarMunicipio" class="right button">Cadastrar</button>
</p>