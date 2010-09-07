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
				$("#cadastrarUf").button().click(function() {
					cadastros.uf.valida();
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});	
		$("#cadMunicipio").click(function() {
			gb.processing();
			var params = { "action":"printFormCadMunicipio" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarMunicipio").button().click(function() {
					cadastros.municipio.valida();
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#cadInstituicao").click(function() {
			gb.processing();
			var params = { "action":"printFormCadInstituicao" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarInstituicao").button().click(function() {
					cadastros.instituicao.valida();
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#cadCentro").click(function() {
			gb.processing();
			var params = { "action":"printFormCadCentro" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarCentro").button().click(function() {
					cadastros.centro.valida();
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#cadDepartamento").click(function() {
			gb.processing();
			var params = { "action":"printFormCadDepartamento" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarDepartamento").button().click(function() {
//					cadastros.departamento.valida();
					alert('Departamento');
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
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
	},
	uf: {
		valida: function() {
			var erro = [];
			var nome = $('#nome').val();
			var sigla = $('#sigla').val();
			var idPais = $('#idPais').val();
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !sigla ) erro.push( 'Sigla' );
			if ( !idPais ) erro.push( 'Pais' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadUF',
									'nome':nome,
									'sigla':sigla,
									'idPais':idPais
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.uf.cadastra( params );
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
					$("#cadUf").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de UF' );
				} else {
					var msg = 'Erro ao cadastrar UF.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	municipio: {
		valida: function() {
			var erro = [];
			var nome = $('#nome').val();
			var idUf = $('#idUf').val();
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !idUf ) erro.push( 'UF' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadMunicipio',
									'nome':nome,
									'idUf':idUf
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.municipio.cadastra( params );
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
					$("#cadMunicipio").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Municipio' );
				} else {
					var msg = 'Erro ao cadastrar Municipio.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	instituicao: {
		valida: function() {
			var erro = [];
			var nome = $('#nome').val();
			var sigla = $('#sigla').val();
			var idMunicipio = $('#idMunicipio').val();
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !sigla ) erro.push( 'sigla' );
			if ( !idMunicipio ) erro.push( 'Id Municipio' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadInstituicao',
									'nome':nome,
									'sigla':sigla,
									'idMunicipio':idMunicipio
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.instituicao.cadastra( params );
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
					$("#cadInstituicao").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Instituicao' );
				} else {
					var msg = 'Erro ao cadastrar Instituicao.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	centro: {
		valida: function() {
			var erro = [];
			var nome = $('#nome').val();
			var sigla = $('#sigla').val();
			var idInstituicao = $('#idInstituicao').val();
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !sigla ) erro.push( 'Sigla' );
			if ( !idInstituicao ) erro.push( 'Id da Instituicao' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadCentro',
									'nome':nome,
									'sigla':sigla,
									'idInstituicao':idInstituicao
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.instituicao.cadastra( params );
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
					$("#cadCentro").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Centro' );
				} else {
					var msg = 'Erro ao cadastrar Centro.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	}
};