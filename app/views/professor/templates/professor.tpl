<h1>Cadastro de Professor</h1>
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="" maxlength="100" class="form_tfield" />
	<label for="sobrenome">Sobrenome</label>
	<input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="form_tfield" />

	<div>Matr&iacute;cula</div>
	<input class="form_tfield" type="text" maxlength="255" name="Matricula" value="" />
	<div>Siape</div>
	<input class="form_tfield" type="text" maxlength="255" name="Siape" value="" />
	
	<div>Data da admiss&atilde;o (dd/mm/aaaa)</div>
	<input type="text" id="dataAdmissao" class="form_tfield" >
	
	<div>Data da admiss&atilde;o na Ufsc (dd/mm/aaaa)</div>
	<input type="text" id="dataAdmissaoUfsc" class="form_tfield" >
	
	<div>Data prevista da aposentadoria (dd/mm/aaaa)</div>
	<input type="text" id="dataAposentadoria" class="form_tfield" >
	
	<div>Data efetiva da aposentadoria (dd/mm/aaaa)</div>
	<input type="text" id="dataEfetivaAposentadoria" class="form_tfield" >
	
	<div>Departamento</div>
	<select name ="idDepartamento">
		{section name=departamentos loop=$departamentos}
			<option>{$departamentos[departamentos]->nome}</option>
		{/section}
	</select>
	
	<div>Categoria Funcional Inicial</div>
	<select name ="idCategoriaFuncionalInicial">
		{section name=categoriasFuncionais loop=$categoriasFuncionais}
			<option>{$categoriasFuncionais[categoriasFuncionais]->descricao}</option>
		{/section}
	</select>
	
	<div>Categoria Funcional Atual</div>
	<select name ="idCategoriaFuncionalAtual">
		{section name=categoriasFuncionais loop=$categoriasFuncionais}
			<option>{$categoriasFuncionais[categoriasFuncionais]->descricao}</option>
		{/section}
	</select>
	
	<div>Tipo de Titula&ccedil;&atilde;o</div>
	<select name ="idTitulacao">
		{section name=titulacoes loop=$titulacoes}
			<option>{$titulacoes[titulacoes]->descricao}</option>
		{/section}
	</select>
	
	<div>Categoria Funcional Referência</div>
	<select name ="idCategoriaFuncionalReferencia">
		{section name=categoriasFuncionais loop=$categoriasFuncionais}
			<option>{$categoriasFuncionais[categoriasFuncionais]->descricao}</option>
		{/section}
	</select>
	<p>&nbsp;</p>
	<p><input class="form_submitb" name="submit" type="submit" value="Gravar" ></p>