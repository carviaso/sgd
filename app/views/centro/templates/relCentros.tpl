<h1>Relat&oacute;rio de Centros</h1>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Sigla</th>
		<th>Telefone</th>
	</tr>
	{foreach from=$centros item=centro}
		<tr>
	    	<td>{$centro->nome}</td>
	    	<td>{$centro->sigla}</td>
	    	<td>{$centro->fone}</td>
	    </tr>
	{/foreach}
</table>
<div id="note">
	<p>Emitido em: {$emissao}</p>
</div>