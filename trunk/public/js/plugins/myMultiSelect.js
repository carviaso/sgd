$.fn.multiSelectProfessor = function(){

	// Seta as variáveis default
	var sDefaults = {
		labelCentro: "Centro",
		labelDepartamento: "Departamento",
		labelProfessor: "Professornn"
	}
	// Sobreescreve as opcoes locais
	var s = jQuery.extend(sDefaults, s);

	var selects = new Array();
	selects.push( '<div>' + s.labelCentro + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="idCentro"></select>' );
	selects.push( '<div>' + s.labelDepartamento + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="idDepartamento"></select>' );
	selects.push( '<div>' + s.labelProfessor + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="idProfessor"></select>' );
	this.html( selects.join('') );

	$("#idCentro").change(function() {
		var params = { "action":"getCentrosJson" };
		$.post("app/frontController.php", params, function( response ) {
			var centros = new Array();
			$.each(response, function(index, centro) {
				centros.push( '<option value="' + centro.idCentro + '">' + centro.nome + '</option>' );
				//centros.push( '<option>Abelardo Alves de Queiroz</option>' );
			});
			$('#idDepartamento').html( centros.join('') );
		}, "json" );
	}).change();
};