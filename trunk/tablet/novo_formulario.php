<div data-role="page" class="type-interior">

	<div data-role="header" data-position="fixed" data-theme="a">
		<h1><?php echo SGD_TITULO_CABECALHO; ?></h1>
		<a href="index.php" data-transition="fade" data-theme="e">Sair</a>
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
			
			<p>
				<h4 style="margin:.4em 0">Selecione o tipo de formulário</h4>
			</p>
			<ul data-role="listview" data-theme="d" data-divider-theme="b" data-inset="true">
				<li><a href="novo_formulario1.php" data-transition="slide">
						<h3>Tabela de Avaliação de Desempenho</h3>
						<p><strong>Aplicada a Carreira do Ensino Básico Técnico e Tecnológico</strong></p>
				</a></li>
				<li><a href="novo_formulario1.php" data-transition="slide">
						<h3>Tabela de Avaliação de Desempenho</h3>
						<p><strong>Aplicada a Carreira do Ensino Básico Técnico e Tecnológico</strong></p>
				</a></li>
				<li><a href="novo_formulario1.php" data-transition="slide">
						<h3>Tabela de Avaliação de Desempenho</h3>
						<p><strong>Aplicada a Carreira do Ensino Básico Técnico e Tecnológico</strong></p>
				</a></li>
			</ul>

		</div>
		
	</div><!-- /content -->

	<div data-role="footer" class="footer-docs" data-theme="c" data-fullscreen="true">
			<p>&copy; 2012 - UFSC - Universidade Federal de Santa Catarina. CPPD/SGD.</p>
	</div>

</div>