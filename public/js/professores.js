professores = {
	loadMenu: function() {
		$("#cadProfessor").click(function() {
			var params = { "action":"printFormCadProfessor" };
			$('#content').load("app/frontController.php", params, function() {
				$("#dataNascimento, #dataAdmissao, #dataAdmissaoUfsc, #dataPrevistaAposentadoria, #dataEfetivaAposentadoria")
					.mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarProfessor").button().click(function() {
					professores.valida();
				});
				$("#radio").buttonset();
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
			} );
		});
		$("#cadRegimeTrabalhoProfessor").click(function() {
			var params = { "action":"printFormCadRegTrabProfessor" };
			$('#content').load("app/frontController.php", params, function() {
				$("#dataInicio").mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarRegimeTrabalho").button().click(function() {
					professores.cadastrarRegimeTrabalho();
				});
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
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
			professores.cadastrar( params );
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
			} else {
				var msg = 'Erro ao cadastrar professor. Erro: ' + response.error;
			}
			gb.errorMessage( msg, 'Erro' );
		}, "json" );
	},
	cadastrarRegimeTrabalho: function() {
		var idProfessor = $('#idProfessor option:selected').val();
		var idRegimeTrabalho = $('#idRegimeTrabalho option:selected').val();
		var processo = $('#processo').val();
		var deliberacao = $('#deliberacao').val();
		var portaria = $('#portaria').val();
		var dataInicio = $('#dataInicio').val();
		var params = {	'action':'cadRegimeTrabalhoProfessor',
				 		'idProfessor':idProfessor,
						'idRegimeTrabalho':idRegimeTrabalho,
						'processo':processo,
						'deliberacao':deliberacao,
						'portaria':portaria,
						'dataInicio':dataInicio
					};
		
		$.post("app/frontController.php", params, function( response ) {
			if ( response.result == 1 ) {
				$("#cadRegimeTrabalhoProfessor").click();
				var msg = 'Cadastro realizado com sucesso.';
			} else {
				var msg = 'Erro ao cadastrar regime de trabalho do professor. Erro: ' + response.error;
			}
			$("<div class='cadastrarRegimeTrabalhoProfessor'>" + msg + "</div>").dialog({
				title: 'Cadastro de Regime de Trabalho do Professor',
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				},
				close: function() {
					$('.cadastrarRegimeTrabalhoProfessor').remove();
				}
			});
		}, "json" );
	}
};