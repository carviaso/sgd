var professores = {
	loadMenu: function() {
		$("#cadProfessor").click(function() {
			gb.processing();
			var params = { "action":"printFormCadProfessor" };
			$('#content').load("app/frontController.php", params, function() {
				$("#dataNascimento, #dataAdmissao, #dataAdmissaoUfsc, #dataPrevistaAposentadoria, #dataEfetivaAposentadoria")
					.mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarProfessor").button().click(function() {
					professores.valida();
				});
				$("#radio").buttonset();
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			} );
		});
		$("#cadRegimeTrabalhoProfessor").click(function() {
			gb.processing();
			var params = { "action":"printFormCadRegTrabProfessor" };
			$('#content').load("app/frontController.php", params, function() {
				$("#dataInicio").mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarRegimeTrabalho").button().click(function() {
					professores.regimeTrabalho.valida();
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			} );
		});
		$("#cadAfastamentoProfessor").click(function() {
			$('#content').load('app/cad/afastamentoProfessor.php');
		});
		$("#cadProgressaoFuncionalProfessor").click(function() {
			$('#content').load('app/cad/progressaoFuncionalProfessor.php');
		});
		$("#listarProfessores").click(function() {
			
			var params = { "action":"listarProfessores" };
			$('#content').load("app/frontController.php", params, function() {
				alert('listagem completa');
			} );
		});
	},
	valida: function() {
		var erro = [];
		var nome = $('#nome').val();
		var sobrenome = $('#sobrenome').val();
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
		if ( !sobrenome ) erro.push( 'Sobrenome' );
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
							'sobrenome':sobrenome,
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
	}	
};