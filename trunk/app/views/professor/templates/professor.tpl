<h1>Cadastro de Professor</h1>

<table class="aatable">
	<tr>
		<th colspan="2">Cadastro de novo professor</th>
	</tr>
	<tr>
		<td>Nome</td>
		<td><input type="text" id="nome" name="nome" value="" maxlength="100" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Sobrenome</td>
		<td><input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Matr&iacute;cula</td>
		<td><input class="form_tfield width100" type="text" maxlength="255" name="Matricula" value="" /></td>
	</tr>
	<tr>
		<td>Siape</td>
		<td><input class="form_tfield width100" type="text" maxlength="255" name="Siape" value="" /></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o</td>
		<td><input type="text" id="dataAdmissao" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o na Ufsc</td>
		<td><input type="text" id="dataAdmissaoUfsc" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Data prevista da aposentadoria</td>
		<td><input type="text" id="dataAposentadoria" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Data efetiva da aposentadoria</td>
		<td><input type="text" id="dataEfetivaAposentadoria" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Departamento</td>
		<td><select name ="idDepartamento" class="width100">
			{section name=departamentos loop=$departamentos}
				<option>{$departamentos[departamentos]->nome}</option>
			{/section}
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Inicial</td>
		<td><select name ="idCategoriaFuncionalInicial" class="width100">
			{section name=categoriasFuncionais loop=$categoriasFuncionais}
				<option>{$categoriasFuncionais[categoriasFuncionais]->descricao}</option>
			{/section}
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Atual</td>
		<td><select name ="idCategoriaFuncionalAtual" class="width100">
			{section name=categoriasFuncionais loop=$categoriasFuncionais}
				<option>{$categoriasFuncionais[categoriasFuncionais]->descricao}</option>
			{/section}
		</select></td>
	</tr>
	<tr>
		<td>Tipo de Titula&ccedil;&atilde;o</td>
		<td><select name ="idTitulacao" class="width100">
			{section name=titulacoes loop=$titulacoes}
				<option>{$titulacoes[titulacoes]->descricao}</option>
			{/section}
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Refer&ecirc;ncia</td>
		<td><select name ="idCategoriaFuncionalReferencia" class="width100">
			{section name=categoriasFuncionais loop=$categoriasFuncionais}
				<option>{$categoriasFuncionais[categoriasFuncionais]->descricao}</option>
			{/section}
		</select></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><button id="cadastrarProfessor">Cadastrar</button></td>
	</tr>
</table>