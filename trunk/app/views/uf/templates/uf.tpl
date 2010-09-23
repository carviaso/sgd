<h1>Cadastro de UF</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="input ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="input ui-corner-all width100" />
<div>Pa&iacute;s</div>
<select id="idPais" class="select ui-corner-all width100">
{foreach from=$paises item=pais}
	<option value="{$pais->idPais}">{$pais->nome}</option>
{/foreach}
</select>
<p></p>
<p><button id="cadastrarUf" class="right button">Cadastrar</button></p>