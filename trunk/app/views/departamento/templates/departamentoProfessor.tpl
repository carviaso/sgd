{if $option eq departamentoProfessor}
	<h1>Departamento do Professor</h1>
	<div>Digite o nome do professor</div>
	<input type="text" id="professor" name="professor" value="" maxlength="100" class="input ui-corner-all width100" />
	<input type="hidden" id="idProfessor" name="idProfessor" />
	<div id="detalheDepartamentoProfessor"></div>
{/if}
{if $option eq detalheDepartamentoProfessor}
	<p></p>
	{foreach from=$departamento item=dep}
	
		<table class="aatable">
			<tr><th>Nome do departamento</th></tr>
			<tr><td>{$dep->nome}</td></tr>
		</table>
		
		<table class="aatable">
			<tr><th>Sigla do Departamento</th></tr>
			<tr><td>{$dep->departamentoSigla}</td></tr>
		</table>
		
		<table class="aatable">
			<tr><th>Telefone</th></tr>
			<tr><td>{$dep->fone}</td></tr>
		</table>
		
		<table class="aatable">
			<tr><th>Sigla do Centro</th></tr>
			<tr><td>{$dep->centroSigla}</td></tr>
		</table>
	{/foreach}
{/if}