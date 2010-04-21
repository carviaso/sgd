<h1>Cadastro de Centros</h1>
<form method="post">
	<p>
		<div id="LNome">Nome</div><input class="form_tfield" type="text" maxlength="100" name="Nome" value="" /><br>
		<div id="LSigla">Sigla</div><input class="form_tfield" type="text" maxlength="3" name="Sigla" value="" /><br>
		<div id="LInstituicao">Institui&ccedil;&atilde;o</div>
		<select name ="Id_instituicao">
		<!-- 
		$result = $proxy->get_all_instituicao()
		
		for($index=0 $index < count($result) $index++) {
		    $depData = $result[$index]
		    echo "<OPTION VALUE=".$depData[id_instituicao].">".$depData[nome]
		}
		 -->
		</select>
	</p>
	<p>&nbsp;</p>
	<p>
		<input class="form_submitb" name="submit" type="submit" value="Gravar" >
		<input class="form_submitb" name="reset" type="reset" value="Cancelar" >
	</p>
</form>