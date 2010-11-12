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
				gb.processingClose();
			});
		});
		$("#cadCentro").click(function() {
			gb.processing();
			var params = { "action":"printFormCadCentro" };
			$('#content').load("app/frontController.php", params, function() {
				$('#fone').mask( '(99)9999-9999' );
				$("#cadastrarCentro").button().click(function() {
					cadastros.centro.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadDepartamento").click(function() {
			gb.processing();
			var params = { "action":"printFormCadDepartamento" };
			$('#content').load("app/frontController.php", params, function() {
				$('#fone').mask( '(99)9999-9999' );
				$("#cadastrarDepartamento").button().click(function() {
					cadastros.departamento.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadTipoAfastamento").click(function() {
			gb.processing();
			var params = { "action":"printFormCadTipoAfastamento" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarTipoAfastamento").button().click(function() {
					cadastros.tipoAfastamento.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadTipoTitulacao").click(function() {
			gb.processing();
			var params = { "action":"printFormCadTipoTitulacao" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarTipoTitulacao").button().click(function() {
					cadastros.tipoTitulacao.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadCategoriaFuncional").click(function() {
			gb.processing();
			var params = { "action":"printFormCadCategoriaFuncional" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarCategoriaFuncional").button().click(function() {
					cadastros.categoriaFuncional.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadRegimeTrabalho").click(function() {
			gb.processing();
			var params = { "action":"printFormCadRegimeTrabalho" };
			$('#content').load("app/frontController.php", params, function() {
				$("#cadastrarRegimeTrabalho").button().click(function() {
					cadastros.regimeTrabalho.valida();
				});
				$('#quantidadeHoras').mask('99h');
				$("#radio").buttonset();
				gb.processingClose();
			});
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
			var fone = $('#fone').val().replace(/[^0-9]/gi, '');
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !sigla ) erro.push( 'Sigla' );
			if ( !idInstituicao ) erro.push( 'Id da Instituicao' );
			if ( !fone ) erro.push( 'Telefone' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadCentro',
									'nome':nome,
									'sigla':sigla,
									'idInstituicao':idInstituicao,
									'fone':fone
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.centro.cadastra( params );
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
	},
	departamento: {
		valida: function() {
			var erro = [];
			var nome = $('#nome').val();
			var sigla = $('#sigla').val();
			var idCentro = $('#idCentro').val();
			var fone = $('#fone').val().replace(/[^0-9]/gi, '');
			
			if ( !nome ) erro.push( 'Nome' );
			if ( !sigla ) erro.push( 'Sigla' );
			if ( !idCentro ) erro.push( 'Id do Centro' );
			if ( !fone ) erro.push( 'Telefone' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadDepartamento',
									'nome':nome,
									'sigla':sigla,
									'idCentro':idCentro,
									'fone':fone
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.departamento.cadastra( params );
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
					$("#cadDepartamento").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Departamento' );
				} else {
					var msg = 'Erro ao cadastrar Departamento.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	tipoAfastamento: {
		valida: function() {
			var erro = [];
			var descricao = $('#descricao').val();
			
			if ( !descricao ) erro.push( 'Descricao' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadTipoAfastamento',
									'descricao':descricao
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.tipoAfastamento.cadastra( params );
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
					$("#cadTipoAfastamento").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Departamento' );
				} else {
					var msg = 'Erro ao cadastrar Departamento.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	tipoTitulacao: {
		valida: function() {
			var erro = [];
			var descricao = $('#descricao').val();
			
			if ( !descricao ) erro.push( 'Descricao' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadTipoTitulacao',
									'descricao':descricao
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.tipoTitulacao.cadastra( params );
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
					$("#cadTipoTitulacao").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Titulacao' );
				} else {
					var msg = 'Erro ao cadastrar Titulacao.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	categoriaFuncional: {
		valida: function() {
			var erro = [];
			var descricao = $('#descricao').val();
			
			if ( !descricao ) erro.push( 'Descricao' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadCategoriaFuncional',
									'descricao':descricao
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.categoriaFuncional.cadastra( params );
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
					$("#cadCategoriaFuncional").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Categoria Funcional' );
				} else {
					var msg = 'Erro ao cadastrar Categoria Funcional.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
	regimeTrabalho: {
		valida: function() {
			var erro = [];
			var descricao = $('#descricao').val();
			var quantidadeHoras = parseInt( $('#quantidadeHoras').val(), 10 ); // 10 base
			var dedicacaoExclusiva = $('input[name=dedicacaoExclusiva]:checked').val() || 0;
			
			if ( !descricao ) erro.push( 'Descricao' );
			if ( !quantidadeHoras ) erro.push( 'Quantidade de Horas' );
			if ( !dedicacaoExclusiva ) erro.push( 'Dedicacao Exclusiva' );
			
			if ( erro.length == 0 ) {
				var params =	{	'action':'cadRegimeTrabalho',
									'descricao':descricao,
									'quantidadeHoras':quantidadeHoras,
									'dedicacaoExclusiva':dedicacaoExclusiva
								};
				$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							cadastros.regimeTrabalho.cadastra( params );
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
					$("#cadRegimeTrabalho").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Categoria Funcional' );
				} else {
					var msg = 'Erro ao cadastrar Categoria Funcional.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Erro' );
				}
			}, "json" );
		}
	},
};