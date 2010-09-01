professores = {
	loadMenu: function() {
		$("#cadProfessor").click(function() {
			var params = { "action":"printFormCadProfessor" };
			$('#content').load("app/dispatch.php", params, function() {
				$("#dataNascimento, #dataAdmissao, #dataAdmissaoUfsc, #dataPrevistaAposentadoria, #dataEfetivaAposentadoria")
					.mask('99/99/9999').datepicker($.datepicker.regional['pt-BR']);
				$("#cadastrarProfessor").button().click(function() {
					professores.cadastrar();
				});
				$("#radio").buttonset();
				$('select').selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
			} );
		});
		$("#cadRegimeTrabalhoProfessor").click(function() {
			var params = { "action":"printFormCadRegTrabProfessor" };
			$('#content').load("app/dispatch.php", params, function() {
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
	},
	cadastrar: function() {
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
		
		$.post("app/dispatch.php", params, function( response ) {
			if ( response.result == 1 ) {
				var msg = 'Cadastro realizado com sucesso.';
				$("#cadProfessor").click();
			} else {
				var msg = 'Erro ao cadastrar professor.';
			}
			$("<div class='cadastrarProfessor'>" + msg + "</div>").dialog({
				title: 'Cadastro de Professor',
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				},
				close: function() {
					$('.cadastrarProfessor').remove();
				}
			});
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
		
		$.post("app/dispatch.php", params, function( response ) {
			if ( response.result == 1 ) {
				var msg = 'Cadastro realizado com sucesso.';
			} else {
				var msg = 'Erro ao cadastrar regime de trabalho do professor.';
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