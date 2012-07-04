$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: {action: 'add-processo'},
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			$.mobile.changePage('listar_processos.php');
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			alert($.mobile.pageLoadErrorMessage);
		}
	});