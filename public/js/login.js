var login = {
	init: function() {
		$("#entrar").button().click(function() {
			login.verifica();
		});
	}(),
	verifica: function( params ) {
		gb.processing();
		var erro = [];
		var siape = $('#siape').val();
		var senha = $('#senha').val();
		
		if ( !siape ) erro.push( 'Siape' );
		if ( !senha ) erro.push( 'Senha' );
		
		if ( erro.length == 0 ) {
			var params = {
				'verificaLogin':true,
				'siape':siape,
				'senha':senha
			};
			
			$.post("app/frontController.php", params, function( response ) {
				if ( response.result == 1 ) {
					location = "main.php";
				} else {
					var msg = 'Verifique o numero do seu Siape e sua senha.<br /><br />' + response.error;
					gb.highlightMessage( msg, 'Erro' );
				}
			}, "json" );
			gb.processingClose();
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
			gb.processingClose();
		}
	}
}