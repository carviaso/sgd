<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProfessorC = new ProfessorC();
$prof = $objProfessorC->getDadosProfessor($_GET['id-professor']);

//echo '<pre>';
//print_r($prof);
//die();
?>
<html class="ui-mobile-rendering"> 
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="add-membro-edit" data-role="page" class="type-interior" data-cache="false"  data-dom-cache="false">

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
				<h1><?php echo $prof['nome']; ?></h1>
				<a href="#" data-rel="back" data-icon="back" data-theme="e">Voltar</a>
			</div></div>
		</div>
		<div class="content-page">
		
			<div class="ui-body ui-body-c ui-corner-all">
		
				<fieldset data-role="controlgroup">
			     	<input type="radio" name="am_membro" id="am_sim" value="1" <?php if($prof['ativo'] == '0') echo 'checked'; ?> />
			     	<label for="am_sim">Tornar membro da CPPD</label>
			
			     	<input type="radio" name="am_membro" id="am_nao" value="0" <?php if($prof['ativo'] == '1') echo 'checked'; ?> />
			     	<label for="am_nao">Excluir membro</label>
				</fieldset>
			    <div data-role="fieldcontain">
					<fieldset data-role="controlgroup">
				     	<label for="email-membro">E-mail:</label>
			       		<input type="email" id="email-membro" value="<?php echo $prof['email'] ?>" data-mini="true" />
				    </fieldset>
				</div>
				<fieldset class="ui-grid-a">
					<div align="center">
						<button onclick="salvarAddAlterarMembro('<?php echo $_GET['id-professor'] ?>', '<?php  echo $_GET['m']; ?>')" type="submit" data-theme="a" data-icon="check" data-inline="true">Salvar</button>
					</div>
			    </fieldset>
			    
		    
		    </div>
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>
<script type="text/javascript">
/*
 * Força checked
 */
$('#add-membro-edit').live('pageshow', function (event, ui) {

});
</script>
</body>
</html>