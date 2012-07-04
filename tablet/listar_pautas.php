<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objPautaC = new PautaC();
$array = $objPautaC->getPautas(true);

//echo '<pre>';
//print_r($array);
//die();
?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="listar-pautas" data-role="page" class="type-interior" data-dom-cache="true">

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
				<h1>Listar Pautas</h1>
			</div></div>
		</div>
		<div class="content-page">
		
			<div class="ui-body ui-body-c ui-corner-all">
				<div data-role="fieldcontain">
					<fieldset data-role="controlgroup">
				     	<label for="numero_pauta">Número:</label>
			       		<input type="tel" name="name" id="numero_pauta" value="<?php echo $_SESSION['CPPD']['FILTRO_PAUTA_NUMERO']; ?>" data-mini="true" />
				    </fieldset>
				 </div>
				<div data-role="fieldcontain" align="center">
					<button onclick="limparListaPauta()" type="submit" data-theme="e" data-icon="delete" data-inline="true">Limpar</button>
					<button onclick="filtrarListaPauta()" type="submit" data-theme="a" data-icon="refresh" data-inline="true">Filtrar</button>
				</div>
			</div>
		
			<?php
			if(count($array) > 0) { ?>
				<ul data-role="listview" data-inset="true" id="pauta-listview">
				<?php foreach ($array as $pauta) { ?>
				<li data-icon="false" id="li-pauta-<?php echo "{$pauta['id_pauta']}"; ?>">
					<a href="#" class="lista-pauta-unique" id="linha-pauta-<?php echo "{$pauta['id_pauta']}"; ?>" data-pautaid="<?php echo "{$pauta['id_pauta']}"; ?>"
						 data-pautanumero="<?php echo "{$pauta['numero']}"; ?>" data-transition="slide" data-theme="a" data-prefetch>
						<h3 style="white-space:normal;">Número da pauta: <span id="pauta-listview-numero-<?php echo "{$pauta['id_pauta']}"; ?>"><?php echo "{$pauta['numero']}"; ?></span></h3>
						<?php if($pauta['liberar_pauta'] == '1') { ?>
						<p>Pauta liberada para apreciação dos membros</p>
						<?php } ?>
						<div class="btn-listview-button">
							<button onclick="pautaEditForm('<?php echo "{$pauta['id_pauta']}"; ?>')" type="submit" data-theme="c" data-icon="gear" data-mini="true" data-inline="true">Editar</button>
	
							<button onclick="pautaExcluir('<?php echo "{$pauta['id_pauta']}"; ?>')" type="submit" data-theme="c" data-icon="delete" data-mini="true" data-inline="true">Excluir</button>
							<?php if($pauta['liberar_pauta'] == '1') { ?>
								<button onclick="pautaPdf('<?php echo "{$pauta['id_pauta']}"; ?>')" type="submit" data-theme="c" data-icon="info" data-mini="true" data-inline="true">Imprimir</button>
							<?php } ?>
						</div>
					</a>
					
				</li>
				<?php } ?>
			</ul>
			<?php } else {
				echo "Nenhum registro";
			}?>
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>

</body>
</html>