<h1>Rela&ccedil;&atilde;o dos Professores Aposentados</h1>
<table class="aatable">
	<tr>
		<th>Identificador</th>
		<th>Nome</th>
	</tr>
	{foreach from=$aposentados item=aposentado}
		<tr>
	    	<td>{$aposentado->idProfessor}</td>
	    	<td>{$aposentado->nome}</td>
	    </tr>
	{/foreach}
</table>