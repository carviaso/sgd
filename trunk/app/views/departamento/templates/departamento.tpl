{if $option eq viewDepartamento}
	<h1>Relat&oacute;rio de Centros</h1>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Sigla</th>
			<th>Centro</th>
		</tr>
		{foreach from=$departamentos item=departamento}
			<tr>
		    	<td>{$departamento->nome}</td>
		    	<td>{$departamento->departamentoSigla}</td>
		    	<td>{$departamento->centroSigla}</td>
		    </tr>		
		{/foreach}
	</table>
	<div id="note">
		<p>Emitido em: {$emissao}</p>
	</div>
{/if}
{if $option eq listDepartamento}
	<h1>Relat&oacute;rio de Professores por Departamento</h1>
	<span>Escolha aqui o centro</span>
	
	<select id="selectDepartamentos">
		{foreach from=$departamentos item=departamento}
		    <option value="{$departamento->idDepartamento}">{$departamento->nome}</option>
		{/foreach}
	</select>
	<br />
	<br />
	<div id="professoresPorDepartamento" ></div>
{/if}
{if $option eq viewProfessoresPorDepartamento}
	{if $professores|count gt 0}
		<table class="aatable">
			<tr>
				<th>Nome</th>
				<th>Matr&iacute;cula</th>
			</tr>
			{foreach from=$professores item=professor}
				<tr>
					<td>{$professor->nome} {$professor->sobrenome}</td>
					<td>{$professor->matricula}</td>
			    </tr>
			{/foreach}
		</table>
		<div id="note">
			<p>Emitido em: {$emissao}</p>
		</div>
	{else}
		<h2>Nenhum registro encontrado.</h2>
	{/if}
{/if}