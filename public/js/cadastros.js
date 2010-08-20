cadastros = {
	loadMenu: function() {
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
	}
};