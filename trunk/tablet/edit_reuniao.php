<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objReuniaoC = new ReuniaoC();
$arrayReuniao = $objReuniaoC->getReuniaoPorId($_GET['id']);

$objPresencaC = new PresencaC();
$arrayPresenca = $objPresencaC->getMembrosPorReuniao($_GET['id']);

$objPautaC = new PautaC();
$condicao = array();

$pauta = ($arrayReuniao['id_pauta'] != '')?$arrayReuniao['id_pauta']:'0';

$condicao['REUNIAO_PAUTA'] = $pauta;
$arrayPauta = $objPautaC->getPautas(false, $condicao);

$retorno = 'listar_reunioes.php';
if($_GET['lista'] == '2') {
	$retorno = 'listar_reunioes_proxima.php';
}
?>
<html>
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="edit-reuniao" data-role="page" class="type-interior" data-dom-cache="true">

	<div data-role="header" data-position="fixed" data-theme="a">
		<h1><?php echo SGD_TITULO_CABECALHO; ?></h1>
		<a href="index.php?logout=true" data-transition="fade" data-theme="e">Sair</a>
		<a href="menu.php" id="btn-menu-header" data-rel="dialog" data-transition="fade" data-theme="e">Menu</a>
	</div><!-- /header -->

	<div data-role="content">	
		
		<div class="content-menu">
			<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d">

					<ul data-role="listview" data-theme="c" data-dividertheme="d">

						<?php include_once("./inc/menu_lateral.php"); ?>

					</ul>
			</div>
		</div>

			<div class="ui-grid-a">
				<div class="titulo-corpo-topo"><div class="ui-bar ui-bar-c" data-role="header" style="padding: 1px">
					<h1 id="titulo-edit-processo">Convocação nº<span id="edit-reuniao-convocacao"><?php echo ($arrayReuniao['numero_pauta'] == '')?' (a definir)':$arrayReuniao['numero_pauta']; ?></span></h1>
					<a href="<?php echo $retorno; ?>" rel="external" data-icon="back" data-theme="e">Voltar</a>
				</div></div>
			</div>
		<div class="content-page">
		
		<div class="ui-body ui-body-c ui-corner-all">
	
			<div data-role="fieldcontain">
				<label for="select-choice-pauta" class="select">Pauta:</label>
				<select name="select-choice-1" id="select-choice-pauta" data-native-menu="false" data-mini="true">
					<option value="0">&nbsp;</option>
					<?php foreach ($arrayPauta as $key => $pauta) { ?>
						<option value="<?php echo $pauta['id_pauta']; ?>" <?php if($arrayReuniao['id_pauta'] == $pauta['id_pauta']) echo 'selected'; ?>><?php echo $pauta['numero']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div data-role="fieldcontain">
				<label for="select-choice-status" class="select">Status: <span class="asterisco">*<span></label>
				<select id="select-choice-status" data-native-menu="false" data-mini="true">
					<option value="0" <?php if($arrayReuniao['status_reuniao'] == '0') echo 'selected'; ?>>A ser realizada</option>
					<option value="1" <?php if($arrayReuniao['status_reuniao'] == '1') echo 'selected'; ?>>Realizada</option>
					<option value="2" <?php if($arrayReuniao['status_reuniao'] == '2') echo 'selected'; ?>>Cancelada</option>
				</select>
			</div>
			<div data-role="fieldcontain" id="reuniao-div-motivo" style="display: <?php echo ($arrayReuniao['status_reuniao'] == '2')?'block':'none'; ?>;">
			    <label class="select ui-select" for="reuniao-motivo-cancelamento">Motivo do cancelamento: <span class="asterisco">*<span></label>
			    <textarea id="reuniao-motivo-cancelamento" style="height: 100px"><?php echo $arrayReuniao['motivo_cancelamento']; ?></textarea>
			</div>
			<div data-role="fieldcontain">
			    <label class="select ui-select" for="reuniao-local">Local: <span class="asterisco">*<span></label>
			    <input type="text" name="reuniao-local" id="reuniao-local" value="<?php echo $arrayReuniao['local_reuniao']; ?>" data-mini="true" />
			</div>
			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			    	<label for="select-reuniao-dia">Dia</label>
					<select name="select-reuniao-dia" id="select-reuniao-dia" data-mini="true">
						<?php for($i = 1; $i <= 31; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if($arrayReuniao['data_reuniao_dia'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
			    
			    	<legend>Data: <span class="asterisco">*<span></legend>
			    	<label for="select-reuniao-mes">Mes</label>
					<select name="select-reuniao-mes" id="select-reuniao-mes" data-mini="true">
						<option value="1" <?php if($arrayReuniao['data_reuniao_mes'] == '1') echo 'selected'; ?>>Jan</option>
						<option value="2" <?php if($arrayReuniao['data_reuniao_mes'] == '2') echo 'selected'; ?>>Fev</option>
						<option value="3" <?php if($arrayReuniao['data_reuniao_mes'] == '3') echo 'selected'; ?>>Mar</option>
						<option value="4" <?php if($arrayReuniao['data_reuniao_mes'] == '4') echo 'selected'; ?>>Abr</option>
						<option value="5" <?php if($arrayReuniao['data_reuniao_mes'] == '5') echo 'selected'; ?>>Mai</option>
						<option value="6" <?php if($arrayReuniao['data_reuniao_mes'] == '6') echo 'selected'; ?>>Jun</option>
						<option value="7" <?php if($arrayReuniao['data_reuniao_mes'] == '7') echo 'selected'; ?>>Jul</option>
						<option value="8" <?php if($arrayReuniao['data_reuniao_mes'] == '8') echo 'selected'; ?>>Ago</option>
						<option value="9" <?php if($arrayReuniao['data_reuniao_mes'] == '9') echo 'selected'; ?>>Set</option>
						<option value="10" <?php if($arrayReuniao['data_reuniao_mes'] == '10') echo 'selected'; ?>>Out</option>
						<option value="11" <?php if($arrayReuniao['data_reuniao_mes'] == '11') echo 'selected'; ?>>Nov</option>
						<option value="12" <?php if($arrayReuniao['data_reuniao_mes'] == '12') echo 'selected'; ?>>Dez</option>
					</select>
			
					<label for="select-reuniao-ano">Ano</label>
					<select name="select-reuniao-ano" id="select-reuniao-ano" data-mini="true">
						<?php for($i = 2012; $i <= 2025; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if($arrayReuniao['data_reuniao_ano'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
			    </fieldset>
			</div>
			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			    	<legend>Hora: <span class="asterisco">*<span></legend>
			    	<label for="select-reuniao-hora">Hora</label>
					<select name="select-reuniao-hora" id="select-reuniao-hora" data-mini="true">
					<?php for($i = 7; $i <= 23; $i ++) { ?>
						<option value="<?php echo $i ?>" <?php if($arrayReuniao['data_reuniao_hora'] == $i) echo 'selected'; ?>><?php echo "{$i}h"; ?></option>
					<?php } ?>
					</select>
			
					<label for="select-reuniao-minuto">Minuto</label>
					<select name="select-reuniao-minuto" id="select-reuniao-minuto" data-mini="true">
						<option value="00" <?php if($arrayReuniao['data_reuniao_minuto'] == '00') echo 'selected'; ?>>00min</option>
						<option value="15" <?php if($arrayReuniao['data_reuniao_minuto'] == '15') echo 'selected'; ?>>15min</option>
						<option value="30" <?php if($arrayReuniao['data_reuniao_minuto'] == '30') echo 'selected'; ?>>30min</option>
						<option value="45" <?php if($arrayReuniao['data_reuniao_minuto'] == '45') echo 'selected'; ?>>45min</option>
						
					</select>
			    </fieldset>
			</div>
			
			<div data-role="fieldcontain">
				<fieldset data-role="controlgroup">
				   <legend>E-mail:</legend>
				   <input type="checkbox" name="checkbox-reuniao-email" id="checkbox-reuniao-email" class="custom" data-mini="true" />
				   <label for="checkbox-reuniao-email">Notificar membros por e-mail</label>
			    </fieldset>
			</div>
			<div data-role="fieldcontain">

					<div class="ui-body ui-body-c">
					<h5 style="margin: 0;text-align: right;">Upload da Ata</h5>
				    	<div data-role="fieldcontain" id="bloco-lista-presenca">
						 	
						 	<div data-role="controlgroup" data-type="horizontal" data-mini="true">
								<?php
								$arquivoDisplay = '';
								$classCorner = '';
								$arquivoNome = $arquivoFile = $arrayReuniao['arquivo_ata'];
								if($arrayReuniao['arquivo_ata'] == '') {
									$arquivoNome = 'Clique aqui para selecionar o arquivo';
									$arquivoFile = '';
									$arquivoDisplay = 'none';
									$classCorner = 'ui-corner-right';
								}
								?>
								<a href="#" data-role="button" id="btn-clique-upoad" class="<?php echo $classCorner; ?>" data-icon="arrow-r"><?php echo $arquivoNome; ?></a>
								<a style="display: <?php echo $arquivoDisplay; ?>" href="#" data-role="button" id="btn-clique-upoad-excluir" data-icon="delete">Excluir</a>
								<a style="display: <?php echo $arquivoDisplay; ?>" href="#" onclick="downloadAta('<?php echo $arrayReuniao['id_reuniao']; ?>');" data-role="button" id="btn-clique-upoad-download" data-icon="arrow-d">Download</a>
							</div>
						    <input type="file" name="file_ata" id="file_ata" style="display: none">
						    <input type="text" name="nome-file-ata" id="nome-file-ata" value="<?php echo $arquivoFile; ?>" style="display: none">
						</div>
					</div>
				    		
			</div>

			<div data-role="fieldcontain">
				<div class="ui-body ui-body-c">
				<h5 style="margin: 0;text-align: right;">Lista de presentes na reunião</h5>
		    	<div data-role="fieldcontain" id="bloco-lista-presenca">
				 	<fieldset data-role="controlgroup">
				 		<?php foreach ($arrayPresenca as $key => $membro) { ?>
							<input <?php if($membro['presenca'] == '1') echo 'checked'; ?> data-idmembro="<?php echo $membro['id_membro']; ?>" type="checkbox" name="checkbox-presenca-<?php echo $key; ?>a" id="checkbox-presenca-<?php echo $key; ?>a" class="custom" data-mini="true" data-theme="c" />
							<label for="checkbox-presenca-<?php echo $key; ?>a">
								<?php echo "{$membro['nome']} ({$membro['siglaDepartamento']}/{$membro['siglaCentro']})"; ?>
								<?php if($membro['ativo'] != '1') { ?>
									<span style="color: red;">Inativo</span>
								<?php } ?>
							</label>
						<?php } ?>
				    </fieldset>
				</div>
				</div>
			</div>

			<fieldset class="ui-grid-a">
				<span style='float: left;font-size: small'>[* Obrigatório]</span>
				<div align="center">
					<a data-role="button" href="edit_reuniao.php?id=<?php echo $arrayReuniao['id_reuniao']; ?>&lista=<?php echo $_GET['lista']; ?>" rel="external" data-transition="slide" data-icon="refresh" data-theme="e" data-inline="true">Resetar</a>
					<button onclick="editarReuniao('<?php echo $arrayReuniao['id_reuniao']; ?>')" type="submit" data-theme="a" data-icon="check" data-inline="true">Salvar alterações</button>
				</div>
		    </fieldset>
			
			</div>
			
		</div>

	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>
<script type="text/javascript">
	
</script>
</body>
</html>