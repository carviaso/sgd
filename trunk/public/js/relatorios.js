relatorios = {
	loadMenu: function() {
		$("#relacaoCentros").click(function() {
			var params = { "action":"getCentros" };
			$('#content').load("app/dispatch.php", params );
		});
		
		$("#relacaoTodosDepartamentos").click(function() {
			var params = { "action":"getDepartamentos" };
			$('#content').load("app/dispatch.php", params );
		});
		
		$("#diretoresPorCentros").click(function() {
			var params = { "action":"printCentros" };
			$('#content').load("app/dispatch.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"getDiretorPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/dispatch.php", params);
				});
			});
		});
		
		$("#professoresPorDepartamento").click(function() {
			var params = { "action":"printDepartamentos" };
			$('#content').load("app/dispatch.php", params, function() {
				$("#selectDepartamentos").change(function() {
					var idDepartamento = $(this).val();
					var params = { "action":"getProfessoresPorDepartamento", 'idDepartamento': idDepartamento };
					$('#professoresPorDepartamento').load("app/dispatch.php", params);
				});
			});
		});
		
		$("#departamentosPorCentro").click(function() {
			var params = { "action":"printCentros" };
			$('#content').load("app/dispatch.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"getDepartamentosPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/dispatch.php", params);
				});
			});
		});
	}
};