<h1>Cadastro de Centros</h1>
<div>Institui&ccedil;&atilde;o</div>
<select id="idInstituicao" class="select ui-corner-all width100">
{foreach from=$instituicoes item=instituicao}
	<option value="{$instituicao->idInstituicao}" {if $instituicao->idInstituicao eq 1}selected="selected"{/if} >{$instituicao->nome}</option>
{/foreach}
</select>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="input ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="input ui-corner-all width100" />
<div>Telefone</div>
<input type="text" id="fone" name="fone" value="" maxlength="13" class="input ui-corner-all width100" />
<p></p>
<p><button id="cadastrarCentro" class="right button">Cadastrar</button></p>