<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objPautaC = new PautaC();
$condicao = array();
$condicao['REUNIAO'] = '1';
$arrayPauta = $objPautaC->getPautas(false, $condicao);

?>
<html>
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="nova-reuniao" data-role="page" class="type-interior" data-dom-cache="true">

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
					<h1>Nova Reunião</h1>
				</div></div>
			</div>
		<div class="content-page">
			 
			<div class="ui-body ui-body-c ui-corner-all">
			
			<div data-role="fieldcontain">
				<label for="select-choice-pauta" class="select">Pauta:</label>
				<select name="select-choice-1" id="select-choice-pauta" data-native-menu="false" data-mini="true">
					<option value="0">&nbsp;</option>
					<?php foreach ($arrayPauta as $key => $pauta) { ?>
						<option value="<?php echo $pauta['id_pauta']; ?>"><?php echo $pauta['numero']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div data-role="fieldcontain">
			    <label class="select ui-select" for="reuniao-local">Local: <span class="asterisco">*<span></label>
			    <input type="text" name="reuniao-local" id="reuniao-local" value="" data-mini="true" />
			</div>
			<div data-role="fieldcontain">
				<input type="hidden" value="<?php echo date('d') -1; ?>" id="nova-reuniao-dia-default">
				<input type="hidden" value="<?php echo date('m') -1; ?>" id="nova-reuniao-mes-default">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			    	<label for="select-reuniao-dia">Dia</label>
					<select name="select-reuniao-dia" id="select-reuniao-dia" data-mini="true">
						<?php for($i = 1; $i <= 31; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if(date('d') == $i) echo 'selected'; ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
			    
			    	<legend>Data: <span class="asterisco">*<span></legend>
			    	<label for="select-reuniao-mes">Mes</label>
					<select name="select-reuniao-mes" id="select-reuniao-mes" data-mini="true">
						<option value="1" <?php if(date('m') == '1') echo 'selected'; ?>>Jan</option>
						<option value="2" <?php if(date('m') == '2') echo 'selected'; ?>>Fev</option>
						<option value="3" <?php if(date('m') == '3') echo 'selected'; ?>>Mar</option>
						<option value="4" <?php if(date('m') == '4') echo 'selected'; ?>>Abr</option>
						<option value="5" <?php if(date('m') == '5') echo 'selected'; ?>>Mai</option>
						<option value="6" <?php if(date('m') == '6') echo 'selected'; ?>>Jun</option>
						<option value="7" <?php if(date('m') == '7') echo 'selected'; ?>>Jul</option>
						<option value="8" <?php if(date('m') == '8') echo 'selected'; ?>>Ago</option>
						<option value="9" <?php if(date('m') == '9') echo 'selected'; ?>>Set</option>
						<option value="10" <?php if(date('m') == '10') echo 'selected'; ?>>Out</option>
						<option value="11" <?php if(date('m') == '11') echo 'selected'; ?>>Nov</option>
						<option value="12" <?php if(date('m') == '12') echo 'selected'; ?>>Dez</option>
					</select>
			
					<label for="select-reuniao-ano">Ano</label>
					<select name="select-reuniao-ano" id="select-reuniao-ano" data-mini="true">
						<?php for($i = 2012; $i <= 2025; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if(date('Y') == $i) echo 'selected'; ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
			    </fieldset>
			</div>
			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			    	<legend>Hora: <span class="asterisco">*<span></legend>
			    	<label for="select-reuniao-hora">Hora</label>
					<select name="select-reuniao-hora" id="select-reuniao-hora" data-mini="true">
						<option value="7">7h</option>
						<option value="8">8h</option>
						<option value="9">9h</option>
						<option value="10">10h</option>
						<option value="11">11h</option>
						<option value="12">12h</option>
						<option value="13">13h</option>
						<option value="14" selected="selected">14h</option>
						<option value="15">15h</option>
						<option value="16">16h</option>
						<option value="17">17h</option>
						<option value="18">18h</option>
						<option value="19">19h</option>
						<option value="20">20h</option>
						<option value="21">21h</option>
						<option value="22">22h</option>
						<option value="23">23h</option>
					</select>
			
					<label for="select-reuniao-minuto">Minuto</label>
					<select name="select-reuniao-minuto" id="select-reuniao-minuto" data-mini="true">
						<option value="00" selected="selected">00min</option>
						<option value="15">15min</option>
						<option value="30">30min</option>
						<option value="45">45min</option>
						
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
			 
			 
			<fieldset class="ui-grid-a">
				<span style='float: left;font-size: small'>[* Obrigatório]</span>
				<div align="center">
<!--						<button onclick="limparNovoProcesso()" type="submit" data-theme="e" data-icon="delete" data-inline="true">Limpar</button>-->
					<button onclick="salvarReuniao()" type="submit" data-theme="a" data-icon="check" data-inline="true">Salvar</button>
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