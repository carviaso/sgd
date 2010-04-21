<h1>Cadastro de Regime de Trabalho do Professor</h1>
<form method="post">
	<p>
	<div id="LProfessor">Professor</div>
	<select name ="Id_professor">
	<!-- 
	$result = $proxy->get_all_professor()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_professor].">".$depData[nome]." ".$depData[sobrenome]
	}
	 -->
	</select>
	
	<div id="LRegimeTrabalho">Regime de Trabalho</div>
	<select name ="Id_regime_trabalho">
	<!-- 
	$result = $proxy->get_all_regime_trabalho()
	for($index=0 $index < count($result) $index++) {
	    $depData = $result[$index]
	    echo "<OPTION VALUE=".$depData[id_regime_trabalho].">".$depData[descricao]
	}
	 -->
	</select>
	
	<div id="LProcesso">Processo</div><input class="form_tfield" type="text" maxlength="45" name="Processo" value="" /><br>
	<div id="LDeliberacao">Delibera&ccedil;&atilde;o</div><input class="form_tfield" type="text" maxlength="45" name="Deliberacao" value="" /><br>
	<div id="LPortaria">Portaria</div><input class="form_tfield" type="text" maxlength="45" name="Portaria" value="" /><br>
	
	<div id="LDataInicio">Data de in&iacute;cio (dd/mm/aaaa)</div>
	<input class="form_tfield" id="Dia" name="Dia" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="Mes" name="Mes" class="element text" size="2" maxlength="2" value="" type="text"> /
	<input class="form_tfield" id="Ano" name="Ano" class="element text" size="4" maxlength="4" value="" type="text">
	
	</p>
	<p></p>
	<p>
	<input class="form_submitb" name="submit" type="submit" value="Gravar" >
	<input class="form_submitb" name="reset" type="reset" value="Cancelar" >
	</p>
</form>