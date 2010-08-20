principal = {
	loadNavHome: function() {
		$(".navHome").click(function() {
			$('#sidebar').load('app/views/home.php');
			$('#content').load('app/content/home.php');
		});
	},
	loadNavCadastro: function() {
		$(".navCadastro").click(function() {
			$('#content').load('app/content/cadastro.php');
			$('#sidebar').load('app/views/menuCadastro.php', function() {
				cadastros.loadMenu();
			});
		});
	},
	loadNavProfessor: function() {
		$(".navProfessor").click(function() {
			$('#content').load('app/content/professor.php');
			$('#sidebar').load('app/views/menuProfessor.php', function() {
				professores.loadMenu();
			});
		});
	},
	loadNavRelatorio: function() {
		$(".navRelatorio").click(function() {
			$('#content').load('app/content/relatorio.php');
			$('#sidebar').load('app/views/menuRelatorio.php', function() {
				relatorios.loadMenu();
			});
		});
	}
};