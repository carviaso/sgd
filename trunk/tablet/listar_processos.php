<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProcessoC = new ProcessoC();
$array = $objProcessoC->getProcessos(true);

$objAssunto = new AssuntoProcessoC();
$arrayAssunto = $objAssunto->getAssuntos();

$objStatus = new StatusProcessoC();
$arrayStatus = $objStatus->getStatus();

?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="listar-processos" data-role="page" class="type-interior" data-dom-cache="true">

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
				<h1>Listar Processos</h1>
			</div></div>
		</div>
		<div class="content-page">
		
			<div class="ui-body ui-body-c ui-corner-all">
				<div data-role="fieldcontain">
					<fieldset data-role="controlgroup">
				     	<label for="numero_processo">Número:</label>
			       		<input type="tel" name="name" id="numero_processo" value="<?php echo $_SESSION['CPPD']['FILTRO_PROCESSO_NUMERO']; ?>" data-mini="true" />
				    </fieldset>
				 </div>
				 <div data-role="fieldcontain">
					<label for="select-choice-custom-status" class="select">Status:</label>
					<select name="select-choice-2" id="select-choice-custom-status" data-native-menu="false" data-mini="true">
						<option value="0">&nbsp;</option>
						<?php foreach ($arrayStatus as $key => $status) { ?>
							<option <?php if($status['id_status_processo'] == $_SESSION['CPPD']['FILTRO_PROCESSO_STATUS']) echo 'selected'; ?> value="<?php echo $status['id_status_processo']; ?>"><?php echo $status['nome']; ?></option>
						<?php } ?>
					</select>
				</div>
				 <div data-role="fieldcontain">
					<label for="select-choice-custom" class="select">Assunto:</label>
					<select name="select-choice-1" id="select-choice-custom" data-native-menu="false" data-mini="true">
						<option value="0">&nbsp;</option>
						<?php foreach ($arrayAssunto as $key => $assunto) { ?>
							<option <?php if($assunto['id_assunto_processo'] == $_SESSION['CPPD']['FILTRO_PROCESSO_ASSUNTO']) echo 'selected'; ?> value="<?php echo $assunto['id_assunto_processo']; ?>"><?php echo $assunto['nome']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div data-role="fieldcontain">
				    <label class="select ui-select" for="requerente_processo">Requerente:</label>
				    <div class="ui-select">
				 		<a href="#" onclick="selecionarRequerente()" data-role="button" id="requerente_processo" data-mini="true" data-iconpos="right" data-icon="arrow-r">
				 			<span id="nome_requerente_selecionado"><?php echo $_SESSION['CPPD']['FILTRO_PROCESSO_NOME_REQ']; ?></span>
				 		</a>
				 	</div>
				 	<input type="hidden" id="id_requerente_selecionado" value="<?php echo $_SESSION['CPPD']['FILTRO_PROCESSO_ID_REQ']; ?>">
				</div>
				<div data-role="fieldcontain">
				    <label class="select ui-select" for="relator_processo">Relator:</label>
				    <div class="ui-select">
				 		<a href="#" onclick="selecionarRelator()" data-role="button" id="relator_processo" data-mini="true" data-iconpos="right" data-icon="arrow-r">
				 			<span id="nome_relator_selecionado"><?php echo $_SESSION['CPPD']['FILTRO_PROCESSO_NOME_REL']; ?></span>
				 		</a>
				 	</div>
				 	<input type="hidden" id="id_relator_selecionado" value="<?php echo $_SESSION['CPPD']['FILTRO_PROCESSO_ID_REL']; ?>">
				</div>
				<div data-role="fieldcontain" align="center">
					<button onclick="limparListaProcesso()" type="submit" data-theme="e" data-icon="delete" data-inline="true">Limpar</button>
					<button onclick="filtrarListaProcesso()" type="submit" data-theme="a" data-icon="refresh" data-inline="true">Filtrar</button>
				</div>
			</div>
		
			<?php
			if(count($array) > 0) { ?>
				<ul data-role="listview" data-inset="true" id="processo-listview">
				<?php foreach ($array as $processo) { ?>
				<li data-icon="false" id="li-processo-<?php echo "{$processo['id_processo']}"; ?>">
					<a href="#" class="lista-processo-unique" id="linha-processo-<?php echo "{$processo['id_processo']}"; ?>" data-processoid="<?php echo "{$processo['id_processo']}"; ?>"
						 data-processonumero="<?php echo "{$processo['numero']}"; ?>" data-transition="slide" data-theme="a" data-prefetch>
						<h3 style="white-space:normal;">Processo: <?php echo "{$processo['numero']}"; ?>, <?php echo "{$processo['nome_requerente']} ({$processo['siglaDepartamento']}/{$processo['siglaCentro']})"; ?></h3>
						<p><strong>Assunto: <?php echo "{$processo['assunto']}"; ?></strong></p>
						<p><strong>Status: <?php echo "{$processo['nome_status']}"; ?></strong></p>
						<p>Relator: <?php echo "{$processo['nome_relator']}"; ?></p>
						<div class="btn-listview-button">
							<?php if($processo['parecer'] != '') { ?>
								<button onclick="visualizarParecerProcessoPage('<?php echo "{$processo['id_processo']}"; ?>','1')" id="btn-parecer-<?php echo "{$processo['id_processo']}"; ?>" type="submit" data-theme="e" data-icon="info" data-mini="true" data-inline="true">Parecer</button>
							<?php } ?>
							<?php if( ($processo['meu_processo'] == '1' && $processo['processo_ativo']) || in_array($_SESSION['CPPD']['PERFIL'], array('1','2')) ) { ?>
							<button onclick="processoEditForm('<?php echo "{$processo['id_processo']}"; ?>','1')" type="submit" data-theme="c" data-icon="gear" data-mini="true" data-inline="true">Editar</button>
							<?php } ?>
							<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
								<button onclick="processoExcluir('<?php echo "{$processo['id_processo']}"; ?>')" type="submit" data-theme="c" data-icon="delete" data-mini="true" data-inline="true">Excluir</button>
							<?php } ?>
						</div>
						<?php if($processo['parecer'] != '') { ?>
						<div id="parecer-<?php echo "{$processo['id_processo']}"; ?>" style="display: none; margin: 10px 0;clear: both;">
							<p><?php echo nl2br($processo['parecer']); ?></p>
						</div>
						<?php } ?>
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