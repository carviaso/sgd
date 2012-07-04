function btnCliqueUpload() {
	
//	$(".ui-page-active #file-ata").click();
	
//	var file = $(".ui-page-active #file-ata").val();

//	$(".ui-page-active #btn-clique-upload").prev().html(file);
	
}

function btnExcluirLimpar() {
	
//	$(".ui-page-active #file-ata").click();
	
	$(".ui-page-active #file-ata").val('');

	$(".ui-page-active #btn-clique-upload").prev().html('Clique aqui para carregar arquivo...');
	
}

function pautaPdf(idPauta) {
	
	location.href = "app/frontController.php?action=pdf-pauta&id_pauta="+idPauta;
//	window.open("app/frontController.php?action=pdf-pauta&id="+idPauta, '_blank'); 
	
	/*$.post("app/frontController.php", { 'action':'pdf-pauta', id_pauta:idPauta }, function(data) {
		if(data.status == '1') {
			window.open("../tmp/cache/" + data.file, "_blank");
		} else {
			
		}
	}, 'json' );*/

}


function reuniaoListarProcessos(idReuniao, idPauta, lista) {
	
	var pagina = 'reuniao_listar_processos.php?id_reuniao='+idReuniao+'&id_pauta='+idPauta+'&lista=' + lista;
	
	redirecionamento(pagina, {reloadPage: true});
	
}


/*
 * Listar pautas
 */

function limparListaPauta() {
	
	$('#listar-pautas #numero_pauta').val('');
	
}

function limparListaReuniao(){
	
	var selectstatus = $("#listar-reunioes select#select-filtro-reuniao-status");
	if(selectstatus.length > 0) {
		selectstatus[0].selectedIndex = 0;
		selectstatus.selectmenu("refresh");
	}
	
	$('#listar-reunioes #id_pauta_reuniao').val('');
	$('#listar-reunioes #numero_pauta_reuniao').empty();
	
	var s = $("#listar-reunioes select#select-filtro-reuniao-dia-i");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
	var s = $("#listar-reunioes select#select-filtro-reuniao-mes-i");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
	var s = $("#listar-reunioes select#select-filtro-reuniao-ano-i");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
	
	var s = $("#listar-reunioes select#select-filtro-reuniao-dia-f");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
	var s = $("#listar-reunioes select#select-filtro-reuniao-mes-f");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
	var s = $("#listar-reunioes select#select-filtro-reuniao-ano-f");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
}

/*
 * Listar Processos
 */

function limparListaProcesso() {
	
	/*
	 * Limpar todos os campos do filtro de ./listar_processos.php
	 */
	
	
	$('#numero_processo').val('');
	
	var selectassunto = $("select#select-choice-custom");
	selectassunto[0].selectedIndex = 0;
	selectassunto.selectmenu("refresh");
	
	var selectstatus = $("select#select-choice-custom-status");
	if(selectstatus.length > 0) {
		selectstatus[0].selectedIndex = 0;
		selectstatus.selectmenu("refresh");
	}
	
	$('#id_requerente_selecionado').val('');
	$('#nome_requerente_selecionado').empty();
	
	$('#id_relator_selecionado').val('');
	$('#nome_relator_selecionado').empty();
	
//	var parecer = $('#parecer-processo');
//	if(parecer.length > 0) {
//		parecer.val('');
//	}
	
}

function filtrarListaPauta() {
	
	var numero_pauta = $('#listar-pautas #numero_pauta').val();

	var param = {
			'action': 'filtro-listar-pautas',
			numero_pauta: numero_pauta
	};
	
	var config = {
			'retorno': 'filtro-listar-pautas',
			param: {reloadPage: true, transition: 'slidedown'}
	};
	
	requisicaoCenter(param, config);
	
}

function filtrarListaReuniao() {
	
	var id_status = $('#listar-reunioes #select-filtro-reuniao-status').val();
	var id_pauta = $('#listar-reunioes #id_pauta_reuniao').val();
	var numero_pauta = $('#listar-reunioes #numero_pauta_reuniao').html();
	
	var dia_inicio = $('#listar-reunioes #select-filtro-reuniao-dia-i').val();
	var mes_inicio = $('#listar-reunioes #select-filtro-reuniao-mes-i').val();
	var ano_inicio = $('#listar-reunioes #select-filtro-reuniao-ano-i').val();
	
	var dia_final = $('#listar-reunioes #select-filtro-reuniao-dia-f').val();
	var mes_final = $('#listar-reunioes #select-filtro-reuniao-mes-f').val();
	var ano_final = $('#listar-reunioes #select-filtro-reuniao-ano-f').val();

	var param = {
			'action': 'filtro-listar-reunioes',
			id_status: id_status,
			id_pauta: id_pauta,
			numero_pauta: numero_pauta,
			dia_inicio: dia_inicio,
			mes_inicio: mes_inicio,
			ano_inicio: ano_inicio,
			dia_final: dia_final,
			mes_final: mes_final,
			ano_final: ano_final
	};
	
	var config = {
			'retorno': 'filtro-listar-reunioes',
			param: {reloadPage: true, transition: 'slidedown'}
	};
	
	requisicaoCenter(param, config);
	
}

function filtrarListaProcesso() {
	
	var numero_processo = $('#listar-processos #numero_processo').val();
	var id_status = $("#listar-processos select#select-choice-custom-status").val();
	var id_assunto = $("#listar-processos select#select-choice-custom").val();
	var id_requerente = $('#listar-processos #id_requerente_selecionado').val();
	var nome_requerente = $('#listar-processos #nome_requerente_selecionado').html();
	var id_relator = $('#listar-processos #id_relator_selecionado').val();
	var nome_relator = $('#listar-processos #nome_relator_selecionado').html();

	var param = {
			'action': 'filtro-listar-processos',
			numero_processo: numero_processo,
			id_status: id_status,
			id_assunto: id_assunto,
			id_requerente: id_requerente,
			nome_requerente: nome_requerente,
			id_relator: id_relator,
			nome_relator: nome_relator
	};
	
	var config = {
			'retorno': 'filtro-listar-processos',
			param: {reloadPage: true, transition: 'slidedown'}
	};
	
	requisicaoCenter(param, config);
	
}

function visualizarParecerProcessoPageSimplificado(idProcesso, idPauta, idReuniao, lista) {
	
	var pagina = 'visualizar_parecer_simplificado.php?id='+idProcesso+'&id_reuniao=' + idReuniao + '&id_pauta='+idPauta+'&lista='+lista;

	redirecionamento(pagina, {reloadPage: true});

}

function imprimirParecer(idProcesso) {
	
	location.href = "app/frontController.php?action=pdf-parecer&id_processo="+idProcesso;
//	window.open("app/frontController.php?action=pdf-pauta&id="+idPauta, '_blank'); 
	
	/*$.post("app/frontController.php", { 'action':'pdf-pauta', id_pauta:idPauta }, function(data) {
		if(data.status == '1') {
			window.open("../tmp/cache/" + data.file, "_blank");
		} else {
			
		}
	}, 'json' );*/

}

function visualizarParecerProcesso(div) {
	$.mobile.showPageLoadingMsg();
	
	var id_active = $('.ui-page-active').attr('id');
	
	$btn = $('#'+id_active+' #'+div);
	
	$btn_visualizar = $('#'+id_active+' #btn-'+div);
	
	$span =  $btn_visualizar.prev().find('.ui-icon');

	$btn.toggle(150, function(){
		/*
		 * Inverte o icone, de down para up
		 */
		if($span.hasClass('ui-icon-arrow-d')) {
			$span.removeClass('ui-icon-arrow-d').addClass('ui-icon-arrow-u');
		} else {
			$span.removeClass('ui-icon-arrow-u').addClass('ui-icon-arrow-d');
		}
		
		$.mobile.hidePageLoadingMsg();
		
	});
	
}

function pautaExcluir(idPauta) {
	
	var param = {
			'action': 'excluir-pauta',
			id_pauta: idPauta
	};
	
	if(!confirm("Deseja excluir esta pauta?")) {
		return true;
	}
	
	$.mobile.showPageLoadingMsg();
	
	var prePage = $('.ui-page-active').attr('id');
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: param,
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
//			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {
					
				var id = 'li-pauta-'+idPauta;
				
				$('#'+prePage+' #'+id).remove();
				
				var length = $('#'+prePage+' #pauta-listview li').length;
				if(length > 0) {
					$last = $('#'+prePage+' #pauta-listview li:last');
					
					if(!$last.hasClass('ui-corner-bottom')) {
						$last.addClass('ui-corner-bottom');
					}
					
					$first = $('#'+prePage+' #pauta-listview li:first');
					if(!$first.hasClass('ui-corner-top')) {
						$first.addClass('ui-corner-top');
					}
				}
				
				$.mobile.hidePageLoadingMsg();
//				alert(data.texto);
				
			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {
				msg = 'erro! ' + data.erro;
//				Ocorreu algum erro!
				alert(data.erro);
			}
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});
	
}

function reuniaoExcluir(idReuniao) {
	
	var param = {
			'action': 'excluir-reuniao',
			id_reuniao: idReuniao
	};
	
	if(!confirm("Deseja excluir esta reunião?")) {
		return true;
	}
	
	$.mobile.showPageLoadingMsg();
	
	var prePage = $('.ui-page-active').attr('id');
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: param,
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
//			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {
					
				var id = 'li-reuniao-'+idReuniao;
				
				$('#'+prePage+' #'+id).remove();
				
				var length = $('#'+prePage+' #reuniao-listview li').length;
				if(length > 0) {
					$last = $('#'+prePage+' #reuniao-listview li:last');
					
					if(!$last.hasClass('ui-corner-bottom')) {
						$last.addClass('ui-corner-bottom');
					}
					
					$first = $('#'+prePage+' #reuniao-listview li:first');
					if(!$first.hasClass('ui-corner-top')) {
						$first.addClass('ui-corner-top');
					}
				}
				
				$.mobile.hidePageLoadingMsg();
//				alert(data.texto);
				
			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {
				msg = 'erro! ' + data.erro;
//				Ocorreu algum erro!
				alert(data.erro);
			}
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});
	
}

function processoExcluirDaPauta(idProcesso, idPauta, numeroPauta) {
	var param = {
			'action': 'excluir-processo-da-pauta',
			id_processo: idProcesso,
			id_pauta: idPauta
	};
	
	if(!confirm("Deseja retirar este processo da pauta "+numeroPauta+"?")) {
		return true;
	}
	
	$.mobile.showPageLoadingMsg();
	
//	var prePage = $('.ui-page-active').attr('id');

//	listar-membros-andamento
//	listar-processos
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: param,
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
//			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {
					
				var id = 'li-processo-'+idProcesso;
				
				$('.ui-page-active #'+id).remove();
				
				var length = $('.ui-page-active #processo-listview li').length;
				if(length > 0) {
					$last = $('.ui-page-active #processo-listview li:last');
					
					if(!$last.hasClass('ui-corner-bottom')) {
						$last.addClass('ui-corner-bottom');
					}
					
					$first = $('.ui-page-active #processo-listview li:first');
					if(!$first.hasClass('ui-corner-top')) {
						$first.addClass('ui-corner-top');
					}
				}
				
				$.mobile.hidePageLoadingMsg();
//				alert(data.texto);
				
			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {
				msg = 'erro! ' + data.erro;
//				Ocorreu algum erro!
				alert(data.erro);
			}
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});
}

function processoExcluir(idProcesso) {
	
	var param = {
			'action': 'excluir-processo',
			id_processo: idProcesso
	};
	
	if(!confirm("Deseja excluir este processo?")) {
		return true;
	}
	
	$.mobile.showPageLoadingMsg();
	
	var prePage = $('.ui-page-active').attr('id');

//	listar-membros-andamento
//	listar-processos
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: param,
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
//			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {
					
				var id = 'li-processo-'+idProcesso;
				
				$('#'+prePage+' #'+id).remove();
				
				var length = $('#'+prePage+' #processo-listview li').length;
				if(length > 0) {
					$last = $('#'+prePage+' #processo-listview li:last');
					
					if(!$last.hasClass('ui-corner-bottom')) {
						$last.addClass('ui-corner-bottom');
					}
					
					$first = $('#'+prePage+' #processo-listview li:first');
					if(!$first.hasClass('ui-corner-top')) {
						$first.addClass('ui-corner-top');
					}
				}
				
				$.mobile.hidePageLoadingMsg();
//				alert(data.texto);
				
			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {
				msg = 'erro! ' + data.erro;
//				Ocorreu algum erro!
				alert(data.erro);
			}
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});

}

function pautaEditForm(idPauta) {
	
	var pagina = 'edit_pauta.php?id='+idPauta;
	
	redirecionamento(pagina, {reloadPage: true});
	
}

function reuniaoEditForm(idReuniao, lista) {
	
	var pagina = 'edit_reuniao.php?id='+idReuniao+'&lista=' + lista;
	
	redirecionamento(pagina, {reloadPage: true});
	
}

/*
 * novo processo
 */
function processoEditFormSimplificado(idProcesso, idPauta, idReuniao, lista) {
	
	var pagina = 'edit_processo_simplificado.php?id='+idProcesso+'&id_reuniao=' + idReuniao + '&id_pauta='+idPauta+'&lista='+lista;

	redirecionamento(pagina, {reloadPage: true});

}

function visualizarParecerProcessoPage(idProcesso, lista) {
	
	var pagina = 'visualizar_parecer.php?id='+idProcesso+'&lista='+lista;

	redirecionamento(pagina, {reloadPage: true});

}

function processoEditForm(idProcesso, lista) {
	
	var pagina = 'edit_processo.php?id='+idProcesso+'&lista=' + lista;

	redirecionamento(pagina, {reloadPage: true});

}

function editarPauta(id_pauta) {
	var erro = '';
	var numero_pauta = $('.ui-page-active #numero_pauta').val();
	var liberar_pauta = ($('.ui-page-active #checkbox-liberar-pauta').is(':checked'))?'1':'0';
	
	var arrayProcesso = [];
	$(".ui-page-active input[name='checkbox-processo']:checked").each(function(){
		arrayProcesso.push($(this).val());
	});
	var processos = arrayProcesso.join(',');
	
	if(numero_pauta == '') erro += "\n- Número da pauta";
	if(processos == '') erro += "\n- Processo (selecione pelo menos um)";
	
	if(erro != '') {
		alert("Campo(s) obrigatório(s):\n" + erro);
		return true;
	}
	
	var param = {
			'action': 'edit-pauta',
			id_pauta: id_pauta,
			numero_pauta: numero_pauta,
			processos: processos,
			liberar_pauta: liberar_pauta
	};
	var config = {
			'retorno': 'edit-pauta',
			id_pauta: id_pauta,
			numero_pauta: numero_pauta,
			param: {reloadPage: false}
	};

	requisicaoCenter(param, config);
	
	
}

function downloadAta(id_reuniao) {
	
	location.href = "download_ata.php?id="+id_reuniao;
	
}

function editarReuniao(id_reuniao) {
	
	var id_pauta = $('.ui-page-active #select-choice-pauta').val();
	var numero_pauta = $('.ui-page-active #select-choice-pauta option:selected').text();
	var id_status = $('.ui-page-active #select-choice-status').val();
	var motivo_cancelamento = $('.ui-page-active #reuniao-motivo-cancelamento').val();
	var local = $('.ui-page-active #reuniao-local').val();
	var dia = $('.ui-page-active #select-reuniao-dia').val();
	var mes = $('.ui-page-active #select-reuniao-mes').val();
	var ano = $('.ui-page-active #select-reuniao-ano').val();
	var hora = $('.ui-page-active #select-reuniao-hora').val();
	var minuto = $('.ui-page-active #select-reuniao-minuto').val();
	var email = ($('.ui-page-active #checkbox-reuniao-email').is(':checked'))?'1':'0';
	var lista_presenca = '';
	
	var array = [];
	var s = $(".ui-page-active #bloco-lista-presenca");
	if(s.length > 0) {
		s.find("input[type='checkbox']:checked").each(function(){
		    var id = $(this).data('idmembro');
		    array.push(id);
		});
	}
	lista_presenca = array.join(',');
	
	var erro = '';

//	if(id_pauta == '') erro += "\n- Pauta";
	if(local == '') erro += "\n- Local";
	if(dia == '') erro += "\n- Dia";
	if(mes == '') erro += "\n- Mês";
	if(ano == '') erro += "\n- Ano";
	if(hora == '') erro += "\n- Hora";
	if(minuto == '') erro += "\n- Minuto";
	
	if(id_status == '2' && $.trim(motivo_cancelamento) == '') {
		 erro += "\n- Motivo do cancelamento";
	}
	
	if(erro != '') {
		alert("Campo(s) obrigatório(s):\n" + erro);
		return true;
	}
	
	if((id_pauta == '' || id_pauta == '0') && id_status == '1') {
		alert("Para alterar o status para \"Realizada\" é necessário definir a pauta!");
		return true;
	}
	
	if(email == '1') {
		if(!confirm("Um e-mail será disparado para todos os membros da CPPD.\nVocê deseja prosseguir?")) {
			return true;
		}
	}
	
	/*
	 * Upload do arquivo - ata
	 * Aqui verificar se é IE. Para este caso avisar o usuário que não
	 * funciona o upload neste navegador e "passar reto", chamando
	 * direto a função salvarEdicaoReuniao(id_reuniao);
	 */
	var $file = $(".ui-page-active #file_ata");
	
	if($file.val() != '') {

		$file.upload('app/frontController.php', {action: 'upload-ata'}, function(res) {
			var objJson = eval('(' + res + ')');
			if(objJson.status == 1){
	
				salvarEdicaoReuniao(id_reuniao, objJson.arquivo);
				$(this).val('');
				
				var $btnUpload = $(".ui-page-active #btn-clique-upoad");
				$btnUpload.find('.ui-btn-text').html(objJson.arquivo);
				
				var $btnDownload = $('.ui-page-active #btn-clique-upoad-download');
				$btnDownload.addClass('ui-corner-right').show();
				
				$('.ui-page-active #btn-clique-upoad-excluir').removeClass('ui-corner-right');
				
			}else{
	
				console.log("Erro no upload do arquivo." + objJson.erro);
				return false;
	
			}
	
		}, 'html');
	} else {
		salvarEdicaoReuniao(id_reuniao, '');
	}
	
}

function salvarEdicaoReuniao(id_reuniao, arquivo_novo) {
	
	var id_pauta = $('.ui-page-active #select-choice-pauta').val();
	var numero_pauta = $('.ui-page-active #select-choice-pauta option:selected').text();
	var id_status = $('.ui-page-active #select-choice-status').val();
	var motivo_cancelamento = $('.ui-page-active #reuniao-motivo-cancelamento').val();
	var local = $('.ui-page-active #reuniao-local').val();
	var dia = $('.ui-page-active #select-reuniao-dia').val();
	var mes = $('.ui-page-active #select-reuniao-mes').val();
	var ano = $('.ui-page-active #select-reuniao-ano').val();
	var hora = $('.ui-page-active #select-reuniao-hora').val();
	var minuto = $('.ui-page-active #select-reuniao-minuto').val();
	var email = ($('.ui-page-active #checkbox-reuniao-email').is(':checked'))?'1':'0';
	var lista_presenca = '';
	
	var array = [];
	var s = $(".ui-page-active #bloco-lista-presenca");
	if(s.length > 0) {
		s.find("input[type='checkbox']:checked").each(function(){
		    var id = $(this).data('idmembro');
		    array.push(id);
		});
	}
	lista_presenca = array.join(',');
	
	var nome_file_atual = $('.ui-page-active #nome-file-ata').val();
	
	var action_file = '';
	
	var $btnExcluir = $('.ui-page-active #btn-clique-upoad-excluir');
	var $btnDownload = $('.ui-page-active #btn-clique-upoad-download');

	if($btnDownload.is(':visible')) {
		action_file = 'mesmo';
	} else if($btnExcluir.is(':visible')) {
		action_file = 'troca';
	} else {
		action_file = 'exclui';
	}
	
	var param = {
			'action': 'edit-reuniao',
			id_reuniao: id_reuniao,
			id_pauta: id_pauta,
			numero_pauta: numero_pauta,
			id_status: id_status,
			local: local,
			dia: dia,
			mes: mes,
			ano: ano,
			hora: hora,
			minuto: minuto,
			motivo_cancelamento: motivo_cancelamento,
			email: email,
			lista_presenca: lista_presenca,
			arquivo_novo: arquivo_novo,
			action_file: action_file
	};
	var config = {
			'retorno': 'edit-reuniao',
			'numero_pauta': numero_pauta,
			param: {reloadPage: false}
	};

	requisicaoCenter(param, config);
	
} 

function editarProcessoSimplificado(id_processo) {
	
	var id_status = '';
	var id_requerente = '';
	var id_relator = '';
	var parecer = $('.ui-page-active #parecer-processo').val();
	
	var s =$('.ui-page-active #select-choice-custom-status');
	if(s.length) id_status = s.val();
	
	var ireq = $('.ui-page-active #id_requerente_selecionado');
	if(ireq.length) id_requerente = ireq.val();

	var irel = $('.ui-page-active #id_relator_selecionado');
	if(irel.length) id_relator = irel.val(); 
	
	if(id_processo == '') {
		alert("Erro! O id do processo não foi passado corretamente. Favor tentar novamente mais tarde.");
		return true;
	}

	var param = {
			'action': 'edit-processo-simplificado',
			id_processo: id_processo,
			id_status: id_status,
			id_requerente: id_requerente,
			id_relator: id_relator,
			parecer: parecer
	};
	
	$.mobile.showPageLoadingMsg();
	
	var prePage = $('.ui-page-active').attr('id');
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: param,
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
//			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {

				$.mobile.hidePageLoadingMsg();
				alert(data.texto);

			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {
				msg = 'erro! ' + data.erro;
//				Ocorreu algum erro!
				alert(data.erro);
			}
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});
	
}

function editarProcesso(id_processo) {
	
	var numero_processo = '';
	var id_assunto = '';
	var id_status = '';
	var id_requerente = '';
	var id_relator = '';
	var parecer = '';
	var erro = '';
	
	var s = $('.ui-page-active #numero_processo');
	if(s.length > 0) {
		numero_processo = s.val();
		if(numero_processo == '') erro += "\n- Número";
		else if(numero_processo.length > 100) erro += "\n- Campo Número não pode ter mais que 100 caracteres";
	}
	var s = $('.ui-page-active #select-choice-custom');
	if(s.length > 0) {
		id_assunto = s.val();
		if(id_assunto == '' || id_assunto == '0') erro += "\n- Assunto";
	}
	var s = $('.ui-page-active #select-choice-custom-status');
	if(s.length > 0) {
		id_status = s.val();
		if(id_status == '' || id_status == '0') erro += "\n- Status";
	}
	var s = $('.ui-page-active #id_requerente_selecionado');
	if(s.length > 0) {
		id_requerente = s.val();
		if(id_requerente == '') erro += "\n- Requerente";
	}
	var s = $('.ui-page-active #id_relator_selecionado');
	if(s.length > 0) {
		id_relator = s.val();
		if(id_relator == '') erro += "\n- Relator";
	}
	var s = $('.ui-page-active #parecer-processo');
	if(s.length > 0) {
		parecer = s.val();
	}
	
	if(id_processo == '') {
		alert("Erro! O id do processo não foi passado corretamente. Favor tentar novamente mais tarde.");
		return true;
	}

	if(erro != '') {
		alert("Campo(s) obrigatório(s):\n" + erro);
		return true;
	}

	var param = {
			'action': 'edit-processo',
			id_processo: id_processo,
			numero_processo: numero_processo,
			id_status: id_status,
			id_assunto: id_assunto,
			id_requerente: id_requerente,
			id_relator: id_relator,
			parecer: parecer
	};
	var config = {
			'retorno': 'edit-processo',
			param: {reloadPage: false}
	};

	requisicaoCenter(param, config);
}

function salvarReuniao() {
	
	var id_pauta = $('#nova-reuniao #select-choice-pauta').val();
	var numero_pauta = $('#nova-reuniao #select-choice-pauta option:selected').text();
	var local = $('#nova-reuniao #reuniao-local').val();
	var dia = $('#nova-reuniao #select-reuniao-dia').val();
	var mes = $('#nova-reuniao #select-reuniao-mes').val();
	var ano = $('#nova-reuniao #select-reuniao-ano').val();
	var hora = $('#nova-reuniao #select-reuniao-hora').val();
	var minuto = $('#nova-reuniao #select-reuniao-minuto').val();
	var email = ($('#nova-reuniao #checkbox-reuniao-email').is(':checked'))?'1':'0';
	var erro = '';
	
//	if(id_pauta == '') erro += "\n- Pauta";
	if(local == '') erro += "\n- Local";
	if(dia == '') erro += "\n- Dia";
	if(mes == '') erro += "\n- Mês";
	if(ano == '') erro += "\n- Ano";
	if(hora == '') erro += "\n- Hora";
	if(minuto == '') erro += "\n- Minuto";
	
	if(erro != '') {
		alert("Campo(s) obrigatório(s):\n" + erro);
		return true;
	}
	
	if(email == '1') {
		if(!confirm("Um e-mail será disparado para todos os membros da CPPD.\nVocê deseja prosseguir?")) {
			return true;
		}
	}
	
	var param = {
			'action': 'add-nova-reuniao',
			id_pauta: id_pauta,
			numero_pauta: numero_pauta,
			local: local,
			dia: dia,
			mes: mes,
			ano: ano,
			hora: hora,
			minuto: minuto,
			email: email
	};
	var config = {
			'retorno': 'add-nova-reuniao',
			param: {reloadPage: false}
	};

	requisicaoCenter(param, config);
	
}

function salvarPauta() {
	
//	$('.ui-page-active #siape-login').val();
	
	var erro = '';
	var numero_pauta = $('.ui-page-active #numero_pauta').val();
	var liberar_pauta = ($('.ui-page-active #checkbox-liberar-pauta').is(':checked'))?'1':'0';

	var arrayProcesso = [];
	$(".ui-page-active input[name='checkbox-processo']:checked").each(function(){
		arrayProcesso.push($(this).val());
	});
	var processos = arrayProcesso.join(',');
	
	if(numero_pauta == '') erro += "\n- Número da pauta";
	if(processos == '') erro += "\n- Processo (selecione pelo menos um)";
	
	if(erro != '') {
		alert("Campo(s) obrigatório(s):\n" + erro);
		return true;
	}

	var param = {
			'action': 'add-nova-pauta',
			numero_pauta: numero_pauta,
			processos: processos,
			liberar_pauta: liberar_pauta
	};
	var config = {
			'retorno': 'add-nova-pauta',
			param: {reloadPage: false}
	};

	requisicaoCenter(param, config);
	
}

function salvarProcesso() {

	var numero_processo = $('#novo-processo #numero_processo').val();
	var id_status = $('#novo-processo #select-choice-custom-status').val();
	var id_assunto = $('#novo-processo #select-choice-custom').val();
	var id_requerente = $('#novo-processo #id_requerente_selecionado').val();
	var id_relator = $('#novo-processo #id_relator_selecionado').val();
	var parecer = $('#novo-processo #parecer-processo').val();
	var erro = '';

	if(numero_processo == '') erro += "\n- Número";
	else if(numero_processo.length > 100) erro += "\n- Campo Número não pode ter mais que 100 caracteres";

	if(id_status == '' || id_status == '0') erro += "\n- Status";
	if(id_assunto == '' || id_assunto == '0') erro += "\n- Assunto";
	if(id_requerente == '') erro += "\n- Requerente";
	if(id_relator == '') erro += "\n- Relator";

	if(erro != '') {
		alert("Campo(s) obrigatório(s):\n" + erro);
		return true;
	}

	var param = {
			'action': 'add-novo-processo',
			numero_processo: numero_processo,
			id_status: id_status,
			id_assunto: id_assunto,
			id_requerente: id_requerente,
			id_relator: id_relator,
			parecer: parecer
	};
	var config = {
			'retorno': 'add-novo-processo',
			param: {reloadPage: false}
	};

	requisicaoCenter(param, config);

}

function resetarNovaPauta() {
	
	$('#nova-pauta #numero_pauta').val('');
	$("#nova-pauta input[name='checkbox-processo']").attr('checked',false).checkboxradio("refresh");
}

function resetarNovaReuniao() {
	
	var selectpauta = $("#nova-reuniao select#select-choice-pauta");
	selectpauta[0].selectedIndex = 0;
	selectpauta.selectmenu("refresh");
	
	$('#nova-reuniao #reuniao-local').val('');
	
	var s = $("#nova-reuniao select#select-reuniao-dia");
	s[0].selectedIndex = $('#nova-reuniao #nova-reuniao-dia-default').val();
	s.selectmenu("refresh");
	var s = $("#nova-reuniao select#select-reuniao-mes");
	s[0].selectedIndex = $('#nova-reuniao #nova-reuniao-mes-default').val();;
	s.selectmenu("refresh");
	
	var s = $("#nova-reuniao select#select-reuniao-hora");
	s[0].selectedIndex = 7;
	s.selectmenu("refresh");
	var s = $("#nova-reuniao select#select-reuniao-minuto");
	s[0].selectedIndex = 0;
	s.selectmenu("refresh");
	
	$('#nova-reuniao #checkbox-reuniao-email').attr('checked',false).checkboxradio("refresh");
	
}

function resetarNovoProcesso(){
	/*
	 * Limpar todos os campos de ./novo_processo.php
	 */
	$('#novo-processo #numero_processo').val('');
	
	var selectassunto = $("#novo-processo select#select-choice-custom");
	selectassunto[0].selectedIndex = 0;
	selectassunto.selectmenu("refresh");
	
	var selectassunto = $("#novo-processo select#select-choice-custom-status");
	selectassunto[0].selectedIndex = 8;
	selectassunto.selectmenu("refresh");
	
	$('#novo-processo #id_requerente_selecionado').val('');
	$('#novo-processo #nome_requerente_selecionado').empty();
	
	$('#novo-processo #id_relator_selecionado').val('');
	$('#novo-processo #nome_relator_selecionado').empty();
	
	$('#novo-processo #parecer-processo').val('');
}

/*function limparNovoProcesso() {

//	Limpar todos os campos de ./novo_processo.php

	$('#numero_processo').val('');
	
	var selectassunto = $("select#select-choice-custom");
	selectassunto[0].selectedIndex = 0;
	selectassunto.selectmenu("refresh");
	
	var selectstatus = $("select#select-choice-custom-status");
	if(selectstatus.length > 0) {
		selectstatus[0].selectedIndex = 0;
		selectstatus.selectmenu("refresh");
	}
	
	$('#id_requerente_selecionado').val('');
	$('#nome_requerente_selecionado').html('&lt;&lt; Selecione um requerente &gt;&gt;');
	
	$('#id_relator_selecionado').val('');
	$('#nome_relator_selecionado').html('&lt;&lt; Selecione um relator &gt;&gt;');
	
	var parecer = $('#parecer-processo');
	if(parecer.length > 0) {
		parecer.val('');
	}

}*/

$('#nome-requerente-search').live('keypress', function(e)
{
     if(e.keyCode == 13)
     {
    	 pesquisaRequerentes();
     }
});

function pesquisaRequerentes() {

	var s = $('#nome-requerente-search').val();
	
	if(s.length < 3) {
		return true;
	}
	
	$('#listview-requerente').find('li').remove();
	
	var param = {
			'action':	'pesquisa-requerentes',
			'search':	s
	};
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		dataType: 'json',
		data: param,
		timeout: 5000,
		beforeSend: function(){
			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data) {
			
			$.each(data.array, function(i, r){
				
				$('#listview-requerente').append('<li><a href="#" onclick="novoProcessoRequerente(\''+r.id_professor+'\',\''+r.nome+'\')">'+r.nome+'</a></li>');
				
			});
			
			$('#listview-requerente').listview('refresh');

		}
	});
	
}

function selecionarRequerente(param){

	/*
	 * Seto o parametro mesmo que não tennha nada para ser usado no retorno
	 * da seleção
	 */
	setParametro(param);
//	setHabilitarRelator(false);
//	setHabilitarRequerente(false);
	setPageReferencia($('.ui-page-active').attr('id'));
	
//	setNomeRelator($('#'+getPageReferencia()+' #nome_relator_selecionado').html());
//	setIdRelator($('#'+getPageReferencia()+' #id_relator_selecionado').val());
//	setNomeRequerente($('#'+getPageReferencia()+' #nome_requerente_selecionado').html());
//	setIdRequerente($('#'+getPageReferencia()+' #id_requerente_selecionado').val());

	redirecionamento('./novo_processo_requerente.php', {role: 'dialog', reloadPage: false});

}

function novoProcessoRequerente(id_professor, nome){

//	setNomeRequerente(nome);
	$('#'+getPageReferencia()+' #nome_requerente_selecionado').html(nome);
//	setIdRequerente(id_professor);
	$('#'+getPageReferencia()+' #id_requerente_selecionado').val(id_professor);

	var param = getParametro();
	
	/*if(param != '') {
		setHabilitarRequerente(true);
	}*/

	redirecionamento('./'+destino + param, {reloadPage: false});

}

function selecionarProcesso(param) {
	
	setParametro(param);
	setPageReferencia($('.ui-page-active').attr('id'));
	
	redirecionamento('./reuniao_add_processo.php', {role: 'dialog', reloadPage: false});
}

function processoSelecionado(id_processo) {
	/*
	 * Adicionar na lista o novo processo
	 */
	var id_reuniao = $('#'+getPageReferencia()+' #id-reuniao').val();
	var id_pauta = $('#'+getPageReferencia()+' #id-pauta').val();
	var id_lista = $('#'+getPageReferencia()+' #id-lista').val();
	var numero_pauta = $('#'+getPageReferencia()+' #reuniao-numero-pauta').html();
	/*
	
	var html = '<li id="li-processo-'+id+'" data-icon="false" data-corners="false" data-shadow="false" data-iconshadow="true" data-inline="false" data-wrapperels="div" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li ui-corner-bottom ui-btn-up-c"><div class="ui-btn-inner ui-li"><div class="ui-btn-text">' +
			'<a data-prefetch="" data-theme="a" data-transition="slide" data-processonumero="'+numero+'" data-processoid="'+id+'" id="linha-processo-'+id+'" class="lista-processo-unique ui-link-inherit" href="#">' +
			'<h3 style="white-space:normal;" class="ui-li-heading">Processo: '+numero+', '+requerente+'</h3>' +
			'<p class="ui-li-desc"><strong>Assunto: '+assunto+'</strong></p>' +
			'<p class="ui-li-desc"><strong>Status: '+status+'</strong></p>' +
			'<p class="ui-li-desc">Relator: '+relator+'</p>' +
			'<div class="btn-listview-button">' +
			'<div data-corners="true" data-shadow="true" data-iconshadow="true" data-inline="true" data-wrapperels="span" data-icon="gear" data-iconpos="" data-theme="c" data-mini="true" class="ui-btn ui-btn-inline ui-shadow ui-btn-corner-all ui-mini ui-btn-icon-left ui-btn-up-c" aria-disabled="false"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Editar</span><span class="ui-icon ui-icon-gear ui-icon-shadow">&nbsp;</span></span><button data-inline="true" data-mini="true" data-icon="gear" data-theme="c" type="submit" onclick="processoEditFormSimplificado(\''+id+'\',\''+id_pauta+'\',\''+id_reuniao+'\')" class="ui-btn-hidden" aria-disabled="false">Editar</button></div>' +
			'<div data-corners="true" data-shadow="true" data-iconshadow="true" data-inline="true" data-wrapperels="span" data-icon="delete" data-iconpos="" data-theme="c" data-mini="true" class="ui-btn ui-btn-inline ui-shadow ui-btn-corner-all ui-mini ui-btn-icon-left ui-btn-up-c" aria-disabled="false"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Excluir</span><span class="ui-icon ui-icon-delete ui-icon-shadow">&nbsp;</span></span><button data-inline="true" data-mini="true" data-icon="delete" data-theme="c" type="submit" onclick="processoExcluirDaPauta(\''+id+'\',\''+id_pauta+'\',\''+numero_pauta+'\')" class="ui-btn-hidden" aria-disabled="false">Excluir</button></div>' +
			'</div></a>' +
			'</div></div></li>';
	
	$('#'+getPageReferencia()+' #processo-listview:last').removeClass('ui-corner-bottom');
	$('#'+getPageReferencia()+' #processo-listview').append(html);

	redirecionamento('./'+destino + param, {reloadPage: false});
	*/
	var param = {
			'action': 'reuniao-add-processo',
			id_processo: id_processo,
			id_reuniao: id_reuniao,
			id_pauta: id_pauta
	};
	
	var paramGet = getParametro();
	
	$.mobile.showPageLoadingMsg();
	
	var prePage = $('.ui-page-active').attr('id');
	
	$.ajax({
		url: 'app/frontController.php',
		type: 'POST',
		data: param,
		dataType: 'json',
		timeout: 5000,
		beforeSend: function(){
//			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {

				$.mobile.hidePageLoadingMsg();
				redirecionamento('./'+destino + paramGet, {reloadPage: true});

			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {
				msg = 'erro! ' + data.erro;
//				Ocorreu algum erro!
				alert(data.erro);
			}
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});
	
	
}

function selecionarPauta(param) {
	
	setParametro(param);
	setPageReferencia($('.ui-page-active').attr('id'));
	
	redirecionamento('./reuniao_pautas.php', {role: 'dialog', reloadPage: false});
}

function pautaSelecionada(id, nome) {

//	setNomeRelator(nome);
	$('#'+getPageReferencia()+' #numero_pauta_reuniao').html(nome);
//	setIdRelator(id_membro);
	$('#'+getPageReferencia()+' #id_pauta_reuniao').val(id);
	
	var param = getParametro();

	var n = $('#'+getPageReferencia()+' #nome_relator_selecionado').html();
//	console.log(".ui-page-active (267): " + getPageReferencia() + " ===> " + nome + " ==> " + n);
//	console.log("Destino (267): " + destino);

	redirecionamento('./'+destino + param, {reloadPage: false});
}

function selecionarRelator(param) {

	/*
	 * Seto o parametro mesmo que não tennha nada para ser usado no retorno
	 * da seleção
	 */
	setParametro(param);
//	setHabilitarRelator(false);
	
//	setHabilitarRequerente(false);
	setPageReferencia($('.ui-page-active').attr('id'));
	
//	setNomeRelator($('#'+getPageReferencia()+' #nome_relator_selecionado').html());
//	setIdRelator($('#'+getPageReferencia()+' #id_relator_selecionado').val());
//	setNomeRequerente($('#'+getPageReferencia()+' #nome_requerente_selecionado').html());
//	setIdRequerente($('#'+getPageReferencia()+' #id_requerente_selecionado').val());
	
	console.log(".ui-page-active (248): " + getPageReferencia() + " ==> " + $('.ui-page-active').attr('id'));

	redirecionamento('./novo_processo_relator.php', {role: 'dialog', reloadPage: false});
		
}

function novoProcessoRelator(id_membro, nome){

//	setNomeRelator(nome);
	$('#'+getPageReferencia()+' #nome_relator_selecionado').html(nome);
//	setIdRelator(id_membro);
	$('#'+getPageReferencia()+' #id_relator_selecionado').val(id_membro);
	
	var param = getParametro();
	
	/*if(param != '') {
		setHabilitarRelator(true);
	}*/
	
	var n = $('#'+getPageReferencia()+' #nome_relator_selecionado').html();
	console.log(".ui-page-active (267): " + getPageReferencia() + " ===> " + nome + " ==> " + n);
	console.log("Destino (267): " + destino);

	redirecionamento('./'+destino + param, {reloadPage: false});

}

/*
 * Adicionar membro
 */
function addMembroEdit(idProf, m) {

	redirecionamento('./add_membro_edit.php?id-professor='+idProf+'&m='+m, {transition: 'slide'});
}
function salvarAddAlterarMembro(id_professor, m){

	var email = $('.ui-page-active #email-membro').val();
	var check = $('.ui-page-active input:radio[name=am_membro]:checked').val();
	
	if(check == '0') {
	
		if(!confirm("O membro selecionado será excluído.\nVocê deseja prosseguir?")) {
			redirecionamento('./add_membro.php', {transition: 'fade'});
			return true;
		}
	} else {
		if(email == '') {
			alert("Favor preencher o e-mail do professor!");
			return true;
		}
	}

	var param = {
			'action': 'add-excluir-membro',
			id_professor: id_professor,
			check: check,
			email: email
	};
	var config = {
			'retorno': 'add-excluir-membro',
			param: {data: '&nome-membro=' + m, reloadPage: true}
	};
	
	requisicaoCenter(param, config);
		
}


/*
 * Listar membros
 */
function membroEdit(idMembro) {

	redirecionamento('./listar_membros_edit.php?id='+idMembro, {transition: 'slide'});
}
function salvarAlterarMembro(id_membro){

	var email = $('.ui-page-active #email-membro').val();
	var che = $('.ui-page-active input:radio[name=lm_membro]:checked').val();
	
	if(che == 'excluir') {
		
		if(!confirm("O membro selecionado será excluído.\nVocê deseja prosseguir?")) {
			redirecionamento('./listar_membros.php', {transition: 'fade'});
			return true;
		}
		var param = {
				'action': 'excluir-membro',
				id_membro_excluir: id_membro,
				email: email
		};
		var config = {
				'retorno': 'excluir-membro'
		};
		
		requisicaoCenter(param, config);
		
	} else {
		
		/*
		 * Atualiza e-mail
		 */
		var param = {
				'action': 'atualiza-email-membro',
				id_membro: id_membro,
				email: email
		};
		var config = {
				'retorno': 'atualiza-email-membro'
		};
		
		requisicaoCenter(param, config);
//		redirecionamento(, param)to('./listar_membros.php', {transition: 'fade'});
		
	}
};

/*
 * Alterar senha
 */
$('#bSalvarNovaSenha').live('click',function(){
	
	var senha_atual = document.getElementById('senha-atual').value;
	var nova_senha = document.getElementById('nova-senha').value;
	var confir_senha = document.getElementById('confirmar-senha').value;
	var erro = '';
	
	if(senha_atual == '' || nova_senha == '' || confir_senha == '') {
		erro += "Todos os campos são obrigatórios";
	} else if(nova_senha != confir_senha) {
		erro += "\"Nova senha\" e \"Confirmar senha\" devem ser iguais!";
	}
	if(erro != '') {
		alert("Erro: " + erro);
		return true;
	}
	
	var param = {
			'action':		'alterar-senha',
			'senha_atual':	senha_atual,
			'nova_senha':	nova_senha,
			'confir_senha':	confir_senha
	};
	var config = {
			'retorno': 'alterar-senha'
	};
	
	requisicaoCenter(param, config);
	
});

/*
 * Página inicial - login
 */
$('#bLogar').live('click',function(){
	
	efetuarLogin();
	
});

$('#form-login input').live('keydown',function(e){

	if(e.keyCode == '13') {
		efetuarLogin();
	}
});

function efetuarLogin() {

	var siape = $('.ui-page-active #siape-login').val();
	var senha = $('.ui-page-active #senha-login').val();
	
	if(siape == '' || senha == '') {
		alert("Favor preencher as campos Siape e Senha para logar!");
		return true;
	}
	var param = {
			'verificaLogin': '1',
			'siape': siape,
			'senha': senha
	};
	
	var config = {
			'retorno': 'login',
			'page': {reloadPage: true, transition: 'slidedown'}
	};
	
	requisicaoCenter(param, config);
	
}


/*
 * Header - cabeçalho
 */
$('#bLogout').live('click',function(){

	redirecionamento('./index.php', {reloadPage: true, transition: 'fade'});
//	$.mobile.changePage('./index.php', {reloadPage: true, transition: 'fade'});
	
});

$('#bEnviarSenhaParaEmail').live('click',function(){
	
	var siape = $('.ui-page-active #numero-siape').val();
	
	if(siape.length == 0) {
		$('.ui-page-active #div-esqueci-senha-retorno').html("Favor preencher o campo abaixo!").fadeIn().delay(1000).fadeOut();
		return true;
	}
	
	var param = {
			'action': 'esqueci-senha',
			'siape': siape
	};
	
	var config = {
			'retorno': 'esqueci-senha',
			'page': {reloadPage: true, transition: 'slidedown'}
	};
	
	requisicaoCenter(param, config);
	
});

/*
 * ########## funcoes uteis ###########
 */
function redirecionamento(url, param) {
	if(param == undefined) {
		 var param = {};
	 }
	$.mobile.changePage(url, param);

}

function redirecionamentoExterno(url) {
	window.location.href = url;

}

function requisicaoCenter(param, config){
	/*
	 * Apenas config.url é obrigatorio
	 */
	 if(config == undefined) {
		 var config = {};
	 }

	var url = (config.url != undefined)?config.url:'app/frontController.php';
	var type = (config.type != undefined)?config.type:'POST';
	var dataType = (config.dataType != undefined)?config.dataType:'json';
	$.ajax({
		url: url,
		type: type,
		data: param,
		dataType: dataType,
		timeout: 5000,
		beforeSend: function(){
			$.mobile.showPageLoadingMsg();
		},
		complete: function(){
			$.mobile.hidePageLoadingMsg();
		},
		success: function(data){
			var msg = '';
			if(data.status == '1') {
				if(config.retorno == 'login') {
					$.mobile.changePage('home.php', config.page);
				} else if(config.retorno == 'alterar-senha') {
					
					alert(data.texto);
					$.mobile.changePage('home.php');
					
				} else if(config.retorno == 'excluir-membro') {
					
					$.mobile.changePage('listar_membros.php', {reloadPage: true});
					
				} else if(config.retorno == 'atualiza-email-membro') {
					
					$.mobile.changePage('listar_membros.php', {reloadPage: true});
					
				} else if(config.retorno == 'add-excluir-membro') {
					
					$.mobile.changePage('add_membro.php', config.param);
					/*
					 * Aqui no retorno tenho que atualizar a listagem mantendo o $_GET['nome-membro']
					 */
				} else if(config.retorno == 'add-novo-processo') {
					
					resetarNovoProcesso();
					$.mobile.changePage('novo_processo.php', config.param);
					
				} else if(config.retorno == 'edit-processo') {

					$('#titulo-edit-processo').html( $('#edit-processo #numero_processo').val() );
					alert(data.texto);
					
				} else if(config.retorno == 'edit-pauta') {
					
					$('#titulo-edit-pauta').html( config.numero_pauta );
					$('#pauta-listview-numero-'+config.id_pauta).html( config.numero_pauta );
					alert(data.texto);
					
				}  else if(config.retorno == 'edit-reuniao') {
					
					if($.trim(config.numero_pauta) == '')
						config.numero_pauta = ' (a definir)';
					
					$('#edit-reuniao-convocacao').html( config.numero_pauta );
					alert(data.texto);
					
				} else if(config.retorno == 'excluir-processo') {
					
					alert(data.texto);
					
				} else if(config.retorno == 'filtro-listar-processos') {

					window.location.href = 'listar_processos.php';
					
				}  else if(config.retorno == 'filtro-listar-reunioes') {

					window.location.href = 'listar_reunioes.php';
					
				} else if(config.retorno == 'filtro-listar-pautas') {
					
					window.location.href = 'listar_pautas.php';
					
				} else if(config.retorno == 'add-nova-pauta') {
					
					resetarNovaPauta();
					alert(data.texto);
					$.mobile.changePage('nova_pauta.php', config.param);
					
				}  else if(config.retorno == 'add-nova-reuniao') {
					
					resetarNovaReuniao();
					alert(data.texto);
					$.mobile.changePage('nova_reuniao.php', config.param);
					
				}  else if(config.retorno == 'esqueci-senha') {
					
					alert(data.texto);
					$.mobile.changePage('index.php', config.param);
					
				} else {
				
					alert(data.texto);
					
				}
			} else if(data.status == '2') {
//				Sessao invalida. Redirecionar para pagina de login
				$.mobile.changePage('index.php');
			} else if(data.status == '3') {

				if(config.retorno == 'login') {
					
					$('.ui-page-active #div-login-retorno').html(data.erro).fadeIn().delay(1500).fadeOut();
					
				} else {
					msg = 'erro! ' + data.erro;
	//				Ocorreu algum erro!
					alert(data.erro);
			}
			}
			/*
			 * Tratar status de retorno
			 * status 1 - ok
			 * status 2 - nao logado, ou sessao expirada
			 * status 3 - erro, sql ou algo do tipo
			 */
		},
		error: function(xhr, err){
			$.mobile.hidePageLoadingMsg();
			$("<div class='ui-loader ui-overlay-shadow ui-body-e ui-corner-all'><hi>"
					+ $.mobile.pageLoadErrorMessage + "</h1></div>")
			.css({"display":'block','opacity':0.96})
			.appendTo("#div-retorno")
			.delay(800)
			.fadeOut(400, function(){
				$(this).remove();
			});
		}
	});
	
}