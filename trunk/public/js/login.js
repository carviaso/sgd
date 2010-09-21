var login = {
	init: function() {
		$("#entrar").button().click(function() {
			login.login();
		});
		$("#logout").click(function() {
			login.logout();
		});
	}(),
	logout: function() {
		gb.processing();
		var params = { 'action':'logout' };
		$.post("app/frontController.php", params, function( response ) {
			if ( response.result == 1 ) {
				location.reload();
			}
			setTimeout( function() {
				gb.processingClose();
			}, 1000);
		}, "json" );
	},
	login: function( params ) {
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
					location.reload();
				} else {
					var msg = 'Verifique o numero do seu Siape e sua senha.<br /><br />' + response.error;
					gb.highlightMessage( msg, 'Erro' );
				}
			}, "json" );
			setTimeout( function() {
				gb.processingClose();
			}, 1000);
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
			gb.processingClose();
		}
	}
}