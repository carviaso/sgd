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
			
			<h3 style="margin-bottom:0; padding-bottom:0;margin-top:0; padding-top:0">Tabela de Avaliação de Desempenho</h3>
				<p style="margin-top:0; padding-top:0;padding-left: 10px"><strong>Aplicada a Carreira do Ensino Básico Técnico e Tecnológico</strong></p>
			
			<div class="ui-body ui-body-a">
				<h4 style="margin-bottom:2; padding-bottom:2;margin-top:0; padding-top:0">AVALIAÇÃO DE DESEMPENHO PESSOAL BÁSICO DOCENTE DE 1º E 2º GRAUS TABELA Nº 1</h4>
				<div class="ui-body ui-body-c">
					<div data-role="fieldcontain">
			        	<label for="name-a">Nome:</label>
			        	<input type="text" name="name" id="name-a" value="" data-mini="true"  />
					</div>
					<div data-role="fieldcontain">
			        	<label for="horas-a">Horas Semanais:</label>
			        	<input type="text" name="name" id="horas-a" value="" data-mini="true"  />
					</div>
				</div>
				
				<fieldset class="ui-grid-a">
					<div class="ui-block-a">
						<a href="novo_formulario.php" data-role="button" data-theme="c" data-rel="back">Cancelar</a>
					</div>
					<div class="ui-block-b">
						<a href="novo_formulario.php" data-role="button" data-theme="b" data-transition="slidedown">Salvar</a>
					</div>	   
				</fieldset>
				
			</div>
		</div>
		
	</div><!-- /content -->

	<div data-role="footer" class="footer-docs" data-theme="c" data-fullscreen="true">
			<p>&copy; 2012 - UFSC - Universidade Federal de Santa Catarina. CPPD/SGD.</p>
	</div>

</div>