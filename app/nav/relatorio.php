<li id="submenu">
    <h2>Relat&oacute;rios B&aacute;sicos</h2>
    <ul>
		<li><a href="javascript:void(0);" id="relacaoCentros">Rela&ccedil;&atilde;o dos Centros</a></li>
        <li><a href="javascript:void(0);" id="relacaoTodosDepartamentos">Rela&ccedil;&atilde;o de Todos os Departamentos</a></li>
        <li><a href="javascript:void(0);" id="relacaoTodosDiretoresCentros">Rela&ccedil;&atilde;o de Todos os Diretores dos Centros</a></li>
    </ul>
    <br />
    <h2>Relat&oacute;rios do Professor</h2>
    <ul>
        <li><a href="javascript:void(0);" id="professoresPorDepartamento">Professores por Departamento</a></li>
   </ul> 
    <br />
    <h2>Relat&oacute;rios Espec&iacute;ficos</h2>
    <ul>
        <li><a href="javascript:void(0);" id="departamentosPorCentro">Departamentos por Centro</a></li>
    </ul> 
</li>
<script type="text/javascript">
	$("#relacaoCentros").click(function() {
		$('#content').load('app/rel/relacaoCentros.php');
	});
	$("#relacaoTodosDepartamentos").click(function() {
		$('#content').load('app/rel/relacaoTodosDepartamentos.php');
	});	
	$("#relacaoTodosDiretoresCentros").click(function() {
		$('#content').load('app/rel/relacaoTodosDiretoresCentros.php');
	});
	$("#professoresPorDepartamento").click(function() {
		$('#content').load('app/rel/professoresPorDepartamento.php');
	});
	$("#departamentosPorCentro").click(function() {
		$('#content').load('app/rel/departamentosPorCentro.php');
	});
</script>