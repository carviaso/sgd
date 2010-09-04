var cadastros = {
	loadMenu: function() {
		$("#cadPais").click(function() {
			gb.processing();
			var params = { "action":"printFormCadPais" };
			$('#content').load("app/frontController.php", params, function() {
				$("#sigla").mask("aaa");
				$("#cadastrarPais").button().click(function() {
					cadastros.pais.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadUf").click(function() {
			gb.processing();
			var params = { "action":"printFormCadUF" };
			$('#content').load("app/frontController.php", params, function() {
				$("#sigla").mask("aaa");
				$("#cadastrarPais").button().click(function() {
					cadastros.pais.valida();
				});
				gb.processingClose();
			});
		});	
		$("#cadMunicipio").click(function() {
			$('#content').load('app/cad/municipio.php');
		});
		$("#cadInstituicao").click(function() {
			$('#content').load('app/cad/instituicao.php');
		});
		$("#cadCentro").click(function() {
			$('#content').load('app/cad/centro.php');
		});
		$("#cadDepartamento").click(function() {
			$('#content').load('app/cad/departamento.php');
		});
		$("#cadTipoAfastamento").click(function() {
			$('#content').load('app/cad/tipoAfastamento.php');
		});
		$("#cadTipoTitulacao").click(function() {
			$('#content').load('app/cad/tipoTitulacao.php');
		});
		$("#cadCategoriaFuncional").click(function() {
			$('#content').load('app/cad/categoriaFuncional.php');
		});
		$("#cadRegimeTrabalho").click(function() {
			$('#content').load('app/cad/regimeTrabalho.php');
		});
	},
	pais: {
		valida: function() {
			var erro = [];
			var nome = $('#nome').val();
			var sigla = $('#sigla').val();
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !sigla ) erro.push( 'Sigla' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadPais',
									'nome':nome,
									'sigla':sigla
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.pais.cadastra( params );
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
		cadastra: function( params ) {
			
			$.post("app/frontController.php", params, function( response ) {
				if ( response.result == 1 ) {
					$("#cadPais").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Pais' );
				} else {
					var msg = 'Erro ao cadastrar pais.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	}
};