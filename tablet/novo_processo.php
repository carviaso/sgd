<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objAssunto = new AssuntoProcessoC();
$arrayAssunto = $objAssunto->getAssuntos();

$objStatus = new StatusProcessoC();
$arrayStatus = $objStatus->getStatus();
?>
<html>
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="novo-processo" data-role="page" class="type-interior" data-dom-cache="true">

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
					<h1>Novo Processo</h1>
				</div></div>
			</div>
		<div class="content-page">
		
		<div class="ui-body ui-body-c ui-corner-all">
	
			<div data-role="fieldcontain">
				<fieldset data-role="controlgroup">
			     	<label for="numero_processo">Número: <span class="asterisco">*<span></label>
		       		<input type="tel" name="name" id="numero_processo" value="" data-mini="true" />
			    </fieldset>
			 </div>
			 <div data-role="fieldcontain">
				<label for="select-choice-custom-status" class="select">Status: <span class="asterisco">*<span></label>
				<select name="select-choice-2" id="select-choice-custom-status" data-native-menu="false" data-mini="true">
					<option value="0">&nbsp;</option>
					<?php foreach ($arrayStatus as $key => $status) { ?>
						<option <?php if($status['id_status_processo'] == '8') echo 'selected'; ?> value="<?php echo $status['id_status_processo']; ?>"><?php echo $status['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div data-role="fieldcontain">
				<label for="select-choice-custom" class="select">Assunto: <span class="asterisco">*<span></label>
				<select name="select-choice-1" id="select-choice-custom" data-native-menu="false" data-mini="true">
					<option value="0">&nbsp;</option>
					<?php foreach ($arrayAssunto as $key => $assunto) { ?>
						<option value="<?php echo $assunto['id_assunto_processo']; ?>"><?php echo $assunto['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div data-role="fieldcontain">
			    <label class="select ui-select" for="requerente_processo">Requerente: <span class="asterisco">*<span></label>
			    <div class="ui-select">
			 		<a href="#" onclick="selecionarRequerente()" data-role="button" id="requerente_processo" data-mini="true" data-iconpos="right" data-icon="arrow-r">
			 			<span id="nome_requerente_selecionado"></span>
			 		</a>
			 	</div>
			 	<input type="hidden" id="id_requerente_selecionado" value="">
			</div>
			<div data-role="fieldcontain">
			    <label class="select ui-select" for="relator_processo">Relator: <span class="asterisco">*<span></label>
			    <div class="ui-select">
			 		<a href="#" onclick="selecionarRelator()" data-role="button" id="relator_processo" data-mini="true" data-iconpos="right" data-icon="arrow-r">
			 			<span id="nome_relator_selecionado"></span>
			 		</a>
			 	</div>
			 	<input type="hidden" id="id_relator_selecionado" value="">
			</div>
			<div data-role="fieldcontain">
			    <label class="select ui-select" for="parecer-processo">Parecer:</label>
			    <textarea id="parecer-processo" name="parecer-processo" style="height: 100px"></textarea>
			</div>
			<fieldset class="ui-grid-a">
				<span style='float: left;font-size: small'>[* Obrigatório]</span>
				<div align="center">
<!--						<button onclick="limparNovoProcesso()" type="submit" data-theme="e" data-icon="delete" data-inline="true">Limpar</button>-->
					<button onclick="salvarProcesso()" type="submit" data-theme="a" data-icon="check" data-inline="true">Salvar</button>
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