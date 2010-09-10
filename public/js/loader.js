var principal = {
	loadNavCadastro: function() {
		$(".navCadastro").click(function() {
			$('#content').load('app/views/cadastro.php');
			$('#sidebar').load('app/views/menuCadastro.php', function() {
				cadastros.loadMenu();
			});
		});
	},
	loadNavProfessor: function() {
		$(".navProfessor").click(function() {
			$('#content').load('app/views/professor.php');
			$('#sidebar').load('app/views/menuProfessor.php', function() {
				professores.loadMenu();
			});
		});
	},
	loadNavRelatorio: function() {
		$(".navRelatorio").click(function() {
			$('#content').load('app/views/relatorio.php');
			$('#sidebar').load('app/views/menuRelatorio.php', function() {
				relatorios.loadMenu();
			});
		}).click();
	},
	loadNavSobre: function() {
		$(".navSobre").click(function() {
			$('#content').load('app/views/sobre.php');
		});
	}
};
principal.loadNavCadastro();
principal.loadNavProfessor();
principal.loadNavRelatorio();
principal.loadNavSobre();