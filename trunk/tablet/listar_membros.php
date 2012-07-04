<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objMembroC = new MembroC();
$array = $objMembroC->getMembrosAtivos();

//echo '<pre>';
//print_r($array);
//die();
?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="listar-membros" data-role="page" class="type-interior">

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
				<h1>Listar Membros</h1>
			</div></div>
		</div>
		<div class="content-page">
			<?php
			if(count($array) > 0) { ?>
				<ol data-role="listview" data-inset="true">
				<?php foreach ($array as $membro) { ?>
				<li>
					<a href="#" onclick="membroEdit('<?php echo $membro['id_membro']; ?>')" data-transition="slide" data-prefetch><?php echo "{$membro['nome']} ({$membro['siglaDepartamento']}/{$membro['siglaCentro']})" ?>	</a>
				</li>
				<?php } ?>
			</ol>
			<?php } else {
				echo "Nenhum registro";
			}?>
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>

</body>
</html>