<h1>Cadastro de Munic&iacute;pio</h1>
<form method="post">
	<p>
		<div id="LNome">Nome</div><input class="form_tfield" type="text" maxlength="100" name="Nome" value="" /><br>
		<div id="LUf">UF</div>
		<select name ="Id_uf">
		
		<!-- 
		$result = $proxy->get_all_uf()
		
		for($index=0 $index < count($result) $index++) {
		    $depData = $result[$index]
		    echo "<OPTION VALUE=".$depData[id_uf].">".$depData[nome]
		}
		 -->
		</select>
		</p>
		<p></p>
		<p>
		<input class="form_submitb" name="submit" type="submit" value="Gravar" >
		<input class="form_submitb" name="reset" type="reset" value="Cancelar" >
	</p>
</form>