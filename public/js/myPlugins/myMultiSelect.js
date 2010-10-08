// Indica que está sendo criado um plugin
jQuery.fn.extend({
	// Indica o nome do plugin que será criado
	multiSelectProfessor: function(options){
		//seta as variáveis default
		
		//var sDefaults = {
        //    cor: "blue",
        //    fonte: "black"
		//}
 
	alert(options.html());
		//função do jquery que substitui os parametros que não foram informados pelos defaults
		
		//var options = jQuery.extend(sDefaults, options);
 
		 //atribui a cor passada por parametro ao objeto
		//this.css({"backgroundColor": options.cor, "color": options.fonte});
	
	this.css({"backgroundColor": "blue", "color": "yellow"});
	}
});