// Indica que est� sendo criado um plugin
jQuery.fn.extend({
	// Indica o nome do plugin que ser� criado
	multiSelectProfessor: function(options){
		//seta as vari�veis default
		
		//var sDefaults = {
        //    cor: "blue",
        //    fonte: "black"
		//}
 
	alert(options.html());
		//fun��o do jquery que substitui os parametros que n�o foram informados pelos defaults
		
		//var options = jQuery.extend(sDefaults, options);
 
		 //atribui a cor passada por parametro ao objeto
		//this.css({"backgroundColor": options.cor, "color": options.fonte});
	
	this.css({"backgroundColor": "blue", "color": "yellow"});
	}
});