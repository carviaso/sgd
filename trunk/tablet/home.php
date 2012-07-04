<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');
?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body> 
<div id="id-home" data-role="page" class="type-interior">

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
		
		<div class="content-page">
			
			<h4 style="margin:.5em 0">SGD - Módulo Reuniões</h4>
			
			<p>Este sistema trata das reuniões realizadas pela CPPD. Aqui, 
			todos os procedimentos relatados antes, durante e após as reuniões são 
			gerenciados automaticamente. Tais procedimentos incluem, por exemplo, 
			criação de pautas, distribuição de processos bem como a disponibilização 
			dos pareceres dos respectivos relatores dos tais processos.</p>
			
		<!-- 	<p>Foi Constituída através do Decreto nº 94664/87 e regulamentada pela Portaria nº 475/87 do Ministério da Educação, para 
			assessorar aos Orgãos Deliberativos Centrais na formulação, aperfeiçoamento e modificação da política de pessoal docente das 
			IFES. Está vinculada a Pró-Reitoria de Ensino de Graduação da UFSC.</p>
			<h4 style="margin:.5em 0">Objetivo</h4>
			<p>Desenvolver estudos que permitam fornecer subsídios para fixação, aperfeiçoamento e modificação da política de pessoal 
			e de seus instrumentos.</p>  -->
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>
<script type="text/javascript">
/*
$('#bTeste').live('click',function(){

	var param = {
				'action': 'lista-membro'
			};
	
	requisicaoCenter(param);

});

$('#bSair').live('tap',function(){

	$.mobile.changePage('./index.php', {reloadPage: true, transition: 'fade'});
	
});
*/
</script>
</body>
</html>