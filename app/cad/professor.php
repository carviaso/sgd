<h1>Cadastro de Professor</h1>
<form method="post">
	<p>
	<div id="LNome">Nome</div><input class="form_tfield" type="text" maxlength="100" name="Nome" value="" /><br>
	<div id="LSobrenome">Sobrenome</div><input class="form_tfield" type="text" maxlength="100" name="Sobrenome" value="" /><br>
	<div id="LMatricula">Matr&iacute;cula</div><input class="form_tfield" type="text" maxlength="255" name="Matricula" value="" /><br>
	<div id="LSiape">Siape</div><input class="form_tfield" type="text" maxlength="255" name="Siape" value="" /><br>
	
	<div id="LDataAdmissao">Data da admiss&atilde;o (dd/mm/aaaa)</div>
	<input class="form_tfield" id="DiaAdmissao" name="DiaAdmissao" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="MesAdmissao" name="MesAdmissao" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="AnoAdmissao" name="AnoAdmissao" class="element text" size="4" maxlength="4" value="" type="text">
	
	<div id="LDataAdmissaoUfsc">Data da admiss&atilde;o na Ufsc (dd/mm/aaaa)</div>
	<input class="form_tfield" id="DiaAdmissaoUfsc" name="DiaAdmissaoUfsc" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="MesAdmissaoUfsc" name="MesAdmissaoUfsc" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="AnoAdmissaoUfsc" name="AnoAdmissaoUfsc" class="element text" size="4" maxlength="4" value="" type="text">
	
	<div id="LDataPrevisaoAposentadoria">Data prevista da aposentadoria (dd/mm/aaaa)</div>
	<input class="form_tfield" id="DiaPrevisaoAposentadoria" name="DiaPrevisaoAposentadoria" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="MesPrevisaoAposentadoria" name="MesPrevisaoAposentadoria" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="AnoPrevisaoAposentadoria" name="AnoPrevisaoAposentadoria" class="element text" size="4" maxlength="4" value="" type="text">
	
	<div id="LDataAposentadoria">Data efetiva da aposentadoria (dd/mm/aaaa)</div>
	<input class="form_tfield" id="DiaAposentadoria" name="DiaAposentadoria" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="MesAposentadoria" name="MesAposentadoria" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="AnoAposentadoria" name="AnoAposentadoria" class="element text" size="4" maxlength="4" value="" type="text">
	
	<div id="LDepartamento">Departamento</div>
	<select name ="Id_departamento">
	<!-- 
	$result = $proxy->get_all_departamento()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_departamento].">".$depData[nome]
	}
	 -->
	</select>
	
	<div id="LCategoriaFuncionalInicial">Categoria Funcional Inicial</div>
	<select name ="Id_categoria_funcional_inicial">
	<!-- 
	$result = $proxy->get_all_categoria_funcional()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_categoria_funcional].">".$depData[descricao]
	}
	 -->
	</select>
	
	<div id="LCategoriaFuncionalAtual">Categoria Funcional Atual</div>
	<select name ="Id_categoria_funcional_atual">
	<!-- 
	$result = $proxy->get_all_categoria_funcional()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_categoria_funcional].">".$depData[descricao]
	}
	 -->
	</select>
	
	<div id="LTipoTitulacao">Tipo de Titula&ccedil;&atilde;o</div>
	<select name ="Id_tipo_titulacao">
	<!-- 
	$result = $proxy->get_all_tipo_titulacao()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_tipo_titulacao].">".$depData[descricao]
	}
	 -->
	</select>
	
	<div id="LCategoriaFuncionalReferencia">Categoria Funcional Referência</div>
	<select name ="Id_categoria_funcional_referencia">
	<!-- 
	$result = $proxy->get_all_categoria_funcional()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_categoria_funcional].">".$depData[descricao]
	}
	 -->
	</select>
	
	<p>&nbsp;</p>
	
	<p>
		<input class="form_submitb" name="submit" type="submit" value="Gravar" >
		<input class="form_submitb" name="reset" type="reset" value="Cancelar" >
	</p>
</form>