<h1>Relat&oacute;rio de Professores</h1>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Matr&iacute;cula</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>
	{foreach from=$professores item=professor}
		<tr>
	    	<td>{$professor->nome} {$professor->sobrenome}</td>
	    	<td>{$professor->matricula}</td>
	    	<td><a href="javascript:void(0);">Editar</a></td>
	    	<td><a href="javascript:void(0);">Excluir</a></td>
	    </tr>
	{/foreach}
</table>
<div id="note">
	<p>Emitido em: {$emissao}</p>
</div>