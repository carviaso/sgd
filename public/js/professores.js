professores = {
	loadMenu: function() {
		$("#cadProfessor").click(function() {
//			$('#content').load('app/cad/professor.php');
			var params = { "action":"printFormCadProfessor" };
			$('#content').load("app/dispatch.php", params );
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