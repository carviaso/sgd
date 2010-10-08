var gb = {
	processing: function() {
//		$.blockUI({message:'<h4><img src="public/css/images/busy.gif" /> Carregando...</h4>'});
		//$.blockUI({ message: 'teste', css: { border = '5px solid red' } });
		$.blockUI({ message: 'Carregando...', overlayCSS: { opacity: '0' } });
		//$.blockUI({ message: 'teste' });

//		{
//	        padding:        0,
//	        margin:         0,
//	        width:          '30%',
//	        top:            '40%',
//	        left:           '35%',
//	        textAlign:      'center',
//	        color:          '#000',
//	        border:         '3px solid #aaa',
//	        backgroundColor:'#fff',
//	        cursor:         'wait'
//	    }
	},
	processingClose: function() {
//		setTimeout($.unblockUI, 850);
		$.unblockUI();
	},
	message: function( msgTxt, title, options ) {
		$("<div class='gbMessage'>" + msgTxt + "</div>").dialog({
			title: title,
			modal: true,
			buttons: {
				Fechar: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				$('.gbMessage').remove();
			}
		}).dialog( options );
	},
	errorMessage: function( msgTxt, title ) {
		var msg = [];
		msg.push( '<div class="ui-widget">' );
		msg.push( '<div style="padding: 0pt 0.7em;" class="ui-state-error ui-corner-all">' );
		msg.push( '<p><span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-alert"></span>' );
		msg.push( '<strong><br /></strong>' + msgTxt + '</p>' );
		msg.push( '</div>' );
		msg.push( '</div>' );
		$("<div>" + msg.join( '' ) + "</div>").dialog({
			title: title,
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				$('.errorMessage').remove();
			}
		});
	},
	highlightMessage: function( msgTxt, title ) {
		var msg = [];
		msg.push( '<div class="ui-widget">' );
		msg.push( '<div style="margin-top: 20px; padding: 0pt 0.7em;" class="ui-state-highlight ui-corner-all">' );
		msg.push( '<p><span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-info"></span>' );
		msg.push( '<strong><br /></strong>' + msgTxt + '</p>' );
		msg.push( '</div>' );
		msg.push( '</div>' );
		$("<div>" + msg.join( '' ) + "</div>").dialog({
			title: title,
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				$('.errorMessage').remove();
			}
		});
	}
};