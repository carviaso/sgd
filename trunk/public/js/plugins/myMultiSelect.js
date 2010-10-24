$.fn.multiSelectProfessor = function(options){

	// Seta as variáveis default
	var sDefaults = {
		labelCentro: "Centro",
		labelDepartamento: "Departamento",
		labelProfessor: "Professor",
		idCentro: "idCentro",
		idDepartamento: "idDepartamento",
		idProfessor: "idProfessor"
	}
	// Sobreescreve as opcoes locais
	var options = jQuery.extend(sDefaults, options);

	var selects = new Array();
	selects.push( '<div>' + options.labelCentro + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="' + options.idCentro + '"></select>' );
	selects.push( '<div>' + options.labelDepartamento + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="' + options.idDepartamento + '"></select>' );
	selects.push( '<div>' + options.labelProfessor + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="' + options.idProfessor + '"></select>' );
	this.html( selects.join('') );

	$('#' + options.idCentro).html( '<option>Carregando...</option>' );
	var params = { "action":"getCentrosJson" };
	$.post("app/frontController.php", params, function( response ) {
		var centros = new Array();
		if( response.length > 0 ) {
			$.each(response, function(index, centro) {
				centros.push( '<option value="' + centro.idCentro + '">' + centro.nome + '</option>' );
			});
		} else {
			centros.push( '<option value="0">Nenhum centro encontrado</option>' );
		}
		$('#' + options.idCentro).html( centros.join('') ).change();
	}, "json" );

	$('#' + options.idCentro).change(function() {
		$('#' + options.idDepartamento).html( '<option>Carregando...</option>' );
		var params = {
				"action":"getDepartamentos",
				"returnType":"json",
				"filtro":"{\"tipo\":\"byIdCentro\",\"params\":{\"idCentro\":\"" + $('#' + options.idCentro).val() + "\"}}"
		};
		$.post("app/frontController.php", params, function( response ) {
			var departamentos = new Array();
			if( response.length > 0 ) {
				$.each(response, function(index, departamento) {
					departamentos.push( '<option value="' + departamento.idDepartamento + '">' + departamento.nome + '</option>' );
				});
			} else {
				departamentos.push( '<option value="0">Nenhum departamento encontrado</option>' );
			}
			$('#' + options.idDepartamento).html( departamentos.join('') ).change();
		}, "json" );
	});
	
	$('#' + options.idDepartamento).change(function() {
		$('#' + options.idProfessor).html( '<option>Carregando...</option>' );
		var params = {
				"action":"getAllProfessores",
				"returnType":"json",
				"filtro":"{\"tipo\":\"byIdDepartamento\",\"params\":{\"idDepartamento\":\"" + $('#' + options.idDepartamento).val() + "\"}}"
		};
		$.post("app/frontController.php", params, function( response ) {
			var professores = new Array();
			if( response.length > 0 ) {
				$.each(response, function(index, professor) {
					if ( professor.idCargo == 3 ) {
						professores.push( '<option value="' + professor.id_professor + '">' + professor.nome + ' - ' + professor.descricaoCargo + '</option>' );
					} else {
						professores.push( '<option value="' + professor.id_professor + '">' + professor.nome + '</option>' );
					}
				});
			} else {
				professores.push( '<option value="0">Nenhum professor encontrado</option>' );
			}
			$('#' + options.idProfessor).html( professores.join('') );
		}, "json" );
	});
};