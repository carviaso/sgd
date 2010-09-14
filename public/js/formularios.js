var formularios = {
	loadMenu: function() {
		$("#cadAvaliacaoDesempenho").click(function() {
			gb.processing();
			var params = { "action":"printFormCadAvaliacaoDesempenho" };
			$('#content').load("app/frontController.php", params, function() {
				$('table tr td .nota')
					.attr({'maxlength':2})
					.blur( function() {
						var last = $(this).attr('id').length;
						var lastCaracter = $(this).attr('id').charAt((last-1));
						var produto = producaoA = IndiceQualidadeB = fatorMultiplicador = result = totalSomaPag1 = 0;						
						if ( lastCaracter == 'A') {
							producaoA = parseFloat( $(this).val(), 10 );
							IndiceQualidadeB = parseFloat( $(this).parent().next().find('input').val(), 10 );
							fatorMultiplicador = parseFloat( $(this).parent().next().next().html(), 10 );
							result = $(this).parent().next().next().next();
						} else {
							producaoA = parseFloat( $(this).parent().prev().find('input').val(), 10 );
							IndiceQualidadeB = parseFloat( $(this).val(), 10 ); 
							fatorMultiplicador = parseFloat( $(this).parent().next().html(), 10 );
							result = $(this).parent().next().next();
						}
						produto = ((producaoA * fatorMultiplicador)* IndiceQualidadeB).toFixed(2);
						result.html(produto);
						$('.totalPonto').each(function() {
							totalSomaPag1 += parseFloat( $(this).html() );
						});
						$('#totalPontoPag1').html(totalSomaPag1.toFixed(2));
					})
					.parent().css({"text-align":"center"});
				gb.processingClose();
			});
		});
	}	
};