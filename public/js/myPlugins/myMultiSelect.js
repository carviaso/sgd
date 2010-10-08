// Indica que está sendo criado um plugin
jQuery.fn.extend({
	// Indica o nome do plugin que será criado
	multiSelectProfessor: function(s) {
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
	selects.push( '<select class="select ui-corner-all width100" id="msmIdCentror"></select>' );
	selects.push( '<div>' + s.labelDepartamento + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="idProfessor">' );
	selects.push( '<option value="1">Fernando</option>' );
	selects.push( '<option value="230">Abelardo Alves de Queiroz</option>' );
	selects.push( '<option value="196">Adelamar Ferreira Novais</option>' );
	selects.push( '</select>' );
	selects.push( '<div>' + s.labelProfessor + '</div>' );
	selects.push( '<select class="select ui-corner-all width100" id="idProfessor">' );
	selects.push( '<option value="1">Fernando</option>' );
	selects.push( '<option value="230">Abelardo Alves de Queiroz</option>' );
	selects.push( '<option value="196">Adelamar Ferreira Novais</option>' );
	selects.push( '</select>' );
	this.html( selects.join('') );
	
	$("#msmIdCentror").load(function() {
		var params = { "action":"getCentrosJson" };
		$.post("app/frontController.php", params, function( response ) {
			var centros = new Array();
			$.each(response, function(index, centro) { 
				centros.push( '<option value="' + centro.idCentro + '">' + centro.nome + '</option>' );
			});
			$('#msmIdCentror').html( centros.join('') );
		}, "json" );
	}).change(function(){alert('OKK')});
	
	//$("#msmIdCentror").change();
	
//	m.html(m.labelCentro);
//	m.html(m.labelDepartamento);
//	m.html(m.labelProfessor);
//	m.html('8686868687575');
	
	
		//função do jquery que substitui os parametros que não foram informados pelos defaults
		
		//var options = jQuery.extend(sDefaults, options);
 
		 //atribui a cor passada por parametro ao objeto
		//this.css({"backgroundColor": options.cor, "color": options.fonte});
	
	//this.css({"backgroundColor": "blue", "color": "yellow"});
	}
});