var formularios = {
	loadMenu: function() {
		$("#cadAvaliacaoDesempenho").click(function() {
			gb.processing();
			var params = { "action":"printFormCadAvaliacaoDesempenho" };
			$('#content').load("app/frontController.php", params, function() {
				$('table tr td .nota')
					.attr({'maxlength':2})
					.blur( function() {
						if ( $(this).val() != '' ) {
							alert($(this).val());
						}
					})
					.parent().css({"text-align":"center"});
				gb.processingClose();
			});
		});
	}	
};