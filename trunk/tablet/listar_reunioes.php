<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objReuniaoC = new ReuniaoC();
$array = $objReuniaoC->getReunioes(true);

?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="listar-reunioes" data-role="page" class="type-interior" data-dom-cache="true">

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
				<h1>Listar Reuniões</h1>
			</div></div>
		</div>
		<div class="content-page">

			<div class="ui-body ui-body-c ui-corner-all">
				 <div data-role="fieldcontain">
					<label for="select-filtro-reuniao-status" class="select">Status:</label>
					<select name="select-filtro-reuniao-status" id="select-filtro-reuniao-status" data-native-menu="false" data-mini="true">
						<option value=" ">&nbsp;</option>
						<option value="0" <?php if('0' == @$_SESSION['CPPD']['FILTRO_REUNIAO_ID_STATUS']) echo 'selected'; ?>>A ser realizada</option>
						<option value="1" <?php if('1' == @$_SESSION['CPPD']['FILTRO_REUNIAO_ID_STATUS']) echo 'selected'; ?>>Realizada</option>
						<option value="2" <?php if('2' == @$_SESSION['CPPD']['FILTRO_REUNIAO_ID_STATUS']) echo 'selected'; ?>>Cancelada</option>
					</select>
				</div>
				<div data-role="fieldcontain">
				    <label class="select ui-select" for="pauta_reuniao">Pauta:</label>
				    <div class="ui-select">
				 		<a href="#" onclick="selecionarPauta()" data-role="button" id="pauta_reuniao" data-mini="true" data-iconpos="right" data-icon="arrow-r">
				 			<span id="numero_pauta_reuniao"><?php echo @$_SESSION['CPPD']['FILTRO_REUNIAO_NUMERO_PAUTA']; ?></span>
				 		</a>
				 	</div>
				 	<input type="hidden" id="id_pauta_reuniao" value="<?php echo @$_SESSION['CPPD']['FILTRO_REUNIAO_ID_PAUTA']; ?>">
				</div>
				<div data-role="fieldcontain">
				    <fieldset data-role="controlgroup" data-type="horizontal">
				    	<label for="select-filtro-reuniao-dia-i">Dia</label>
						<select id="select-filtro-reuniao-dia-i" data-mini="true">
							<option value=""> &nbsp; </option>
							<?php for($i = 1; $i <= 31; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if($i == @$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_INICIO']) echo 'selected'; ?>><?php echo $i; ?></option>
							<?php } ?>
						</select>
				    
				    	<legend>Data início:</legend>
				    	<label for="select-filtro-reuniao-mes-i">Mes</label>
						<select id="select-filtro-reuniao-mes-i" data-mini="true">
							<option value=""> &nbsp; </option>
							<option value="1" <?php if('1' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Jan</option>
							<option value="2" <?php if('2' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Fev</option>
							<option value="3" <?php if('3' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Mar</option>
							<option value="4" <?php if('4' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Abr</option>
							<option value="5" <?php if('5' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Mai</option>
							<option value="6" <?php if('6' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Jun</option>
							<option value="7" <?php if('7' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Jul</option>
							<option value="8" <?php if('8' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Ago</option>
							<option value="9" <?php if('9' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Set</option>
							<option value="10" <?php if('10' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Out</option>
							<option value="11" <?php if('11' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Nov</option>
							<option value="12" <?php if('12' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_INICIO']) echo 'selected'; ?>>Dez</option>
						</select>
				
						<label for="select-filtro-reuniao-ano-i">Ano</label>
						<select id="select-filtro-reuniao-ano-i" data-mini="true">
							<option value=""> &nbsp; </option>
							<?php for($i = 2012; $i <= 2025; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if($i == @$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_INICIO']) echo 'selected'; ?>><?php echo $i; ?></option>
							<?php } ?>
						</select>
				    </fieldset>
				</div>
				<div data-role="fieldcontain">
				    <fieldset data-role="controlgroup" data-type="horizontal">
				    	<label for="select-filtro-reuniao-dia-f">Dia</label>
						<select id="select-filtro-reuniao-dia-f" data-mini="true">
							<option value=""> &nbsp; </option>
							<?php for($i = 1; $i <= 31; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if($i == @$_SESSION['CPPD']['FILTRO_REUNIAO_DIA_FINAL']) echo 'selected'; ?>><?php echo $i; ?></option>
							<?php } ?>
						</select>
				    
				    	<legend>Data final:</legend>
				    	<label for="select-filtro-reuniao-mes-f">Mes</label>
						<select id="select-filtro-reuniao-mes-f" data-mini="true">
							<option value=""> &nbsp; </option>
							<option value="1" <?php if('1' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Jan</option>
							<option value="2" <?php if('2' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Fev</option>
							<option value="3" <?php if('3' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Mar</option>
							<option value="4" <?php if('4' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Abr</option>
							<option value="5" <?php if('5' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Mai</option>
							<option value="6" <?php if('6' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Jun</option>
							<option value="7" <?php if('7' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Jul</option>
							<option value="8" <?php if('8' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Ago</option>
							<option value="9" <?php if('9' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Set</option>
							<option value="10" <?php if('10' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Out</option>
							<option value="11" <?php if('11' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Nov</option>
							<option value="12" <?php if('12' == @$_SESSION['CPPD']['FILTRO_REUNIAO_MES_FINAL']) echo 'selected'; ?>>Dez</option>
						</select>
				
						<label for="select-filtro-reuniao-ano-f">Ano</label>
						<select id="select-filtro-reuniao-ano-f" data-mini="true">
							<option value=""> &nbsp; </option>
							<?php for($i = 2012; $i <= 2025; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if($i == @$_SESSION['CPPD']['FILTRO_REUNIAO_ANO_FINAL']) echo 'selected'; ?>><?php echo $i; ?></option>
							<?php } ?>
						</select>
				    </fieldset>
				</div>
				<div data-role="fieldcontain" align="center">
					<button onclick="limparListaReuniao()" type="submit" data-theme="e" data-icon="delete" data-inline="true">Limpar</button>
					<button onclick="filtrarListaReuniao()" type="submit" data-theme="a" data-icon="refresh" data-inline="true">Filtrar</button>
				</div>
				
			</div>
			
			<?php
			if(count($array) > 0) { ?>
				<ul data-role="listview" data-inset="true" id="reuniao-listview">
				<?php foreach ($array as $reuniao) {
					$descricao = '';
					if($reuniao['pauta_liberada'] == '0' && !in_array($_SESSION['CPPD']['PERFIL'], array('1','2')) && $reuniao['numero_pauta'] != '') {
						$descricao = ' (Pauta não liberada)';
					}
					
					?>
				<li data-icon="false" id="li-reuniao-<?php echo "{$reuniao['id_reuniao']}"; ?>">
					<a href="#" class="lista-reuniao-unique" id="linha-reuniao-<?php echo "{$reuniao['id_reuniao']}"; ?>" data-reuniaoid="<?php echo "{$reuniao['id_reuniao']}"; ?>"
						 data-transition="slide" data-theme="a" data-prefetch>
						<h3 style="white-space:normal;">Pauta: <?php echo ($reuniao['numero_pauta'] != '')?$reuniao['numero_pauta']."".$descricao:"<span class='reuniao-destaque'>a definir</span>"; ?></h3>
						<p>Local: <?php echo $reuniao['local_reuniao']; ?></p>
						<p>Status: <?php echo $reuniao['nome_status_reuniao']; ?></p>
						<?php if($reuniao['total_membro'] > 0) { ?>
							<p>Membros presentes: <?php echo $reuniao['total_presente']."/".$reuniao['total_membro']; ?></p>
						<?php } ?>
						<p class="ui-li-aside"><strong><?php echo $reuniao['data_reuniao']; ?></strong></p>
						
						<div class="btn-listview-button">
							<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
								<button onclick="reuniaoEditForm('<?php echo "{$reuniao['id_reuniao']}"; ?>','1')" type="submit" data-theme="d" data-icon="gear" data-mini="true" data-inline="true">Editar</button>
							<?php } ?>
						
							<?php if(	($reuniao['id_pauta'] != '' && $reuniao['id_pauta'] != '0') &&
										($reuniao['pauta_liberada'] == '1' || in_array($_SESSION['CPPD']['PERFIL'], array('1','2')))
										) { ?>
								<button onclick="reuniaoListarProcessos('<?php echo "{$reuniao['id_reuniao']}"; ?>','<?php echo "{$reuniao['id_pauta']}"; ?>','1')" type="submit" data-theme="e" data-icon="grid" data-mini="true" data-inline="true">Processos</button>
							<?php } ?>
							
							<?php if($reuniao['arquivo_ata'] != '') { ?>
								<button onclick="downloadAta('<?php echo "{$reuniao['id_reuniao']}"; ?>')" type="submit" data-theme="c" data-icon="info" data-mini="true" data-inline="true">Imprimir Ata</button>
							<?php } ?>
							
							<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
								<button onclick="reuniaoExcluir('<?php echo "{$reuniao['id_reuniao']}"; ?>')" type="submit" data-theme="c" data-icon="delete" data-mini="true" data-inline="true">Excluir</button>
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