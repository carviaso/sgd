var login = {
	init: function() {
		$("#entrar").button().click(function() {
			login.login();
		});
		$("#logout").click(function() {
			login.logout();
		});
		$("#editUserData").click(function() {
			login.printFormUser();
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
	},
	printFormUser: function() {
		gb.processing();
		var params = { "action":"printFormUser" };
		$('#content').load("app/frontController.php", params, function() {
			$("#dataNascimento").mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
			$("#cadastrarProfessor").button().click(function() {
				login.formUserValida();
			});
			gb.processingClose();
		});
	},
	formUserValida: function() {
		var erro = [];
		var nome = $('#nome').val();
		var dataNascimento = $('#dataNascimento').val();
		var siape = $('#siape').val();
		var senhaAtual = $('#senhaAtual').val();
		var novaSenha = $('#novaSenha').val();
		var novaSenha2 = $('#novaSenha2').val();
		
		if ( !nome ) erro.push( 'Nome' );
		if ( !dataNascimento ) erro.push( 'Data de Nascimento' );
		if ( senhaAtual ) {
			if ( novaSenha && novaSenha2 ) {
				if ( novaSenha != novaSenha2 ) {
					erro.push( 'Os campos da nova senha n\u00E3o conferem' );
				}
			} else {
				erro.push( 'Preencha todos os campos de senha' );
			}
		}
		
		if ( erro.length == 0 ) {
			var params = {
				'action':'updateUser',
				'nome':nome,
				'dataNascimento':dataNascimento,
				'siape':siape,
				'senhaAtual':senhaAtual,
				'novaSenha':novaSenha,
				'novaSenha2':novaSenha2
			};
			
			$("<div class='dialogConfirm'>Deseja realmente atualizar seus dados?</div>").dialog({
				height:140,
				modal: true,
				buttons: {
					'Sim': function() {
						login.updateUser( params );
						$(this).dialog('close');
					},
					'N\u00E3o': function() {
						$(this).dialog('close');
					}
				},
				close: function() {
					$('.dialogConfirm').remove();
				}
			});
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	},
	updateUser: function( params ) {
		$.post("app/frontController.php", params, function( response ) {
			if ( response.result == 1 ) {
				$("#editUserData").click();
				var msg = 'Dados atualizados com sucesso.';
				gb.message( msg, 'Atualiza\u00E7\u00E3o de dados' );
			} else {
				var msg = 'Erro ao atualizar dados.<br /><br />' + response.error;
				gb.errorMessage( msg, 'Erro' );
			}
		}, "json" );
	}
}