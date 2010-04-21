<h1>Cadastro de Pa&iacute;s</h1>
<form method="post">
	<p>
		<div id="LNome">Nome</div>
		<input class="form_tfield" type="text" maxlength="100" id="nome" name="nome" value="" /><br>
		<div id="LSigla">Sigla</div>
		<input class="form_tfield" type="text" maxlength="3" id="sigla" name="sigla" value="" /><br>
	</p>
	<p>&nbsp;</p>
	<p>
		<input class="form_submitb" name="submit" type="submit" value="Gravar" >
		<input class="form_submitb" name="reset" type="reset" value="Cancelar" >
	</p>
</form>
<script type="text/javascript">
	$(function() {
		$("#sigla").mask("aaa");
	});
</script>