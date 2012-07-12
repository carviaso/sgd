<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProcessoC = new ProcessoC();
$condicao = array();
$condicao['ID_PAUTA'] = $_GET['id_pauta'];
$array = $objProcessoC->getProcessos(true, $condicao);

$objReuniaoC = new ReuniaoC();
$arrayReuniao = $objReuniaoC->getReuniaoPorId($_GET['id_reuniao']);

$retorno = 'listar_reunioes.php';
if(@$_GET['lista'] == '2') {
	$retorno = '';
}
?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="reuniao-listar-processos" data-role="page" class="type-interior" data-dom-cache="true">

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
				<h1>Processos da convocação nº <span id="reuniao-numero-pauta"><?php echo $arrayReuniao['numero_pauta']; ?></span></h1>
					<?php if($retorno != '') { ?>
						<a href="<?php echo $retorno; ?>" rel="external" data-icon="back" data-theme="e">Voltar</a>
					<?php } ?>	
					<input type="hidden" id="id-pauta" value="<?php echo $_GET['id_pauta']; ?>" />
					<input type="hidden" id="id-reuniao" value="<?php echo $_GET['id_reuniao']; ?>" />
					<input type="hidden" id="id-lista" value="<?php echo @$_GET['lista']; ?>" />
			</div></div>
		</div>
		<div class="content-page">
		
			<div class="ui-body ui-body-c ui-corner-all">
				<div data-role="fieldcontain">
				    <label class="ui-input-text" for="numero_processo">Status:</label>
					<?php echo $arrayReuniao['nome_status_reuniao']; ?>
				</div>
				<div data-role="fieldcontain">
				    <label class="ui-input-text" for="numero_processo">Local:</label>
					<?php echo $arrayReuniao['local_reuniao']; ?>
				</div>
				<div data-role="fieldcontain">
				    <label class="ui-input-text" for="numero_processo">Data / hora:</label>
					<?php echo $arrayReuniao['data_reuniao']; ?>
				</div>
				<div data-role="fieldcontain" align="right">
					<?php if($arrayReuniao['arquivo_ata'] != '') { ?>
						<button onclick="downloadAta('<?php echo $arrayReuniao['id_reuniao']; ?>')" type="submit" data-theme="c" data-icon="info" data-mini="false" data-inline="true">Imprimir ata</button>
					<?php } ?>
				
					<button onclick="pautaPdf('<?php echo "{$_GET['id_pauta']}"; ?>')" type="submit" data-theme="c" data-icon="info" data-mini="false" data-inline="true">Imprimir pauta</button>
					<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
					   <button onclick="selecionarProcesso('?id_reuniao=<?php echo $_GET['id_reuniao']; ?>&id_pauta=<?php echo $_GET['id_pauta']; ?>&lista=<?php echo @$_GET['lista']; ?>')" type="submit" data-theme="a" data-icon="plus" data-inline="true">Adicionar novo processo</button>
					<?php } ?>
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
								<button onclick="visualizarParecerProcessoPageSimplificado('<?php echo "{$processo['id_processo']}"; ?>','<?php echo $_GET['id_pauta'] ?>','<?php echo $arrayReuniao['id_reuniao']; ?>','<?php echo @$_GET['lista']; ?>')" id="btn-parecer-<?php echo "{$processo['id_processo']}"; ?>" type="submit" data-theme="e" data-icon="info" data-mini="true" data-inline="true">Parecer</button>
							<?php } ?>
							<?php if( ($processo['meu_processo'] == '1' && $processo['processo_ativo']) || in_array($_SESSION['CPPD']['PERFIL'], array('1','2')) ) { ?>
								<button onclick="processoEditFormSimplificado('<?php echo "{$processo['id_processo']}"; ?>','<?php echo $_GET['id_pauta'] ?>','<?php echo $arrayReuniao['id_reuniao']; ?>','<?php echo @$_GET['lista']; ?>')" type="submit" data-theme="c" data-icon="gear" data-mini="true" data-inline="true">Editar</button>
							<?php } ?>
							<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
								<button onclick="processoExcluirDaPauta('<?php echo "{$processo['id_processo']}"; ?>','<?php echo $_GET['id_pauta'] ?>','<?php echo $arrayReuniao['numero_pauta']; ?>')" type="submit" data-theme="c" data-icon="delete" data-mini="true" data-inline="true">Excluir</button>
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