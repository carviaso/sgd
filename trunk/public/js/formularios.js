var formularios = {
	loadMenu: function() {
		$("#avaliacaoDesempenho").click(function() {
			gb.processing();
			var params = { "action":"avaliacaoDesempenho" };
			$('#content').load("app/frontController.php", params, function(){
				gb.processingClose();
			});
		});
	}	
};