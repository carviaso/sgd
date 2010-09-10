var relatorios = {
	loadMenu: function() {
		$("#relacaoCentros").click(function() {
			var params = { "action":"getCentros" };
			$('#content').load("app/frontController.php", params );
		});
		$("#relacaoTodosDepartamentos").click(function() {
			var params = { "action":"getDepartamentos" };
			$('#content').load("app/frontController.php", params );
		});
		$("#diretoresPorCentros").click(function() {
			var params = { "action":"printCentros" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"getDiretorPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/frontController.php", params);
				}).selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
			});
		});
		$("#professoresPorDepartamento").click(function() {
			var params = { "action":"printDepartamentos" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectDepartamentos").change(function() {
					var idDepartamento = $(this).val();
					var params = { "action":"getProfessoresPorDepartamento", 'idDepartamento': idDepartamento };
					$('#professoresPorDepartamento').load("app/frontController.php", params);
				});
			});
		});
		$("#departamentosPorCentro").click(function() {
			var params = { "action":"printCentros" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"getDepartamentosPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/frontController.php", params);
				});
			});
		});
	}
};