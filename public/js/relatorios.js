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
						$('.escolherDiretorCentro').click(function() {
							$(this).parent().parent().next().toggle();
						});
						$('.multiSelectProfessor').multiSelectProfessor({
							idCentro: "idCentro1",
							idDepartamento: "idDepartamento1",
							idProfessor: "idProfessor1"
						});
						$('#definirAtualDiretor').button().click(function() {
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
					$('#chefesDepartamentos').load("app/frontController.php", params);
				}).change();
				gb.processingClose();
			});
		});
		$("#relatorioGeralProfessor").click(function() {
			gb.processing();
			var params = { "action":"relatorioGeralProfessor" };
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
	}
};