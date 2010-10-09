<h1>Cadastro de Departamentos</h1>
<div>Centro</div>
<select id="idCentro" class="select ui-corner-all width100">
{foreach from=$centros item=centro}
	<option value="{$centro->idCentro}">{$centro->nome}</option>
{/foreach}
</select>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="input ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="input ui-corner-all width100" />
<div>Telefone</div>
<input type="text" id="fone" name="fone" value="" maxlength="13" class="input ui-corner-all width100" />
<p></p>
<p><button id="cadastrarDepartamento" class="right button">Cadastrar</button></p>