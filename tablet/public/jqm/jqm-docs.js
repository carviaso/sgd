$( document ).bind( "mobileinit", function() {
	
	$.mobile.loadingMessageTextVisible = true;	
	$.mobile.loadingMessage = "Carregando...";
	$.mobile.pageLoadErrorMessage = "Erro ao carregar a página";

//	$.mobile.page.prototype.options.domCache = true;
	
//	$.mobile.defaultPageTransition = 'none';
});

var initGlobal = function() {
	var param = '';
	var habilitar_relator = false;
	var habilitar_requerente = false;
	var relator_nome = '';
	var relator_id = '';
	var requerente_nome = '';
	var requerente_id = '';
	var page_referencia = null;

	setPageReferencia = function(p){this.page_referencia = p;};
	getPageReferencia = function(){return this.page_referencia;};
	
	setParametro = function(p) {
		if(p == '' || p == undefined) {
			p = '';
		}
		this.param = p;
	};
	getParametro = function() {
		return this.param;
	};
	setNomeRelator = function(p){this.relator_nome = p;};
	getNomeRelator = function(){return this.relator_nome;};
	setIdRelator = function(p){this.relator_id = p;};
	getIdRelator = function(){return this.relator_id;};
	
	setHabilitarRelator = function(p){this.habilitar_relator = p;};
	isHabilitarRelator = function(){return this.habilitar_relator;};

	setNomeRequerente = function(p){this.requerente_nome = p;};
	getNomeRequerente = function(){return this.requerente_nome;};
	setIdRequerente = function(p){this.requerente_id = p;};
	getIdRequerente = function(){return this.requerente_id;};
	
	setHabilitarRequerente = function(p){this.habilitar_requerente = p;};
	isHabilitarRequerente = function(){return this.habilitar_requerente;};
	
}
initGlobal();

var destino = '';


$("#edit-processo-simplificado").live('pageshow', function(event) {
	destino = 'edit_processo_simplificado.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	
});

$("#edit-processo").live('pageshow', function(event) {
	destino = 'edit_processo.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	
	$(".ui-page-active #numero_processo").mask("999999/9999-99");
	
});
$("#novo-processo").live('pageshow', function(event) {
	destino = 'novo_processo.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	$(".ui-page-active #numero_processo").mask("999999/9999-99");

});

$("#listar-processos").live('pageshow', function(event) {
	
	destino = 'listar_processos.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	
});

$("#edit-reuniao #btn-clique-upoad-excluir").live('click', function(){

	var $ata = $('.ui-page-active #nome-file-ata');
	
	var $btnDownload = $('.ui-page-active #btn-clique-upoad-download');
	
	if($ata.val() != '') {
		if( !confirm("A ata será excluída.\n\nVocê deseja prosseguir?") ) {
			return true;
		}
	}

	$('.ui-page-active #nome-file-ata').val('');
	
	$(".ui-page-active #file_ata").val('');
	var $btnUpload = $(".ui-page-active #btn-clique-upoad");
	
	$btnUpload.find('.ui-btn-text').html('Clique aqui para selecionar o arquivo');
	
	$btnDownload.hide();
	$(this).removeClass('ui-corner-right').hide();
	$btnUpload.addClass('ui-corner-right');
	
});

$("#edit-reuniao #file_ata").live('change', function(){

	var $btnUpload = $(".ui-page-active #btn-clique-upoad");
	$btnUpload.find('.ui-btn-text').html($(this).val());
	var $btnExcluir = $('.ui-page-active #btn-clique-upoad-excluir');
	if( !$btnExcluir.is(':visible') ) {
		$btnExcluir.addClass('ui-corner-right').show();
		$btnUpload.removeClass('ui-corner-right');
	}
	
});

$("#edit-reuniao #btn-clique-upoad").live('click', function(){
	
	$(".ui-page-active #file_ata").click();

//	$(".ui-page-active #btn-clique-upload").prev().html(file);
	
});

$("#nova-reuniao").live('pageshow', function(event) {
	
	destino = 'nova_reuniao.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	
});
$("#reuniao-listar-processos").live('pageshow', function(event) {
	
	destino = 'reuniao_listar_processos.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	
});

$("#edit-reuniao").live('pageshow', function(event) {
	
	$('#edit-reuniao #select-choice-status').bind( "change", function(event, ui) {
		  	if($(this).val() == '2') {
		  		$('#edit-reuniao #reuniao-div-motivo').slideDown();
		  	} else {
		  		$('#edit-reuniao #reuniao-div-motivo').slideUp();
		  	}
		});
	
});

$("#listar-reunioes").live('pageshow', function(event) {
	
	destino = 'listar_reunioes.php';
	setPageReferencia($('.ui-page-active').attr('id'));
	
});

$("#id-pagina-principal").live('pageinit', function(event) {
	

});
$("#id-pagina-principal").live('pagebeforeshow', function(event) {
	
	$('#siape-login').val('');
	$('#senha-login').val('');

});
/*
//set up the theme switcher on the homepage
$('div').live('pagecreate',function(event){
	if( !$(this).is('.ui-dialog')){
		var appendEl = $(this).find('.ui-footer:last');

		if( !appendEl.length ){
			appendEl = $(this).find('.ui-content');
		}

		if( appendEl.is("[data-position]") ){
			return;
		}

		$('<a href="#themeswitcher" data-'+ $.mobile.ns +'rel="dialog" data-'+ $.mobile.ns +'transition="pop">Switch theme</a>')
			.buttonMarkup({
				'icon':'gear',
				'inline': true,
				'shadow': false,
				'theme': 'd'
			})
			.appendTo( appendEl )
			.wrap('<div class="jqm-themeswitcher">')
			.bind( "vclick", function(){
				$.themeswitcher();
			});
	}
});


//collapse page navs after use
$(function(){
	$('body').delegate('.content-menu .ui-collapsible-content', 'click',  function(){
		$(this).trigger("collapse");
	});
});

function setDefaultTransition(){
	var winwidth = $( window ).width(),
		trans ="slide";

	if( winwidth >= 1000 ){
		trans = "none";
	}
	else if( winwidth >= 650 ){
		trans = "fade";
	}

	$.mobile.defaultPageTransition = trans;
}


$(function(){
	setDefaultTransition();
	$( window ).bind( "throttledresize", setDefaultTransition );
});


// Turn off AJAX for local file browsing
if ( location.protocol.substr(0,4)  === 'file' ||
     location.protocol.substr(0,11) === '*-extension' ||
     location.protocol.substr(0,6)  === 'widget' ) {

  // Start with links with only the trailing slash and that aren't external links
  var fixLinks = function() {
    $( "a[href$='/'], a[href='.'], a[href='..']" ).not( "[rel='external']" ).each( function() {
      this.href = $( this ).attr( "href" ).replace( /\/$/, "" ) + "/index.html";
    });
  };

  // fix the links for the initial page
  $(fixLinks);

  // fix the links for subsequent ajax page loads
  $(document).bind( 'pagecreate', fixLinks );

  // Check to see if ajax can be used. This does a quick ajax request and blocks the page until its done
  $.ajax({
    url: '.',
    async: false,
    isLocal: true
  }).error(function() {
    // Ajax doesn't work so turn it off
    $( document ).bind( "mobileinit", function() {
      $.mobile.ajaxEnabled = false;

      var message = $( '<div>' , {
        'class': "ui-footer ui-bar-e",
        style: "overflow: auto; padding:10px 15px;",
        'data-ajax-warning': true
      });

      message
        .append( "<h3>Note: Navigation may not work if viewed locally</h3>" )
        .append( "<p>The AJAX-based navigation used throughout the jQuery Mobile docs may need to be viewed on a web server to work in certain browsers. If you see an error message when you click a link, try a different browser or <a href='https://github.com/jquery/jquery-mobile/wiki/Downloadable-Docs-Help'>view help</a>.</p>" );

      $( document ).bind( "pagecreate", function( event ) {
        $( event.target ).append( message );
      });
    });
  });
}
 */