var relatorios = {
	loadMenu: function() {
		$("#relCentros").click(function() {
			var params = { "action":"relCentros" };
			$('#content').load("app/frontController.php", params );
		});
		$("#relDepartamentos").click(function() {
			var params = { "action":"relDepartamentos" };
			$('#content').load("app/frontController.php", params );
		});
		$("#relDiretoresCentros").click(function() {
			var params = { "action":"relDiretoresCentros" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"relDiretorPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/frontController.php", params);
				}).selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
			});
		});
		$("#relProfessoresDepartamento").click(function() {
			var params = { "action":"relProfessoresDepartamento" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectDepartamentos").change(function() {
					var idDepartamento = $(this).val();
					var params = { "action":"relProfessoresPorDepartamento", 'idDepartamento': idDepartamento };
					$('#professoresPorDepartamento').load("app/frontController.php", params);
				});
			});
		});
		$("#relDepartamentoCentro").click(function() {
			var params = { "action":"relDepartamentoCentro" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"relDepartamentoPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/frontController.php", params);
				});
			});
		});
	}
};