gb = {
	message: function( msgTxt, title ) {
		$("<div class='gbMessage'>" + msgTxt + "</div>").dialog({
			title: title,
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				$('.gbMessage').remove();
			}
		});		
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