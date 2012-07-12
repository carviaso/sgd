<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$array = array();
$nome_pesquisa = '';
if(isset($_GET['nome-membro']) && strlen($_GET['nome-membro']) > 2) {
	$nome_pesquisa = $_GET['nome-membro'];
	$objProfessorC = new ProfessorC();
	$array = $objProfessorC->getProfessores($_GET['nome-membro']);
}

?>
<html class="ui-mobile-rendering"> 
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="add-membro" data-role="page" class="type-interior">

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
				<h1>Adicionar Membro</h1>
			</div></div>
		</div>
		<div class="content-page">
			<div id="retorno-add-membro"></div>
			<form action="./add_membro.php" method="get">
				<label for="pes-nome-membro">Pesquisar por nome:</label>
				<input type="search" name="nome-membro" id="pes-nome-membro" value="<?php echo $nome_pesquisa; ?>" />
			</form>
			<?php
			if(count($array) > 0) { ?>
				<ul data-role="listview" data-inset="true">
				<?php foreach ($array as $prof) { ?>
				<li>
					<a onclick="addMembroEdit('<?php echo $prof['id_professor']; ?>','<?php echo $nome_pesquisa; ?>')" href="#" data-transition="slide">
						<h3 id="listagem_prof_<?php echo $prof['id_professor']; ?>"><?php echo "{$prof['nome']} ({$prof['siglaDepartamento']}/{$prof['siglaCentro']})" ?></h3>
						<?php if($prof['id_membro'] != '' && $prof['ativo'] == '1') { ?>
							<p>Membro da CPPD</p>
						<?php } ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		<?php } else {
				if(isset($_GET['nome-membro'])) {
					if(strlen($_GET['nome-membro']) < 3) {
						echo "Nenhum registro.";
					}
				} else {
					echo "Digite no mínimo 3 caracteres e pressione Enter para iniciar a busca.";
				}
			}?>
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>

</body>
</html>