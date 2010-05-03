<li id="submenu">
    <h2>Cadastros B&aacute;sicos</h2>
    <ul>
        <li><a href="javascript:void(0);" id="cadPais">Pa&iacute;s</a></li>
        <li><a href="javascript:void(0);" id="cadUf">UF</a></li>
        <li><a href="javascript:void(0);" id="cadMunicipio">Munic&iacute;pio</a></li>
    </ul>
    <h2></h2>
    <ul>
        <li><a href="javascript:void(0);" id="cadInstituicao">Institui&ccedil;&otilde;es</a></li>
        <li><a href="javascript:void(0);" id="cadCentro">Centros</a></li>
        <li><a href="javascript:void(0);" id="cadDepartamento">Departamentos</a></li>
    </ul>
	<h2></h2>
    <ul>
        <li><a href="javascript:void(0);" id="cadTipoAfastamento">Tipos de Afastamentos</a></li>
        <li><a href="javascript:void(0);" id="cadTipoTitulacao">Tipos de Titula&ccedil;&otilde;es</a></li>
        <li><a href="javascript:void(0);" id="cadCategoriaFuncional">Categorias Funcionais</a></li>
        <li><a href="javascript:void(0);" id="cadRegimeTrabalho">Regimes de Trabalho</a></li>
    </ul>
</li>
<script type="text/javascript">
	$("#cadPais").click(function() {
		$('#content').load('app/cad/pais.php');
	});
	$("#cadUf").click(function() {
		$('#content').load('app/cad/uf.php');
	});	
	$("#cadMunicipio").click(function() {
		$('#content').load('app/cad/municipio.php');
	});
	$("#cadInstituicao").click(function() {
		$('#content').load('app/cad/instituicao.php');
	});
	$("#cadCentro").click(function() {
		$('#content').load('app/cad/centro.php');
	});
	$("#cadDepartamento").click(function() {
		$('#content').load('app/cad/departamento.php');
	});
	$("#cadTipoAfastamento").click(function() {
		$('#content').load('app/cad/tipoAfastamento.php');
	});
	$("#cadTipoTitulacao").click(function() {
		$('#content').load('app/cad/tipoTitulacao.php');
	});
	$("#cadCategoriaFuncional").click(function() {
		$('#content').load('app/cad/categoriaFuncional.php');
	});
	$("#cadRegimeTrabalho").click(function() {
		$('#content').load('app/cad/regimeTrabalho.php');
	});
</script>