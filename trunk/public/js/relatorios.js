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
					$('#departamentosPorCentro').load("app/frontController.php", params);
				}).selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#relProfessoresDepartamento").click(function() {
			gb.processing();
			var params = { "action":"relProfessoresDepartamento" };
			$('#content').load("app/frontController.php", params, function() {
				$("#selectDepartamentos").change(function() {
					var idDepartamento = $(this).val();
					var params = { "action":"relProfessoresPorDepartamento", 'idDepartamento': idDepartamento };
					$('#professoresPorDepartamento').load("app/frontController.php", params);
				}).selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
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
				}).selectmenu({width: '100%', menuWidth: 200, maxHeight: 150, style:'popup'});
				gb.processingClose();
			});
		});
		$("#listarProfessores").click(function() {
			gb.processing();
			var params = { "action":"listarProfessores" };
			$('#content').load("app/frontController.php", params, function() {

				$("#listaProfessores").jqGrid({url:'app/frontController.php',
								    mtype: 'POST',
								    datatype: "json",
									colNames:['Id', 'Nome', 'Matricula', 'Siape', 'Acao'],
									colModel:[	{name:'id_professor',index:'id_professor', width:35},
									          	{name:'nome',index:'nome', width:275},
									          	{name:'matricula',index:'matricula', width:90},
									          	{name:'siape',index:'siape', width:100},
									          	{name:'acao',index:'acao', width:100}	],
									rowNum:50, rowList:[50,100,200],
									pager: '#pagerListaProfessores',
									sortname: 'id_professor',
									viewrecords: true,
									sortorder: "asc",
									height:'350',
									caption:"Relatorio de Professores",
									postData: {'action':"getAllProfessoresJson"},
									loadComplete: function() {
										gb.processingClose();
										$('.detalhes').click(function() {
											alert('detalhes');
										});
										$('.progressaoFuncional').click(function() {
											alert('Progressao Funcional');
										});
									}
				});
				$("#listaProfessores").jqGrid('navGrid','#pagerListaProfessores',{edit:false,add:false,del:false});
			} );
		});
	}
};