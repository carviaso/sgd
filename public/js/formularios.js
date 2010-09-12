var formularios = {
	loadMenu: function() {
		$("#cadAvaliacaoDesempenho").click(function() {
			gb.processing();
			var params = { "action":"printFormCadAvaliacaoDesempenho" };
			$('#content').load("app/frontController.php", params, function(){
				gb.processingClose();
			});
		});
	}	
};