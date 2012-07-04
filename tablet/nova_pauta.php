<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProcessoC = new ProcessoC();
$condicao = array();
$condicao['STATUS'] = '3,4,5,7,8';
$arrayProcesso = $objProcessoC->getProcessos(false, $condicao);

?>
<html>
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="nova-pauta" data-role="page" class="type-interior" data-dom-cache="true">

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
					<h1>Nova Pauta</h1>
				</div></div>
			</div>
		<div class="content-page">
	
	<div class="ui-body ui-body-c ui-corner-all">
			<div data-role="fieldcontain">
				<fieldset data-role="controlgroup">
			     	<label for="numero_pauta">Número: <span class="asterisco">*<span></label>
		       		<input type="tel" name="name" id="numero_pauta" value="" data-mini="true" />
			    </fieldset>
			 </div>
			 
			 <div data-role="fieldcontain">
				<fieldset data-role="controlgroup">
				   <legend>Liberar pauta: </legend>
				   <input type="checkbox" id="checkbox-liberar-pauta" class="custom" data-mini="true" />
				   <label for="checkbox-liberar-pauta">Disponibilizar pauta para apreciação dos membros</label>
			    </fieldset>
			</div>
			 
			 <div  data-role="fieldcontain">
			 	<fieldset data-role="controlgroup">
					<?php foreach ($arrayProcesso as $processo) { ?>
						<input type="checkbox" name="checkbox-processo" id="checkbox-processo-<?php echo $processo['id_processo']; ?>" value="<?php echo $processo['id_processo']; ?>" class="custom" />
						<label for="checkbox-processo-<?php echo $processo['id_processo']; ?>">
							<div style="font-weight: normal;">
								<strong>Processo: <?php echo $processo['numero']; ?></strong><br />
								Requerente: <?php echo "{$processo['nome_requerente']} ({$processo['siglaDepartamento']}/{$processo['siglaCentro']})"; ?><br />
								Relator: <?php echo "{$processo['nome_relator']}"; ?><br />
								Status: <?php echo "{$processo['nome_status']}"; ?>
							</div>
						</label>
					<?php } ?>
			    </fieldset>
			</div>
			 
			<fieldset class="ui-grid-a">
				<span style='float: left;font-size: small'>[* Obrigatório]</span>
				<div align="center">
<!--						<button onclick="limparNovoProcesso()" type="submit" data-theme="e" data-icon="delete" data-inline="true">Limpar</button>-->
					<button onclick="salvarPauta()" type="submit" data-theme="a" data-icon="check" data-inline="true">Salvar</button>
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