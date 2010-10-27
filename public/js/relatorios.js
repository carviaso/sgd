var relatorios = {
	loadMenu: function() {
		$("#relCentros").click(function() {
			gb.processing();
			var params = { "action":"relCentros" };
			$('#content').load("app/frontController.php", params, function(){
				gb.processingClose();
			});
		});
		$("#relDepartamentos").click(function() {
			gb.processing();
			var params = { "action":"relDepartamentos" };
			$('#content').load("app/frontController.php", params, function(){
				gb.processingClose();
			} );
		});
		$("#relDiretoresCentros").click(function() {
			gb.processing();
			var params = { "action":"relDiretoresCentros" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"relDiretorPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/frontController.php", params, function() {
						$('.escolherDiretorCentro, .escolherViceDiretorCentro, .escolherSecretarioCentro').click(function() {
							$(this).parent().parent().next().toggle();
						});
						$('#definirAtualDiretor').button().click(function() {
							relatorios.definirAtualDiretor( idCentro );
						});
						$('.multiSelectProfessor:eq(0)').multiSelectProfessor({
							idCentro: "idCentro1",
							idDepartamento: "idDepartamento1",
							idProfessor: "idProfessor1"
						});
						$('#definirAtualViceDiretor').button().click(function() {
							relatorios.definirAtualViceDiretor( idCentro );
						});
						$('.multiSelectProfessor:eq(1)').multiSelectProfessor({
							idCentro: "idCentro2",
							idDepartamento: "idDepartamento2",
							idProfessor: "idProfessor2"
						});
						$('#definirAtualSecretario').button().click(function() {
							relatorios.definirAtualSecretario( idCentro );
						});
						$('.multiSelectProfessor:eq(2)').multiSelectProfessor({
							idCentro: "idCentro3",
							idDepartamento: "idDepartamento3",
							idProfessor: "idProfessor3"
						});
					});
				}).change();
				gb.processingClose();
			});
		}); 
		$("#relChefesDepartamento").click(function() {
			gb.processing();
			var params = { "action":"relChefesDepartamento" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectDepartamentos").change(function() {
					var idDepartamento = $(this).val();
					var params = { "action":"relChefesPorDepartamento", 'idDepartamento': idDepartamento };
					$('#chefesDepartamentos').load("app/frontController.php", params, function() {
						$('.escolherChefeDepartamento, .escolherSubChefeDepartamento, .escolherChefeExpediente').click(function() {
							$(this).parent().parent().next().toggle();
						});
						$('#definirAtualChefeDepartamento').button().click(function() {
							relatorios.definirAtualChefeDepartamento( idDepartamento );
						});
						$('.multiSelectProfessor:eq(0)').multiSelectProfessor({
							idCentro: "idCentro1",
							idDepartamento: "idDepartamento1",
							idProfessor: "idProfessor1"
						});
						$('#definirAtualSubChefeDepartamento').button().click(function() {
							relatorios.definirAtualSubChefeDepartamento( idDepartamento );
						});
						$('.multiSelectProfessor:eq(1)').multiSelectProfessor({
							idCentro: "idCentro2",
							idDepartamento: "idDepartamento2",
							idProfessor: "idProfessor2"
						});
						$('#definirAtualChefeExpediente').button().click(function() {
							relatorios.definirAtualChefeExpediente( idDepartamento );
						});
						$('.multiSelectProfessor:eq(2)').multiSelectProfessor({
							idCentro: "idCentro3",
							idDepartamento: "idDepartamento3",
							idProfessor: "idProfessor3"
						});
						
					});
				}).change();
				gb.processingClose();
			});
		});
		$("#relGeralProfessor").click(function() {
			gb.processing();
			var params = { "action":"relGeralProfessor" };
			$('#content').load("app/frontController.php", params, function() {
				$( "#professor" ).autocomplete({
					select: function( event, ui ) {
						$("#idProfessor").val( ui.item.idProfessor );
						relatorios.detalheGeralProfessor( $("#idProfessor").val() );
					},
					source: function( request, response ) {
						$.ajax({
							url: "app/frontController.php",
							dataType: "json",
							type: 'POST',
							data: {
								action:'findProfessorByName',
								nameParam: request.term
							},
							success: function( data ) {
								response ( data )
							}
						});
					},
				});
				gb.processingClose();
			});
		});
		$("#relatorioAfastamentoAposentadoria").click(function() {
			gb.processing();
			var params = { "action":"relatorioAfastamentoAposentadoria" };
			$('#content').load("app/frontController.php", params, function() {
//				$("#selectDepartamentos").change(function() {
//					var idDepartamento = $(this).val();
//					var params = {	"action":"relProfessoresPorDepartamento",
//									"idDepartamento":idDepartamento,
//									"filtro":"{\"tipo\":\"cargo\",\"params\":{\"idCargo\":[\"1,2\"]}}"
//								};
//					$('#professoresPorDepartamento').load("app/frontController.php", params);
//				}).change();
				gb.processingClose();
			});
		});
		$("#relProfessoresDepartamento").click(function() {
			gb.processing();
			var params = { "action":"relProfessoresDepartamento" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectDepartamentos").change(function() {
					var idDepartamento = $(this).val();
					var params = {	"action":"relProfessoresPorDepartamento",
									"idDepartamento":idDepartamento,
									"filtro":"{\"tipo\":\"cargo\",\"params\":{\"idCargo\":[\"1,2\"]}}"
								};
					$('#professoresPorDepartamento').load("app/frontController.php", params);
				}).change();
				gb.processingClose();
			});
		});
		$("#relDepartamentoCentro").click(function() {
			gb.processing();
			var params = { "action":"relDepartamentoCentro" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectCentros").change(function() {
					var idCentro = $(this).val();
					var params = { "action":"relDepartamentoPorCentro", 'idCentro': idCentro };
					$('#departamentosPorCentro').load("app/frontController.php", params);
				}).change();
				gb.processingClose();
			});
		});
		$("#listarProfessores").click(function() {
			gb.processing();
			var params = { "action":"listarProfessores" };
			$('#content').load("app/frontController.php", params, function() {
				$("#listaProfessores").jqGrid({url:'app/frontController.php',
					postData: {	"action":"getAllProfessoresJson",
								"filtro":"{\"tipo\":\"cargo\",\"params\":{\"idCargo\":[\"1,2\"]}}"},
					mtype: 'POST',
					datatype: "json",
					colNames:['Acao', 'Id', 'Nome', 'Matricula', 'Siape', 'Departamento' ],
					colModel:[	{name:'acao',index:'acao', width:80, search:false },
								{name:'id_professor',index:'p.id_professor', width:35 },
								{name:'nome',index:'p.nome', width:275 },
								{name:'matricula',index:'p.matricula', width:90 },
								{name:'siape',index:'p.siape', width:100 },
								{name:'Departamento',index:'d.sigla', width:50}
							],
					rowNum:50, rowList:[50,100,200],
					pager: '#pagerListaProfessores',
					sortname: 'id_professor',
					sortorder: "asc",
					viewrecords: true,
					shrinkToFit: false, // Exibir barra rolagem horizontal
					width:'600',
					height:'350',
					caption:"Relatorio de Professores",
					loadComplete: function() {
						$('.detalhesProfessor').click(function() {
							professores.progressaoFuncionalProfessor.mostraDetalhesProfessor( $(this).attr('id') );
						});
						$('.detalhesProgressaoFuncional').click(function() {
							professores.progressaoFuncionalProfessor.mostraProgressaoFuncional( $(this).attr('id') );
						});
						$('.imprimirFicha').click(function() {
							$.post("app/frontController.php", { 'action':'imprimirFicha', 'idProfessor':$(this).attr('id') }, function(data) {
								window.open("../sgd/tmp/cache/" + data.id + ".pdf", "_blank");
							}, 'json' );
						});
						gb.processingClose();
					}
				}).navGrid("#pagerListaProfessores", {
					refresh: true,
					edit: false,
					add: false,
					del: false,
					search: true }, {},{},{},
					{	multipleSearch: true,
						odata : ['igual', 'diferente', 'menor', 'menor ou igual','maior','maior ou igual', 'come\u00E7a com','n\u00E3o come\u00E7a com','est\u00E1 contido','n\u00E3o est\u00E1 contido','termina com','n\u00E3o termina com','cont\u00E9m','n\u00E3o cont\u00E9m'],
						groupOps: [ { op: 'AND', text: 'todos' }, { op: 'OR',  text: 'ou' }] });
			});
		});
	},
	detalheGeralProfessor: function( idProfessor ) {
		var params = {	"action":"detalheGeralProfessor",
						"idProfessor":idProfessor
					}
		$('#detalheGeralProfessor').load("app/frontController.php", params, function() {
			gb.processingClose();
		});
	},
	definirAtualDiretor: function( idCentro ) {
		var erro = [];
		var idProfessor = $('#idProfessor1').val();
		if ( idProfessor <= 0 ) erro.push( 'Professor' );
		
		if ( erro.length == 0 ) {
			var params = { "action":"definirAtualDiretor", 'idCentro': idCentro, 'idProfessor':idProfessor };
			$.post("app/frontController.php", params, function(data) {
				if ( data.result == 1 ) {
					$('#diretorCentro').html( $("#idProfessor1 option:selected").text() );
					gb.message( data.msg, 'Atualizacao Diretores' );
				} else {
					gb.message( data.msg, 'Atualizacao Diretores' );
				}
			}, 'json' );
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	},
	definirAtualViceDiretor: function( idCentro ) {
		var erro = [];
		var idProfessor = $('#idProfessor2').val();
		if ( idProfessor <= 0 ) erro.push( 'Professor' );
		
		if ( erro.length == 0 ) {
			var params = { "action":"definirAtualViceDiretor", 'idCentro': idCentro, 'idProfessor':idProfessor };
			$.post("app/frontController.php", params, function(data) {
				if ( data.result == 1 ) {
					$('#viceDiretorCentro').html( $("#idProfessor2 option:selected").text() );
					gb.message( data.msg, 'Atualizacao Vice-Diretores' );
				} else {
					gb.message( data.msg, 'Atualizacao Vice-Diretores' );
				}
			}, 'json' );
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	},
	definirAtualSecretario: function( idCentro ) {
		var erro = [];
		var idProfessor = $('#idProfessor3').val();
		if ( idProfessor <= 0 ) erro.push( 'Professor' );
		
		if ( erro.length == 0 ) {
			var params = { "action":"definirAtualSecretario", 'idCentro': idCentro, 'idProfessor':idProfessor };
			$.post("app/frontController.php", params, function(data) {
				if ( data.result == 1 ) {
					$('#secretarioCentro').html( $("#idProfessor3 option:selected").text() );
					gb.message( data.msg, 'Atualizacao Diretores' );
				} else {
					gb.message( data.msg, 'Atualizacao Diretores' );
				}
			}, 'json' );
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	},
	definirAtualChefeDepartamento: function( idDepartamento ) {
		var erro = [];
		var idProfessor = $('#idProfessor1').val();
		if ( idProfessor <= 0 ) erro.push( 'Professor' );
		
		if ( erro.length == 0 ) {
			var params = { "action":"definirAtualChefeDepartamento", 'idDepartamento': idDepartamento, 'idProfessor':idProfessor };
			$.post("app/frontController.php", params, function(data) {
				if ( data.result == 1 ) {
					$('#chefeDepartamento').html( $("#idProfessor1 option:selected").text() );
					gb.message( data.msg, 'Atualizacao de Chefe de Departamento' );
				} else {
					gb.message( data.msg, 'Atualizacao de Chefe de Departamento' );
				}
			}, 'json' );
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	},
	definirAtualSubChefeDepartamento: function( idDepartamento ) {
		var erro = [];
		var idProfessor = $('#idProfessor2').val();
		if ( idProfessor <= 0 ) erro.push( 'Professor' );
		
		if ( erro.length == 0 ) {
			var params = { "action":"definirAtualSubChefeDepartamento", 'idDepartamento': idDepartamento, 'idProfessor':idProfessor };
			$.post("app/frontController.php", params, function(data) {
				if ( data.result == 1 ) {
					$('#subChefeDepartamento').html( $("#idProfessor2 option:selected").text() );
					gb.message( data.msg, 'Atualizacao de Chefe de Departamento' );
				} else {
					gb.message( data.msg, 'Atualizacao de Chefe de Departamento' );
				}
			}, 'json' );
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	},
	definirAtualChefeExpediente: function( idDepartamento ) {
		var erro = [];
		var idProfessor = $('#idProfessor3').val();
		if ( idProfessor <= 0 ) erro.push( 'Professor' );
		
		if ( erro.length == 0 ) {
			var params = { "action":"definirAtualChefeExpediente", 'idDepartamento': idDepartamento, 'idProfessor':idProfessor };
			$.post("app/frontController.php", params, function(data) {
				if ( data.result == 1 ) {
					$('#chefeExpediente').html( $("#idProfessor3 option:selected").text() );
					gb.message( data.msg, 'Atualizacao de Chefe de Departamento' );
				} else {
					gb.message( data.msg, 'Atualizacao de Chefe de Departamento' );
				}
			}, 'json' );
		} else {
			var msg = [];
			msg.push( 'Verifique os seguintes campos:<br /><br />' );
			msg.push( erro.join( '<br />' ) );
			gb.highlightMessage( msg.join(''), 'Erro' );
		}
	}
};