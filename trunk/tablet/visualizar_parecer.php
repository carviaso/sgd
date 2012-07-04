<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProcessoC = new ProcessoC();
$arrayProcesso = $objProcessoC->getProcessoPorId($_GET['id']);

$objStatus = new StatusProcessoC();
$arrayStatus = $objStatus->getStatus();

$retorno = 'listar_processos.php';
if($_GET['lista'] == '2') {
	$retorno = 'listar_processos_andamento.php';
} elseif($_GET['lista'] == '3') {
	$retorno = 'reuniao_listar_processos.php';
}
?>
<html>
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="vvisualizar-parecer" data-role="page" class="type-interior">

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
				<h1 id="titulo-edit-processo"><?php echo $arrayProcesso['numero']; ?></h1>
				<a href="<?php echo $retorno; ?>" rel="external" data-icon="back" data-theme="e">Voltar</a>
			</div></div>
		</div>

		<div class="content-page">
		
			<div class="ui-body ui-body-c ui-corner-all">
				
				<p><?php echo nl2br($arrayProcesso['parecer']); ?></p>
								
				<fieldset class="ui-grid-a">
					<div align="center">
						<a data-role="button" href="<?php echo $retorno; ?>" rel="external" data-transition="slide" data-icon="back" data-theme="e" data-inline="true">Voltar</a>
						<button onclick="imprimirParecer('<?php echo $arrayProcesso['id_processo']; ?>')" type="submit" data-theme="a" data-icon="info" data-inline="true">Imprimir</button>
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