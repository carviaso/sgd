var principal = {
	loadNavCadastro: function() {
		$(".navCadastro").click(function() {
			gb.processing();
			$('#content').load('app/views/cadastro.php');
			$('#sidebar').load('app/views/menuCadastro.php', function() {
				cadastros.loadMenu();
				gb.processingClose();
			});
		}).click();
	},
	loadNavProfessor: function() {
		$(".navProfessor").click(function() {
			gb.processing();
			$('#content').load('app/views/professor.php');
			$('#sidebar').load('app/views/menuProfessor.php', function() {
				professores.loadMenu();
				gb.processingClose();
			});
		});
	},
	loadNavRelatorio: function() {
		$(".navRelatorio").click(function() {
			gb.processing();
			$('#content').load('app/views/relatorio.php');
			$('#sidebar').load('app/views/menuRelatorio.php', function() {
				relatorios.loadMenu();
				gb.processingClose();
			});
		});
	},
	loadNavFormulario: function() {
		$(".navFormulario").click(function() {
			gb.processing();
			$('#content').load('app/views/formulario.php');
			$('#sidebar').load('app/views/menuFormulario.php', function() {
				formularios.loadMenu();
				gb.processingClose();
			});
		});
	},
	loadNavSobre: function() {
		$(".navSobre").click(function() {
			gb.processing();
			$('#sidebar').html('');
			$('#content').load('app/views/sobre.php', function() {
				gb.processingClose();
			});
		});
	}
};
principal.loadNavCadastro();
principal.loadNavProfessor();
principal.loadNavRelatorio();
principal.loadNavFormulario();
principal.loadNavSobre();