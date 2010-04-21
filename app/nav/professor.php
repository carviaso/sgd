<li id="submenu">
    <h2>Cadastros do Professor</h2>
    <ul>
        <li><a href="javascript:void(0);" id="cadProfessor">Professor</a></li>
        <li><a href="javascript:void(0);" id="cadRegimeTrabalhoProfessor">Regime de Trabalho do Professor</a></li>
        <li><a href="javascript:void(0);" id="cadAfastamentoProfessor">Afastamento do Professor</a></li>
        <li><a href="javascript:void(0);" id="cadProgressaoFuncionalProfessor">Progress&atilde;o Funcional do Professor</a></li>
    </ul>
</li>
<script type="text/javascript">
	$("#cadProfessor").click(function() {
		$('#content').load('app/cad/professor.php');
	});
	$("#cadRegimeTrabalhoProfessor").click(function() {
		$('#content').load('app/cad/regimeTrabalhoProfessor.php');
	});	
	$("#cadAfastamentoProfessor").click(function() {
		$('#content').load('app/cad/afastamentoProfessor.php');
	});
	$("#cadProgressaoFuncionalProfessor").click(function() {
		$('#content').load('app/cad/progressaoFuncionalProfessor.php');
	});
</script>