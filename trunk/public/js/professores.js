var professores = {
	loadMenu: function() {
		$("#cadProfessor").click(function() {
			gb.processing();
			var params = { "action":"printFormCadProfessor" };
			$('#content').html('').load("app/frontController.php", params, function() {
				$("#dataNascimento, #dataAdmissao, #dataAdmissaoUfsc, #dataPrevistaAposentadoria, #dataEfetivaAposentadoria")
					.mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarProfessor").button().click(function() {
					professores.valida();
				});
				$("#radio").buttonset();
				$('#content select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#cadRegimeTrabalhoProfessor").click(function() {
			gb.processing();
			var params = { "action":"printFormCadRegTrabProfessor" };
			$('#content').html('').load("app/frontController.php", params, function() {
				$("#dataInicio").mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarRegimeTrabalho").button().click(function() {
					professores.regimeTrabalho.valida();
				});
				$('#content select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#cadAfastamentoProfessor").click(function() {
			gb.processing();
			var params = { "action":"printFormCadAfastamentoProfessor" };
			$('#content').html('').load("app/frontController.php", params, function() {
				$('#content select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				$("#radio").buttonset();
				$("#dataInicio, #dataPrevisaoTermino").mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$('#dataInicio, #dataPrevisaoTermino').change(function() {
					var dataInicio = $('#dataInicio').val();
					var dataPrevisaoTermino = $('#dataPrevisaoTermino').val();
					if ( dataInicio && dataPrevisaoTermino ) {
						var params = {	'action':'dataDiff',
								 		'dataInicio':dataInicio,
								 		'dataPrevisaoTermino':dataPrevisaoTermino
									};
						$.post("app/frontController.php", params, function( response ) {
							$('.mesesDuracao').html( 'Afastamento com duracao de ' + response.meses + ' mes(es)' );
						}, "json" );
					}
				});
				$("#cadastrarAfastamentoProfessor").button().click(function() {
					professores.afastamentoProfessor.valida();
				});
				gb.processingClose();
			});
		});
		$("#cadProgressaoFuncionalProfessor").click(function() {
			gb.processing();
			var params = { "action":"printFormCadProgFuncProfessor" };
			$('#content').html('').load("app/frontController.php", params, function() {
				$("#dataInicio, #dataAvaliacao").mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarProgressaoFuncionalProfessor").button().click(function() {
					professores.progressaoFuncionalProfessor.valida();
				});
				$('#content.select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
	},
	valida: function() {
		var erro = [];
		var nome = $('#nome').val();
		var dataNascimento = $('#dataNascimento').val();
		var matricula = $('#matricula').val();
		var siape = $('#siape').val();
		var dataAdmissao = $('#dataAdmissao').val();
		var dataAdmissaoUfsc = $('#dataAdmissaoUfsc').val();
		var aposentado = $('input[name=aposentado]:checked').val() || 0;
		var dataPrevistaAposentadoria = $('#dataPrevistaAposentadoria').val();
		var dataEfetivaAposentadoria = $('#dataEfetivaAposentadoria').val();
		var idDepartamento = $('#departamento option:selected').val();
		var idCategoriaFuncionalInicial = $('#categoriaFuncionalInicial option:selected').val();
		var idCategoriaFuncionalAtual = $('#categoriaFuncionalAtual option:selected').val();
		var idTipoTitulacao = $('#titulacao option:selected').val();
		var idCategoriaFuncionalReferencia = $('#categoriaFuncionalReferencia option:selected').val();
		var idCargo = $('#cargo option:selected').val();
		var idSituacao = $('#situacao option:selected').val();
		
		if ( !nome ) erro.push( 'Nome' );
		if ( !dataNascimento ) erro.push( 'Data de nascimento' );
		if ( !matricula ) erro.push( 'Matricula' );
		if ( !siape ) erro.push( 'Siape' );
		if ( !dataAdmissao ) erro.push( 'Data de admissao' );
		if ( !dataAdmissaoUfsc ) erro.push( 'Data de admissao na UFSC' );
		if ( !aposentado ) erro.push( 'Aposentado' );
		if ( !dataPrevistaAposentadoria ) erro.push( 'Data prevista aposentadoria' );
		if ( !dataEfetivaAposentadoria ) erro.push( 'Data efetiva aposentadoria' );
		
		if ( erro.length == 0 ) {
			var params = {	'action':'cadProfessor',
							'nome':nome,
							'dataNascimento':dataNascimento,
							'matricula':matricula,
							'siape':siape,
							'dataAdmissao':dataAdmissao,
							'dataAdmissaoUfsc':dataAdmissaoUfsc,
							'aposentado':aposentado,
							'dataPrevistaAposentadoria':dataPrevistaAposentadoria,
							'dataEfetivaAposentadoria':dataEfetivaAposentadoria,
							'idDepartamento':idDepartamento,
							'idCategoriaFuncionalInicial':idCategoriaFuncionalInicial,
							'idCategoriaFuncionalAtual':idCategoriaFuncionalAtual,
							'idTipoTitulacao':idTipoTitulacao,
							'idCategoriaFuncionalReferencia':idCategoriaFuncionalReferencia,
							'idCargo':idCargo,
							'idSituacao':idSituacao
						};
			$("<div class='dialogConfirm'>Deseja realmente realizar o cadastro?</div>").dialog({
				height:140,
				modal: true,
				buttons: {
					'Sim': function() {
						professores.cadastrar( params );
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
	cadastrar: function( params ) {
		$.post("app/frontController.php", params, function( response ) {
			if ( response.result == 1 ) {
				$("#cadProfessor").click();
				var msg = 'Cadastro realizado com sucesso.';
				gb.message( msg, 'Cadastro de Professor' );
			} else {
				var msg = 'Erro ao cadastrar professor.<br /><br />' + response.error;
				gb.errorMessage( msg, 'Erro' );
			}
		}, "json" );
	},
	regimeTrabalho: {
		valida: function() {
			var erro = [];
			var idProfessor = $('#idProfessor option:selected').val();
			var idRegimeTrabalho = $('#idRegimeTrabalho option:selected').val();
			var processo = $('#processo').val();
			var deliberacao = $('#deliberacao').val();
			var portaria = $('#portaria').val();
			var dataInicio = $('#dataInicio').val();
			
			if ( !processo ) erro.push( 'Processo' );
			if ( !deliberacao ) erro.push( 'Deliberacao' );
			if ( !portaria ) erro.push( 'Portaria' );
			if ( !dataInicio ) erro.push( 'Data de Inicio' );
		
			if ( erro.length == 0 ) {
				var params = {	'action':'cadRegimeTrabalhoProfessor',
						 		'idProfessor':idProfessor,
								'idRegimeTrabalho':idRegimeTrabalho,
								'processo':processo,
								'deliberacao':deliberacao,
								'portaria':portaria,
								'dataInicio':dataInicio
							};
				$("<div class='dialog-confirm'>Deseja realmente cadastrar o regime de trabalho?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							professores.regimeTrabalho.cadastrar( params );
							$(this).dialog('close');
						},
						'N\u00E3o': function() {
							$(this).dialog('close');
						}
					},
					close: function() {
						$('.gbMessage').remove();
					}
				});
			} else {
				var msg = [];
				msg.push( 'Verifique os seguintes campos:<br /><br />' );
				msg.push( erro.join( '<br />' ) );
				gb.highlightMessage( msg.join(''), 'Erro' );
			}
		},	
		cadastrar: function( params ) {
			$.post("app/frontController.php", params, function( response ) {
				if ( response.result == 1 ) {
					$("#cadRegimeTrabalhoProfessor").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Regime de Trabalho do Professor' );
				} else {
					var msg = 'Erro ao cadastrar regime de trabalho do professor.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Cadastro de Regime de Trabalho do Professor' );
				}
			}, "json" );
		}
	},
	afastamentoProfessor: {
		valida: function() {
			var erro = [];
			var idProfessor = $('#idProfessor option:selected').val();
			var idInstituicao = $('#idInstituicao option:selected').val();
			var idTipoAfastamento = $('#idTipoAfastamento option:selected').val();
			var idTipoTitulacao = $('#idTipoTitulacao').val();
			var dataInicio = $('#dataInicio').val();
			var dataPrevisaoTermino = $('#dataPrevisaoTermino').val();
			var processo = $('#processo').val();
			var prorrogacao = $('input[name=prorrogacao]:checked').val() || 0;
			var observacao = $('#observacao').val();
			
			if ( !idProfessor ) erro.push( 'Professor' );
			if ( !idInstituicao ) erro.push( 'Instituicao' );
			if ( !idTipoAfastamento ) erro.push( 'Tipo de Afastamento' );
			if ( !idTipoTitulacao ) erro.push( 'Titulacao' );
			if ( !dataInicio ) erro.push( 'Data de Inicio' );
			if ( !dataPrevisaoTermino ) erro.push( 'Data de Previsao de Termino' );
			if ( !processo ) erro.push( 'Processo' );
			if ( !prorrogacao ) erro.push( 'Prorrogacao' );
		
			if ( erro.length == 0 ) {
				var params = {	'action':'cadAfastamentoProfessor',
						 		'idProfessor':idProfessor,
						 		'idInstituicao':idInstituicao,
						 		'idTipoAfastamento':idTipoAfastamento,
								'idTipoTitulacao':idTipoTitulacao,
								'dataInicio':dataInicio,
								'dataPrevisaoTermino':dataPrevisaoTermino,
								'processo':processo,
								'prorrogacao':prorrogacao,
								'observacao':observacao
							};
				$("<div class='dialog-confirm'>Deseja realmente cadastrar o regime de trabalho?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							professores.afastamentoProfessor.cadastrar( params );
							$(this).dialog('close');
						},
						'N\u00E3o': function() {
							$(this).dialog('close');
						}
					},
					close: function() {
						$('.gbMessage').remove();
					}
				});
			} else {
				var msg = [];
				msg.push( 'Verifique os seguintes campos:<br /><br />' );
				msg.push( erro.join( '<br />' ) );
				gb.highlightMessage( msg.join(''), 'Erro' );
			}
		},	
		cadastrar: function( params ) {
			$.post("app/frontController.php", params, function( response ) {
				if ( response.result == 1 ) {
					$("#cadAfastamentoProfessor").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Afastamento de Professor' );
				} else {
					var msg = 'Erro ao cadastrar Afastamento de Professor.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Cadastro de Afastamento de Professor' );
				}
			}, "json" );
		}
	},
	progressaoFuncionalProfessor: {
		valida: function() {
			var erro = [];
			var idProfessor = $('#idProfessor option:selected').val();
			var idCategoriaFuncional = $('#idCategoriaFuncional option:selected').val();
			var processo = $('#processo').val();
			var dataAvaliacao = $('#dataAvaliacao').val();
			var notaAvaliacao = $('#notaAvaliacao').val();
			var dataInicio = $('#dataInicio').val();
			var portaria = $('#portaria').val();
			
			if ( !idProfessor ) erro.push( 'Professor' );
			if ( !idCategoriaFuncional ) erro.push( 'Categoria Funcional' );
			if ( !processo ) erro.push( 'Processo' );
			if ( !dataAvaliacao ) erro.push( 'Data de Avaliacao' );
			if ( !notaAvaliacao ) erro.push( 'Nota Avaliacao' );
			if ( !dataInicio ) erro.push( 'Data de Inicio' );
			if ( !portaria ) erro.push( 'Portaria' );
		
			if ( erro.length == 0 ) {
				var params = {	'action':'cadProgFuncProfessor',
								'idProfessor':idProfessor,
								'idCategoriaFuncional':idCategoriaFuncional,
								'processo':processo,
								'dataAvaliacao':dataAvaliacao,
								'notaAvaliacao':notaAvaliacao,
								'dataInicio':dataInicio,
								'portaria':portaria
							};
				$("<div class='dialog-confirm'>Deseja realmente cadastrar a progressao Funcional?</div>").dialog({
					height:140,
					modal: true,
					buttons: {
						'Sim': function() {
							professores.progressaoFuncionalProfessor.cadastrar( params );
							$(this).dialog('close');
						},
						'N\u00E3o': function() {
							$(this).dialog('close');
						}
					},
					close: function() {
						$('.gbMessage').remove();
					}
				});
			} else {
				var msg = [];
				msg.push( 'Verifique os seguintes campos:<br /><br />' );
				msg.push( erro.join( '<br />' ) );
				gb.highlightMessage( msg.join(''), 'Erro' );
			}
		},
		cadastrar: function( params ) {
			$.post("app/frontController.php", params, function( response ) {
				if ( response.result == 1 ) {
					$("#cadProgressaoFuncionalProfessor").click();
					var msg = 'Cadastro realizado com sucesso.';
					gb.message( msg, 'Cadastro de Progressao Funcional de Professor' );
				} else {
					var msg = 'Erro ao cadastrar Afastamento de Professor.<br /><br />' + response.error;
					gb.errorMessage( msg, 'Cadastro de Progressao Funcional de Professor' );
				}
			}, "json" );
		},
		mostraDetalhesProfessor: function( idProfessor ) {
			var params = {	'action':'mostraDetalhesProfessor',
							'idProfessor':idProfessor
						};
			$('#auxiliarOculta').hide().load("app/frontController.php", params, function() {
				gb.message( $('#auxiliarOculta').html(), 'Detalhes do Professor', {"width":600, "position": 'center'} );
			});
		},
		mostraProgressaoFuncional: function( idProfessor ) {
			var params = {	'action':'mostraProgressaoFuncional',
							'idProfessor':idProfessor
						};
			$('#auxiliarOculta').hide().load("app/frontController.php", params, function() {
				gb.message( $('#auxiliarOculta').html(), 'Progress\u00E3o Funcional do Professor', {"width":600, "height":400, "position": 'center'} );
			});
		}
	}
};