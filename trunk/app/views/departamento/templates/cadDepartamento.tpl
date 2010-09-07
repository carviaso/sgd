<h1>Cadastro de Departamentos</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="ui-state-default ui-corner-all width100" />
<div>Centro</div>
<select id="idCentro" class="width100">
{foreach from=$centros item=centro}
	<option value="{$centro->idCentro}">{$centro->nome}</option>
{/foreach}
</select>
<p></p>
<p><button id="cadastrarCentro">Cadastrar</button></p>