professores = {
	loadMenu: function() {
		$("#cadProfessor").click(function() {
			var params = { "action":"printFormCadProfessor" };
			$('#content').load("app/dispatch.php", params, function() {
				$("#dataAdmissao, #dataAdmissaoUfsc, #dataAposentadoria, #dataEfetivaAposentadoria")
					.mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("button").button();
			} );
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
	}
};